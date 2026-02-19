<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Desa Lajer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-xl shadow p-8 w-full max-w-md">
        <div class="text-center mb-6">
            <p class="text-3xl mb-2">⚙️</p>
            <h1 class="text-2xl font-bold text-green-700">Login Admin</h1>
            <p class="text-sm text-gray-500 mt-1">Desa Lajer</p>
        </div>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" autofocus
                       class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                       placeholder="admin@desalajer.com">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password"
                       class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                       placeholder="••••••••">
            </div>
            <button type="submit"
                    class="w-full bg-green-700 text-white font-semibold py-2 rounded-lg hover:bg-green-800">
                Login
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="text-sm text-gray-400 hover:underline">← Kembali ke Beranda</a>
        </div>
    </div>

</body>
</html>