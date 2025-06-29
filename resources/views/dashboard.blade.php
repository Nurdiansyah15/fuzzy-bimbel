@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Halo, {{ auth()->user()->name }}</h1>
    <p class="text-gray-600">Silakan gunakan menu berikut untuk mencari bimbel terbaik sesuai kebutuhanmu.</p>

    <div class="mt-6 space-y-2">
        <a href="{{ route('preferensi.create') }}" class="block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            🎯 Input Preferensi
        </a>

        <a href="{{ route('preferensi.result') }}" class="block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            📊 Lihat Hasil Terakhir
        </a>

        <a href="{{ route('preferensi.history') }}" class="block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            🕘 Riwayat Pencarian
        </a>
    </div>
@endsection
