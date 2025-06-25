@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="bg-white rounded-xl shadow-md p-8 w-full mx-auto">
        <h1 class="text-2xl font-bold mb-6">Tambah Fuzzy Rule</h1>

        {{-- Error alert --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('rules.store') }}" class="space-y-6">
            @csrf

            @php
                $options = [
                    'harga' => ['murah', 'sedang', 'mahal'],
                    'jarak' => ['dekat', 'sedang', 'jauh'],
                    'fasilitas' => ['kurang', 'sedang', 'lengkap'],
                ];
            @endphp

            @foreach ($options as $field => $values)
                <div>
                    <label for="{{ $field }}_label" class="block text-sm font-medium text-gray-700 capitalize mb-1">
                        {{ ucfirst($field) }}
                    </label>
                    <select name="{{ $field }}_label" id="{{ $field }}_label" required
                        class="block w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach ($values as $val)
                            <option value="{{ $val }}">{{ ucfirst($val) }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach

            <div>
                <label for="output" class="block text-sm font-medium text-gray-700 mb-1">Output</label>
                <select name="output" id="output" required
                    class="block w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="rendah">Rendah</option>
                    <option value="sedang">Sedang</option>
                    <option value="tinggi">Tinggi</option>
                </select>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold transition">
                    Simpan Rule
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
