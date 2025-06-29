@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="bg-white p-8 rounded-xl shadow-md w-full">
            <h1 class="text-2xl font-bold mb-6">Riwayat Preferensi</h1>

            @if ($histories->isEmpty())
                <div class="text-gray-600">Belum ada riwayat pencarian.</div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full border text-sm text-left">
                        <thead class="bg-gray-100 font-semibold text-gray-700">
                            <tr>
                                <th class="p-3 border">Harga Min</th>
                                <th class="p-3 border">Harga Max</th>
                                <th class="p-3 border">Jarak Max</th>
                                <th class="p-3 border">Fasilitas</th>
                                <th class="p-3 border">Waktu</th>
                                <th class="p-3 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-800">
                            @foreach ($histories as $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3 border">Rp{{ number_format($item->harga_min) }}</td>
                                    <td class="p-3 border">Rp{{ number_format($item->harga_max) }}</td>
                                    <td class="p-3 border">{{ $item->jarak_max }} m</td>
                                    <td class="p-3 border capitalize">{{ $item->fasilitas }}</td>
                                    <td class="p-3 border">{{ $item->created_at->diffForHumans() }}</td>
                                    <td class="p-3 border">
                                        <a href="{{ route('preferensi.result.from.history', $item->id) }}"
                                            class="text-blue-600 hover:underline text-sm font-medium">
                                            Lihat Hasil
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
