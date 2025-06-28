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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
