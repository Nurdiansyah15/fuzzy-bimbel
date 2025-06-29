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

    public function edit(string $id)
    {
        $rule = FuzzyRule::findOrFail($id);
        return view('admin.rules.edit', compact('rule'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'harga_label' => 'required',
            'fasilitas_label' => 'required',
            'jarak_label' => 'required',
            'output' => 'required',
        ]);

        $rule = FuzzyRule::findOrFail($id);
        $rule->update($request->all());

        return redirect()->route('rules.index')->with('success', 'Rule berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $rule = FuzzyRule::findOrFail($id);
        $rule->delete();

        return redirect()->route('rules.index')->with('success', 'Rule berhasil dihapus.');
    }
}
