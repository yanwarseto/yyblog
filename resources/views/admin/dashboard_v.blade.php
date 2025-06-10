<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="couple.png" type="image/x-icon">
</head>

<body class="bg-gray-100 flex flex-col md:flex-row min-h-screen">

    <!-- Sidebar for Desktop -->
    <aside class="hidden md:flex md:flex-col w-64 bg-white shadow-lg p-6 space-y-6">
        <h1 class="text-2xl font-bold text-blue-600">My Dashboard</h1>
        <nav class="flex flex-col gap-4">
            <a href="{{ route('dashboards') }}" class="text-gray-700 hover:text-blue-600 font-medium">Dashboard</a>
            <a href="{{ route('journey') }}" class="text-gray-700 hover:text-blue-600 font-medium">Journey</a>
            <a href="{{ route('logout') }}" class="text-red-500 hover:text-red-700 font-medium">Logout</a>
        </nav>
    </aside>

    <!-- Mobile Header -->
    <div
        class="md:hidden fixed top-0 left-0 right-0 bg-white shadow-md z-50 flex items-center justify-between px-4 py-3">
        <h1 class="text-xl font-bold text-blue-600">My Dashboard</h1>
        <button id="menuToggle" class="text-gray-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="md:hidden fixed top-14 left-0 w-full bg-white shadow-lg hidden z-40">
        <nav class="flex flex-col gap-4 p-4">
            <a href="{{ route('dashboards') }}" class="text-gray-700 hover:text-blue-600 font-medium">Dashboard</a>
            <a href="{{ route('journey') }}" class="text-gray-700 hover:text-blue-600 font-medium">Journey</a>
            <a href="{{ route('logout') }}" class="text-red-500 hover:text-red-700 font-medium">Logout</a>
        </nav>
    </div>

    <!-- Main Content -->
    <main class="flex-1 p-4 pt-20 md:pt-6 md:mt-0 z-10">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Welcome to your Dashboard</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-xl font-semibold text-gray-700">Total Pengunjung</h3>
                <p class="text-gray-500 mt-2">Total Pengunjung YnY Blog</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-xl font-semibold text-gray-700">Total Journey</h3>
                <p class="text-gray-500 mt-2">Riwayat aktivitas pengguna terbaru.</p>
            </div>
            {{-- <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-xl font-semibold text-gray-700">Pengaturan</h3>
                <p class="text-gray-500 mt-2">Ubah pengaturan pengguna di sini.</p>
            </div> --}}
        </div>
    </main>

    <script>
        const toggle = document.getElementById('menuToggle');
        const menu = document.getElementById('mobileMenu');
        toggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

</body>

</html>
