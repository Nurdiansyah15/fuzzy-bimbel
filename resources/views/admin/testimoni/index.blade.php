{{-- resources/views/admin/testimoni/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-xl shadow-md p-8">
            <h1 class="text-2xl font-bold mb-6">Semua Testimoni</h1>

            @forelse ($testimonis as $item)
                <div class="mb-4 border-b pb-3">
                    <p class="text-sm text-gray-700">{{ $item->komentar }}</p>
                    <p class="text-xs text-gray-500 mt-1">oleh <strong>{{ $item->user->name }}</strong> di
                        <em>{{ $item->bimbel->nama }}</em> — {{ $item->created_at->format('d M Y') }}
                    </p>
                </div>
            @empty
                <p class="text-sm text-gray-500">Belum ada testimoni.</p>
            @endforelse
        </div>
    </div>
@endsection
