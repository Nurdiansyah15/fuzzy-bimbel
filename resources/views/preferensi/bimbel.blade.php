@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="bg-white p-10 rounded-2xl shadow-lg w-full">
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-blue-700">Detail Bimbel</h1>
                <a href="{{ url()->previous() }}"
                    class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg text-sm hover:bg-gray-300 transition">
                    ← Kembali
                </a>
            </div>


            <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg text-blue-800 text-sm">
                <p class="font-medium">Skor Rekomendasi: <span class="font-bold text-xl">{{ $skor }}</span></p>
                <p class="mt-1">Semakin tinggi skor, semakin cocok dengan preferensimu.</p>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-800 text-sm">
                <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                    <p class="text-xs text-gray-500">Nama</p>
                    <p class="font-semibold text-lg">{{ $bimbel->nama }}</p>
                </div>

                <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                    <p class="text-xs text-gray-500">Alamat</p>
                    <p class="text-sm">{{ $bimbel->alamat }}</p>
                </div>

                <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                    <p class="text-xs text-gray-500">Biaya</p>
                    <p class="font-semibold text-blue-700">Rp{{ number_format($bimbel->biaya) }}</p>
                </div>

                <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                    <p class="text-xs text-gray-500">Jarak</p>
                    <p class="text-sm">{{ $bimbel->jarak }} meter</p>
                </div>

                <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                    <p class="text-xs text-gray-500">Fasilitas</p>
                    <p class="capitalize font-medium">
                        @if ($bimbel->fasilitas == 3)
                            Kurang
                        @elseif ($bimbel->fasilitas == 5)
                            Sedang
                        @elseif ($bimbel->fasilitas == 8)
                            Lengkap
                        @else
                            Tidak Diketahui
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
