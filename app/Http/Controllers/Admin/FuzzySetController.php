<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FuzzySet;

class FuzzySetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index()
    {
        $sets = FuzzySet::orderBy('parameter')->get();
        return view('admin.fuzzy_sets.index', compact('sets'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
    {
        return view('admin.fuzzy_sets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
      public function store(Request $request)
    {
        $request->validate([
            'parameter' => 'required|string',
            'label' => 'required|string',
            'min' => 'required|numeric',
            'max' => 'required|numeric|gte:min',
        ]);

        FuzzySet::create($request->all());

        return redirect()->route('fuzzy_sets.index')->with('success', 'Fuzzy set berhasil ditambahkan.');
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
