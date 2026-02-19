<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Desa Lajer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <nav class="bg-green-700 text-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <a href="{{ route('admin.dashboard') }}" class="font-bold text-lg">⚙️ Admin Desa Lajer</a>

                {{-- Mobile menu button --}}
                <button id="menu-toggle" class="md:hidden focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                {{-- Desktop menu --}}
                <div class="hidden md:flex items-center gap-4 text-sm">
                    <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
                    <a href="{{ route('admin.pengaduan.index') }}" class="hover:underline">Pengaduan</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-white text-green-700 px-3 py-1 rounded font-semibold hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            {{-- Mobile menu --}}
            <div id="mobile-menu" class="hidden md:hidden mt-3 flex flex-col gap-2 text-sm pb-2">
                <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
                <a href="{{ route('admin.pengaduan.index') }}" class="hover:underline">Pengaduan</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-white text-green-700 px-3 py-1 rounded font-semibold hover:bg-gray-100 w-full text-center">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-8">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded-lg mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>

</body>
</html>