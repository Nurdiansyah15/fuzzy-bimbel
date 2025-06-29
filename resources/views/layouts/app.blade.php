<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ config('app.name', 'FuzzyBimbel') }}</title>
        @vite('resources/css/app.css')
    </head>

    <body class="bg-gray-100 text-gray-800">

        <div class="min-h-screen flex">

            <!-- Sidebar -->
            <aside class="w-64 bg-white shadow-lg hidden md:block">
                <div class="p-6 text-xl font-bold border-b border-gray-200">
                    {{ auth()->user()->role === 'admin' ? 'Admin Panel' : 'User Panel' }}
                </div>
                <nav class="p-4 space-y-2">
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                            class="block px-3 py-2 rounded {{ request()->routeIs('dashboard') ? 'bg-gray-200 font-semibold' : 'hover:bg-gray-100' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('bimbels.index') }}"
                            class="block px-3 py-2 rounded {{ request()->routeIs('bimbels.*') ? 'bg-gray-200 font-semibold' : 'hover:bg-gray-100' }}">
                            Data Bimbel
                        </a>
                        <a href="{{ route('rules.index') }}"
                            class="block px-3 py-2 rounded {{ request()->routeIs('rules.*') ? 'bg-gray-200 font-semibold' : 'hover:bg-gray-100' }}">
                            Fuzzy Rules
                        </a>
                        <a href="{{ route('admin.testimoni.index') }}"
                            class="block px-3 py-2 rounded {{ request()->routeIs('admin.testimoni.*') ? 'bg-gray-200 font-semibold' : 'hover:bg-gray-100' }}">
                            Testimoni
                        </a>
                        <a href="{{ route('admin.users.index') }}"
                            class="block px-3 py-2 rounded {{ request()->routeIs('users.*') ? 'bg-gray-200 font-semibold' : 'hover:bg-gray-100' }}">
                            Kelola User
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}"
                            class="block px-3 py-2 rounded {{ request()->routeIs('dashboard') ? 'bg-gray-200 font-semibold' : 'hover:bg-gray-100' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('preferensi.create') }}"
                            class="block px-3 py-2 rounded {{ request()->routeIs('preferensi.create') ? 'bg-gray-200 font-semibold' : 'hover:bg-gray-100' }}">
                            Isi Preferensi
                        </a>
                        @if (session()->has('preferensi'))
                            <a href="{{ route('preferensi.result') }}"
                                class="block px-3 py-2 rounded {{ request()->routeIs('preferensi.result') ? 'bg-gray-200 font-semibold' : 'hover:bg-gray-100' }}">
                                Hasil Rekomendasi
                            </a>
                        @else
                            <span class="block px-3 py-2 rounded bg-gray-100 text-gray-400 cursor-not-allowed">
                                Hasil Rekomendasi
                            </span>
                        @endif

                        <a href="{{ route('preferensi.history') }}"
                            class="block px-3 py-2 rounded {{ request()->routeIs('preferensi.history') ? 'bg-gray-200 font-semibold' : 'hover:bg-gray-100' }}">
                            History Pencarian
                        </a>
                    @endif
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col">

                <!-- Header -->
                <header class="bg-white shadow p-4 flex justify-between items-center">
                    <div class="text-lg font-semibold">
                        {{ auth()->user()->role === 'admin' ? 'Admin Dashboard' : 'Dashboard' }}
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-sm text-gray-600">
                            {{ auth()->user()->name }}
                        </span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Logout</button>
                        </form>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="p-6">
                    @yield('content')
                </main>

            </div>
        </div>

    </body>

</html>
