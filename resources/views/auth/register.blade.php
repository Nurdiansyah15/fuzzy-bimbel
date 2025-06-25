<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <form method="POST" action="/register" class="bg-white p-6 rounded shadow-md w-full max-w-sm space-y-4">
    @csrf
    <h1 class="text-xl font-bold text-center">Register</h1>

    <input type="text" name="name" placeholder="Name" class="w-full px-3 py-2 border rounded" required>

    <input type="email" name="email" placeholder="Email" class="w-full px-3 py-2 border rounded" required>

    <input type="password" name="password" placeholder="Password" class="w-full px-3 py-2 border rounded" required>

    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full px-3 py-2 border rounded" required>

    <select name="role" class="w-full px-3 py-2 border rounded" required>
      <option value="user">User</option>
      <option value="admin">Admin</option>
    </select>

    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Register</button>

    <p class="text-center text-sm">Sudah punya akun? <a href="/login" class="text-blue-500 hover:underline">Login</a></p>
  </form>
</body>
</html>
