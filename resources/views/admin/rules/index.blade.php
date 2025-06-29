@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-xl shadow-md p-8 w-full">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Daftar Fuzzy Rules</h1>
                <a href="{{ route('rules.create') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition">
                    + Tambah Rule
                </a>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif


            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left border border-gray-200 rounded-lg overflow-hidden">
                    <thead class="bg-gray-100 text-gray-700 font-semibold">
                        <tr class="text-center">
                            <th class="border px-4 py-3">Harga</th>
                            <th class="border px-4 py-3">Fasilitas</th>
                            <th class="border px-4 py-3">Jarak</th>
                            <th class="border px-4 py-3">Output</th>
                            <th class="border px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800">
                        @forelse ($rules as $rule)
                            <tr class="hover:bg-gray-50 transition text-center">
                                <td class="border px-4 py-2 capitalize">{{ $rule->harga_label }}</td>
                                <td class="border px-4 py-2 capitalize">{{ $rule->fasilitas_label }}</td>
                                <td class="border px-4 py-2 capitalize">{{ $rule->jarak_label }}</td>
                                <td class="border px-4 py-2 font-bold capitalize">
                                    {{ $rule->output }}
                                </td>
                                <td class="border-t px-4 py-2 flex justify-center">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('rules.edit', $rule->id) }}"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs font-medium">
                                            Edit
                                        </a>
                                        <form action="{{ route('rules.destroy', $rule->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus rule ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs font-medium">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-gray-500 py-4">Belum ada rule yang ditambahkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
