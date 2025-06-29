@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Selamat datang, Admin {{ auth()->user()->name }}</h1>
    <p class="text-gray-600">Gunakan panel ini untuk mengelola data bimbel, fuzzy set, dan fuzzy rule.</p>

    <div class="mt-6 space-y-2">
        <a href="{{ route('bimbels.index') }}" class="block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Kelola
            Bimbel</a>
        <a href="{{ route('rules.index') }}"
            class="block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Kelola Fuzzy Rule</a>

        <a href="{{ route('admin.testimoni.index') }}"
            class="block bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600">
            Semua Testimoni
        </a>
    </div>
@endsection
