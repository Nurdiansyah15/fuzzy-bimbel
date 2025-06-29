<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bimbel;

class BimbelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bimbels = Bimbel::latest()->get();
        return view('admin.bimbel.index', compact('bimbels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bimbel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'biaya' => 'required|integer|min:0',
            'jarak' => 'required|integer|min:0',
            'fasilitas' => 'required|integer|min:0|max:10',
        ]);

        Bimbel::create($request->all());
        return redirect()->route('bimbels.index')->with('success', 'Data bimbel berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $bimbel = Bimbel::findOrFail($id);
        $skor = $request->query('skor'); // ambil dari query string

        return view('preferensi.bimbel', compact('bimbel', 'skor'));
    }


    public function edit(string $id)
    {
        $bimbel = Bimbel::findOrFail($id);
        return view('admin.bimbel.edit', compact('bimbel'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'biaya' => 'required|integer|min:0',
            'jarak' => 'required|integer|min:0',
            'fasilitas' => 'required|integer|min:0|max:10',
        ]);

        $bimbel = Bimbel::findOrFail($id);
        $bimbel->update($request->all());

        return redirect()->route('bimbels.index')->with('success', 'Data bimbel berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $bimbel = Bimbel::findOrFail($id);
        $bimbel->delete();

        return redirect()->route('bimbels.index')->with('success', 'Data bimbel berhasil dihapus.');
    }
}
