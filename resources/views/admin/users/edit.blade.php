@extends('layouts.app')

@section('content')
    <div class="w-full mx-auto bg-white p-8 rounded-xl shadow">
        <h1 class="text-xl font-bold mb-6">Edit User</h1>

        {{-- Flash Error Global --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-200 rounded">
                <strong>Ada kesalahan:</strong>
                <ul class="mt-2 list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium">Nama</label>
                <input name="name" value="{{ old('name', $user->name) }}" required
                    class="w-full border rounded px-4 py-2 @error('name') border-red-500 @enderror" />
                @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="w-full border rounded px-4 py-2 @error('email') border-red-500 @enderror" />
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium">Password Baru (Opsional)</label>
                <input type="password" name="password"
                    class="w-full border rounded px-4 py-2 @error('password') border-red-500 @enderror" />
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full border rounded px-4 py-2" />
            </div>

            <div>
                <label class="block font-medium">Role</label>
                <select name="role" required
                    class="w-full border rounded px-4 py-2 @error('role') border-red-500 @enderror">
                    <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Perbarui</button>
            </div>
        </form>
    </div>
@endsection
