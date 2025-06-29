@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="bg-white p-6 rounded-xl shadow-md w-full">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Data Bimbel</h1>
                <a href="{{ route('bimbels.create') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition">
                    + Tambah
                </a>
            </div>

            @if (session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded border border-green-300 mb-4">
                    {{ session('success') }}
                </div>
            @endif


            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300 rounded-lg overflow-hidden text-sm text-left">
                    <thead class="bg-gray-100 text-gray-700 font-semibold">
                        <tr>
                            <th class="p-3 border">Nama</th>
                            <th class="p-3 border">Alamat</th>
                            <th class="p-3 border">Biaya</th>
                            <th class="p-3 border">Jarak</th>
                            <th class="p-3 border">Fasilitas</th>
                            <th class="p-3 border">Aksi</th> {{-- Tambahkan --}}
                        </tr>
                    </thead>

                    <tbody class="text-gray-800">
                        @forelse ($bimbels as $b)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-3 border">{{ $b->nama }}</td>
                                <td class="p-3 border">{{ $b->alamat }}</td>
                                <td class="p-3 border">{{ $b->biaya }} rb</td>
                                <td class="p-3 border">{{ $b->jarak }} m</td>
                                <td class="p-3 border capitalize">
                                    @if ($b->fasilitas == 3)
                                        Kurang
                                    @elseif($b->fasilitas == 5)
                                        Sedang
                                    @elseif($b->fasilitas == 8)
                                        Lengkap
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="p-3 border flex gap-2">
                                    <a href="{{ route('bimbels.edit', $b->id) }}"
                                        class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">
                                        Edit
                                    </a>

                                    <form action="{{ route('bimbels.destroy', $b->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                            Hapus
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-gray-500 py-4">
                                    Belum ada data bimbel.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
