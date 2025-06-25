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

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left border border-gray-200 rounded-lg overflow-hidden">
                    <thead class="bg-gray-100 text-gray-700 font-semibold">
                        <tr>
                            <th class="border px-4 py-3">Harga</th>
                            <th class="border px-4 py-3">Fasilitas</th>
                            <th class="border px-4 py-3">Jarak</th>
                            <th class="border px-4 py-3">Output</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800">
                        @forelse ($rules as $rule)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="border px-4 py-2 capitalize">{{ $rule->harga_label }}</td>
                                <td class="border px-4 py-2 capitalize">{{ $rule->fasilitas_label }}</td>
                                <td class="border px-4 py-2 capitalize">{{ $rule->jarak_label }}</td>
                                <td class="border px-4 py-2 font-semibold text-indigo-600 capitalize">
                                    {{ $rule->output }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-gray-500 py-4">Belum ada rule yang ditambahkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
