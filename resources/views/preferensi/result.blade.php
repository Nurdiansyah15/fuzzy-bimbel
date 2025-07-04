@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="bg-white p-8 rounded-xl shadow-md mx-auto w-full">
            <h1 class="text-2xl font-bold mb-6">Hasil Rekomendasi Bimbel</h1>

            @if ($preferensi)
                <div class="mb-6 bg-gray-50 border border-gray-200 p-4 rounded-lg text-sm text-gray-700">
                    <h2 class="font-semibold text-base mb-2 text-blue-700">Preferensi Anda:</h2>
                    <ul class="space-y-1">
                        <li>💰 <strong>Harga:</strong> Rp{{ number_format($preferensi['harga_min']) }}.000 –
                            Rp{{ number_format($preferensi['harga_max']) }}.000</li>
                        <li>📍 <strong>Jarak Maksimal:</strong> {{ $preferensi['jarak_max'] }} meter</li>
                        <li>🏢 <strong>Fasilitas:</strong> {{ ucfirst($preferensi['fasilitas']) }}</li>
                    </ul>
                </div>
            @endif


            @if (count($results) === 0)
                <div class="text-red-600 text-sm bg-red-100 border border-red-200 p-4 rounded">
                    Tidak ada bimbel yang cocok dengan preferensi Anda.
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300 rounded-lg overflow-hidden text-sm text-left">
                        <thead class="bg-gray-100 text-gray-700 font-semibold">
                            <tr class="text-center">
                                <th class="p-3 border">Nama</th>
                                <th class="p-3 border">Alamat</th>
                                <th class="p-3 border">Biaya</th>
                                <th class="p-3 border">Jarak</th>
                                <th class="p-3 border">Fasilitas</th>
                                <th class="p-3 border">Skor</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-800">
                            @foreach ($results as $item)
                                <tr class="hover:bg-gray-50 transition text-center">
                                    <td class="p-3 border text-start">
                                        <a href="/bimbels/{{ $item['bimbel']->id }}?skor={{ $item['score'] }}"
                                            class="text-blue-600 hover:underline font-medium">
                                            {{ $item['bimbel']->nama }}
                                        </a>

                                    </td>

                                    <td class="p-3 border text-start">{{ $item['bimbel']->alamat }}</td>
                                    <td class="p-3 border">Rp{{ number_format($item['bimbel']->biaya) }}.000,00</td>
                                    <td class="p-3 border">{{ $item['bimbel']->jarak }} m</td>
                                    <td class="p-3 border capitalize">
                                        @if ($item['bimbel']->fasilitas == 3)
                                            Kurang
                                        @elseif($item['bimbel']->fasilitas == 5)
                                            Sedang
                                        @elseif($item['bimbel']->fasilitas == 8)
                                            Lengkap
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="p-3 border font-bold text-blue-600">{{ $item['score'] }}</td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
