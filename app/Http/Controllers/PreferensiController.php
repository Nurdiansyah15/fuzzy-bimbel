<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bimbel;
use App\Models\FuzzyRule;
use App\Helpers\FuzzyHelper;
use App\Models\Preferensi;
use Illuminate\Support\Facades\Auth;

class PreferensiController extends Controller
{
    public function create()
    {
        return view('preferensi.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'harga_min' => 'required|numeric|min:0',
            'harga_max' => 'required|numeric|gte:harga_min',
            'jarak_max' => 'required|numeric|min:0',
            'fasilitas' => 'required|in:kurang,sedang,lengkap',
        ]);

        $userId = Auth::id();

        // Cek preferensi yang sama
        $existing = Preferensi::where('user_id', $userId)
            ->where('harga_min', $data['harga_min'])
            ->where('harga_max', $data['harga_max'])
            ->where('jarak_max', $data['jarak_max'])
            ->where('fasilitas', $data['fasilitas'])
            ->first();

        if (!$existing) {
            $existing = Preferensi::create([
                'user_id' => $userId,
                ...$data
            ]);
        }

        // Simpan preferensi ke session untuk digunakan di result
        session(['preferensi' => $data]);

        return redirect()->route('preferensi.result');
    }

    public function history()
    {
        $userId = Auth::id();
        $histories = Preferensi::where('user_id', $userId)->latest()->get();

        return view('preferensi.history', compact('histories'));
    }

    public function resultFromHistory($id)
    {
        $preferensi = Preferensi::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Simpan ke session agar reuse logic result() tetap bisa digunakan
        session([
            'preferensi' => [
                'harga_min' => $preferensi->harga_min,
                'harga_max' => $preferensi->harga_max,
                'jarak_max' => $preferensi->jarak_max,
                'fasilitas' => $preferensi->fasilitas,
            ]
        ]);

        return redirect()->route('preferensi.result');
    }



    public function result()
    {
        $preferensi = session('preferensi');
        $bimbels = Bimbel::all();
        $rules = FuzzyRule::all();

        // ✅ 1. Bentuk fuzzy set dari input preferensi user
        $harga_min = $preferensi['harga_min'];
        $harga_max = $preferensi['harga_max'];
        $harga_mid = ($harga_max + $harga_min) / 2;
        $harga_range = $harga_max - $harga_min;
        $harga_quarter = $harga_range / 4;

        $fuzzyHarga = [
            'murah' => ['a' => $harga_min, 'b' => $harga_mid, 'type' => 'turun'],
            'sedang' => ['a' => $harga_mid - $harga_quarter, 'b' => $harga_mid + $harga_quarter, 'type' => 'turun'],
            'mahal' => ['a' => $harga_mid, 'b' => $harga_max, 'type' => 'turun'],
        ];

        $jarak_max = $preferensi['jarak_max'];
        $jarak_half = $jarak_max / 2;
        $jarak_quarter = $jarak_max / 4;

        $fuzzyJarak = [
            'dekat' => ['a' => 0, 'b' => $jarak_half, 'type' => 'turun'],
            'sedang' => ['a' => $jarak_half - $jarak_quarter, 'b' => $jarak_half + $jarak_quarter, 'type' => 'turun'],
            'jauh' => ['a' => $jarak_half, 'b' => $jarak_max, 'type' => 'turun'],
        ];

        $fuzzyFasilitas = [
            'kurang' => ['a' => 0, 'b' => 3, 'type' => 'naik'],
            'sedang' => ['a' => 4, 'b' => 7, 'type' => 'naik'],
            'lengkap' => ['a' => 8, 'b' => 10, 'type' => 'naik'],
        ];

        // ✅ 2. Definisi output (fungsi monoton naik)
        $outputSet = [
            'rendah' => fn($μ) => 30 + (50 - 30) * $μ,
            'sedang' => fn($μ) => 50 + (70 - 50) * $μ,
            'tinggi' => fn($μ) => 70 + (90 - 70) * $μ,
        ];

        $results = [];

        // ✅ 3. Evaluasi setiap bimbel terhadap semua rule
        foreach ($bimbels as $bimbel) {
            $μ_values = [];
            $z_values = [];

            foreach ($rules as $rule) {
                if (
                    !isset($fuzzyHarga[$rule->harga_label]) ||
                    !isset($fuzzyJarak[$rule->jarak_label]) ||
                    !isset($fuzzyFasilitas[$rule->fasilitas_label]) ||
                    !isset($outputSet[$rule->output])
                ) continue;

                // Hitung μ untuk setiap aspek
                $μ_harga = FuzzyHelper::linear(
                    $bimbel->biaya,
                    $fuzzyHarga[$rule->harga_label]['a'],
                    $fuzzyHarga[$rule->harga_label]['b'],
                    $fuzzyHarga[$rule->harga_label]['type']
                );

                $μ_jarak = FuzzyHelper::linear(
                    $bimbel->jarak,
                    $fuzzyJarak[$rule->jarak_label]['a'],
                    $fuzzyJarak[$rule->jarak_label]['b'],
                    $fuzzyJarak[$rule->jarak_label]['type']
                );

                $μ_fasilitas = FuzzyHelper::linear(
                    $bimbel->fasilitas,
                    $fuzzyFasilitas[$rule->fasilitas_label]['a'],
                    $fuzzyFasilitas[$rule->fasilitas_label]['b'],
                    $fuzzyFasilitas[$rule->fasilitas_label]['type']
                );

                // Ambil nilai minimum dari semua μ
                $μ = min($μ_harga, $μ_jarak, $μ_fasilitas);

                if ($μ > 0) {
                    $z = $outputSet[$rule->output]($μ);
                    $μ_values[] = $μ;
                    $z_values[] = $μ * $z;
                }
            }

            $score = count($μ_values) > 0 ? array_sum($z_values) / array_sum($μ_values) : 0;

            $results[] = [
                'bimbel' => $bimbel,
                'score' => round($score, 2),
            ];
        }

        // ✅ 4. Urutkan hasil dari score tertinggi
        usort($results, fn($a, $b) => $b['score'] <=> $a['score']);

        return view('preferensi.result', compact('results', 'preferensi'));
    }
}
