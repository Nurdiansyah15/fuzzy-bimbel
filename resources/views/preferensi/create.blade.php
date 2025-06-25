@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="bg-white p-8 rounded-xl shadow-md mx-auto w-full">
            <h1 class="text-2xl font-bold mb-6">Input Preferensi</h1>

            <form action="{{ route('preferensi.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block font-semibold mb-1">Harga Minimum (Rp)</label>
                    <input type="number" name="harga_min"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Harga Maksimum (Rp)</label>
                    <input type="number" name="harga_max"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Jarak Maksimum (Meter)</label>
                    <input type="number" name="jarak_max"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Fasilitas Diinginkan</label>
                    <select name="fasilitas"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="kurang">Kurang</option>
                        <option value="sedang">Sedang</option>
                        <option value="lengkap">Lengkap</option>
                    </select>
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg transition">
                        Lihat Rekomendasi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
