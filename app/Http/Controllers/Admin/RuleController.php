<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FuzzyRule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
    {
        $rules = FuzzyRule::latest()->get();
        return view('admin.rules.index', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     */
  public function create()
    {
        return view('admin.rules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'harga_label' => 'required',
            'fasilitas_label' => 'required',
            'jarak_label' => 'required',
            'output' => 'required',
        ]);

        FuzzyRule::create($request->all());

        return redirect()->route('rules.index')->with('success', 'Rule berhasil ditambahkan.');
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
