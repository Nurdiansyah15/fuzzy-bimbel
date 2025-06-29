@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="bg-white p-10 rounded-2xl shadow-lg w-full">
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-blue-700">Detail Bimbel</h1>
                <a href="{{ route('preferensi.result') }}"
                    class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg text-sm hover:bg-gray-300 transition">
                    ← Kembali
                </a>
            </div>


            <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg text-blue-800 text-sm">
                <p class="font-medium">Skor Rekomendasi: <span class="font-bold text-xl">{{ $skor }}</span></p>
                <p class="mt-1">Semakin tinggi skor, semakin cocok dengan preferensimu.</p>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-800 text-sm">
                <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                    <p class="text-xs text-gray-500">Nama</p>
                    <p class="font-semibold text-lg">{{ $bimbel->nama }}</p>
                </div>

                <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                    <p class="text-xs text-gray-500">Alamat</p>
                    <p class="text-sm">{{ $bimbel->alamat }}</p>
                </div>

                <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                    <p class="text-xs text-gray-500">Biaya (per bulan)</p>
                    <p class="font-semibold text-blue-700">Rp{{ number_format($bimbel->biaya) }}.000,00</p>
                </div>

                <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                    <p class="text-xs text-gray-500">Jarak</p>
                    <p class="text-sm">{{ $bimbel->jarak }} meter</p>
                </div>

                <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                    <p class="text-xs text-gray-500">Fasilitas</p>
                    <p class="capitalize font-medium">
                        @if ($bimbel->fasilitas == 3)
                            Kurang
                        @elseif ($bimbel->fasilitas == 5)
                            Sedang
                        @elseif ($bimbel->fasilitas == 8)
                            Lengkap
                        @else
                            Tidak Diketahui
                        @endif
                    </p>
                </div>
            </div>
        </div>

        @if (auth()->check())
            <div class="mt-10">
                <div class="bg-white p-10 rounded-2xl shadow-lg w-full">
                    <h2 class="text-lg font-bold mb-4 text-blue-700">Tinggalkan Testimoni</h2>

                    @if (session('success'))
                        <div class="mb-4 text-sm bg-green-100 text-green-700 border border-green-200 p-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="/bimbels/{{ $bimbel->id }}/testimoni" method="POST" class="space-y-4">
                        @csrf
                        <textarea name="komentar" rows="3"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                            placeholder="Tulis testimoni kamu di sini..." required></textarea>

                        <div class="text-right">
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold transition">
                                Kirim Testimoni
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif

        <div class="bg-white p-10 rounded-2xl shadow-lg w-full mt-10 mb-10">
            {{-- List testimoni --}}
            <h2 class="text-lg font-bold mb-3">Apa kata pengguna?</h2>
            @forelse ($bimbel->testimonis()->latest()->get() as $testimoni)
                <div class="mb-4 border border-gray-200 rounded p-3">
                    <p class="text-gray-700 text-sm">{{ $testimoni->komentar }}</p>
                    <p class="text-xs text-gray-500 mt-1">— {{ $testimoni->user->name }},
                        {{ $testimoni->created_at->format('d M Y') }}</p>
                </div>
            @empty
                <p class="text-sm text-gray-500">Belum ada testimoni.</p>
            @endforelse
        </div>

    </div>
@endsection
