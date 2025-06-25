<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">

    <head>
        @vite('resources/css/app.css')
    </head>

    <body class="bg-gray-100 flex items-center justify-center h-screen">
        <form method="POST" action="/login" class="bg-white p-6 rounded shadow-md w-full max-w-sm space-y-4">
            @csrf
            <h1 class="text-xl font-bold text-center">Login</h1>

            <input type="email" name="email" placeholder="Email" class="w-full px-3 py-2 border rounded" required>

            <input type="password" name="password" placeholder="Password" class="w-full px-3 py-2 border rounded"
                required>

            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">Login</button>

            <p class="text-center text-sm">Belum punya akun? <a href="/register"
                    class="text-blue-500 hover:underline">Daftar</a></p>
        </form>
    </body>

</html>
