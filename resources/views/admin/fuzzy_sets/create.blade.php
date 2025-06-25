@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Fuzzy Set</h1>

    <form method="POST" action="{{ route('fuzzy_sets.store') }}" class="space-y-4 max-w-xl">
        @csrf

        <div>
            <label class="block font-semibold">Parameter</label>
            <select name="parameter" class="w-full border rounded px-3 py-2" required>
                <option value="harga">Harga</option>
                <option value="fasilitas">Fasilitas</option>
                <option value="jarak">Jarak</option>
            </select>
        </div>

        <div>
            <label class="block font-semibold">Label</label>
            <input type="text" name="label" class="w-full border rounded px-3 py-2" placeholder="Contoh: murah"
                required>
        </div>

        <div>
            <label class="block font-semibold">Min</label>
            <input type="number" step="0.01" name="min" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold">Max</label>
            <input type="number" step="0.01" name="max" class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
@endsection
