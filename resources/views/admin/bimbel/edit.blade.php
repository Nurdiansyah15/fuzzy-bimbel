@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="bg-white p-8 rounded-xl shadow-md w-full mx-auto">
            <h1 class="text-2xl font-bold mb-6">Edit Data Bimbel</h1>

            {{-- Error alert --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 px-4 py-3 rounded border border-red-300 mb-4">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('bimbels.update', $bimbel->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="nama" class="block font-semibold mb-1">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $bimbel->nama) }}"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div>
                    <label for="alamat" class="block font-semibold mb-1">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>{{ old('alamat', $bimbel->alamat) }}</textarea>
                </div>

                <div>
                    <label for="biaya" class="block font-semibold mb-1">Biaya (ribu)</label>
                    <input type="number" name="biaya" id="biaya" value="{{ old('biaya', $bimbel->biaya) }}"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div>
                    <label for="jarak" class="block font-semibold mb-1">Jarak (meter)</label>
                    <input type="number" name="jarak" id="jarak" value="{{ old('jarak', $bimbel->jarak) }}"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div>
                    <label for="fasilitas" class="block font-semibold mb-1">Fasilitas</label>
                    <select name="fasilitas" id="fasilitas"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="3" {{ old('fasilitas', $bimbel->fasilitas) == 3 ? 'selected' : '' }}>Kurang
                        </option>
                        <option value="5" {{ old('fasilitas', $bimbel->fasilitas) == 5 ? 'selected' : '' }}>Sedang
                        </option>
                        <option value="8" {{ old('fasilitas', $bimbel->fasilitas) == 8 ? 'selected' : '' }}>Lengkap
                        </option>
                    </select>
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('bimbels.index') }}"
                        class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg transition">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
