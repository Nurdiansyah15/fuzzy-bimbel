@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="bg-white p-8 rounded-xl shadow-md w-full">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Kelola Pengguna</h1>
                <a href="{{ route('admin.users.create') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">+
                    Tambah User</a>
            </div>

            @if (session('success'))
                <div class="mb-4 text-green-700 bg-green-100 border border-green-300 p-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <table class="w-full text-sm border">
                <thead class="bg-gray-100 text-gray-700 font-semibold">
                    <tr>
                        <th class="p-3 border">Nama</th>
                        <th class="p-3 border">Email</th>
                        <th class="p-3 border">Role</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50 text-center">
                            <td class="p-3 border">{{ $user->name }}</td>
                            <td class="p-3 border">{{ $user->email }}</td>
                            <td class="p-3 border capitalize">{{ $user->role }}</td>
                            <td class="p-3 border space-x-2">
                                <a href="{{ route('admin.users.edit', $user) }}"
                                    class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs font-medium">Edit</a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Yakin hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
