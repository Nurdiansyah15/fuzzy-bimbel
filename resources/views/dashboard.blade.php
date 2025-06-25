@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Halo, {{ auth()->user()->name }}</h1>
    <p class="text-gray-600">Silakan masukkan preferensi kamu untuk mendapatkan rekomendasi bimbel terbaik.</p>

    <div class="mt-4">
        <a href="{{ route('preferensi.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Input
            Preferensi</a>
    </div>
@endsection
