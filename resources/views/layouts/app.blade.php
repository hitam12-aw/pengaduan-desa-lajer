<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Masyarakat - Desa Lajer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">

    <nav class="bg-green-700 text-white shadow">
        <div class="max-w-6xl mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="font-bold text-lg">Desa Lajer</a>
                
                {{-- Mobile menu button --}}
                <button id="menu-toggle" class="md:hidden focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                {{-- Desktop menu --}}
                <div class="hidden md:flex items-center gap-4 text-sm">
                    <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
                    <a href="{{ route('pengaduan.create') }}" class="hover:underline">Buat Pengaduan</a>
                    <a href="{{ route('pengaduan.cek') }}" class="hover:underline">Cek Status</a>
                    @auth
                        <a href="{{ route('admin.dashboard') }}" 
                           class="bg-white text-green-700 px-3 py-1 rounded font-semibold hover:bg-gray-100">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="bg-white text-green-700 px-3 py-1 rounded font-semibold hover:bg-gray-100">
                            Login
                        </a>
                    @endauth
                </div>
            </div>

            {{-- Mobile menu --}}
            <div id="mobile-menu" class="hidden md:hidden mt-3 flex flex-col gap-2 text-sm pb-2">
                <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
                <a href="{{ route('pengaduan.create') }}" class="hover:underline">Buat Pengaduan</a>
                <a href="{{ route('pengaduan.cek') }}" class="hover:underline">Cek Status</a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" 
                       class="bg-white text-green-700 px-3 py-1 rounded font-semibold hover:bg-gray-100 text-center">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" 
                       class="bg-white text-green-700 px-3 py-1 rounded font-semibold hover:bg-gray-100 text-center">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-green-700 text-white text-center py-4 text-sm mt-10">
        © {{ date('Y') }} Desa Lajer. All rights reserved.
    </footer>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>

</body>
</html>