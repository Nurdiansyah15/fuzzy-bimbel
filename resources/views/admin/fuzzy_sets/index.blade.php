@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Daftar Fuzzy Sets</h1>

    <a href="{{ route('fuzzy_sets.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah
        Fuzzy Set</a>

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">Parameter</th>
                <th class="border p-2">Label</th>
                <th class="border p-2">Min</th>
                <th class="border p-2">Max</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sets as $set)
                <tr>
                    <td class="border p-2 capitalize">{{ $set->parameter }}</td>
                    <td class="border p-2 capitalize">{{ $set->label }}</td>
                    <td class="border p-2">{{ $set->min }}</td>
                    <td class="border p-2">{{ $set->max }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
