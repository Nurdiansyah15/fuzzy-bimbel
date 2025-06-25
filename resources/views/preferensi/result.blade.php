@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="bg-white p-8 rounded-xl shadow-md mx-auto w-full">
            <h1 class="text-2xl font-bold mb-6">Hasil Rekomendasi Bimbel</h1>

            @if (count($results) === 0)
                <div class="text-red-600 text-sm bg-red-100 border border-red-200 p-4 rounded">
                    Tidak ada bimbel yang cocok dengan preferensi Anda.
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300 rounded-lg overflow-hidden text-sm text-left">
                        <thead class="bg-gray-100 text-gray-700 font-semibold">
                            <tr>
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
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="p-3 border">{{ $item['bimbel']->nama }}</td>
                                    <td class="p-3 border">{{ $item['bimbel']->alamat }}</td>
                                    <td class="p-3 border">Rp{{ number_format($item['bimbel']->biaya) }}</td>
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
