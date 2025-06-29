@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow">
        <h1 class="text-xl font-bold mb-6">Edit User</h1>

        <form method="POST" action="{{ route('users.update', $user) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium">Nama</label>
                <input name="name" value="{{ old('name', $user->name) }}" required
                    class="w-full border rounded px-4 py-2" />
            </div>

            <div>
                <label class="block font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="w-full border rounded px-4 py-2" />
            </div>

            <div>
                <label class="block font-medium">Password Baru (Opsional)</label>
                <input type="password" name="password" class="w-full border rounded px-4 py-2" />
            </div>

            <div>
                <label class="block font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full border rounded px-4 py-2" />
            </div>

            <div>
                <label class="block font-medium">Role</label>
                <select name="role" required class="w-full border rounded px-4 py-2">
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div class="pt-4">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Perbarui</button>
            </div>
        </form>
    </div>
@endsection
