<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mario Bros Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: #5c94fc url('https://i.imgur.com/UdVx1ZP.png') repeat-x;
            font-family: 'Press Start 2P', cursive;
        }

        .brick {
            background: url('https://i.imgur.com/s5H4UsT.png') no-repeat center center;
            background-size: cover;
        }

        .icon-box {
            width: 32px;
            height: 32px;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>

<body class="text-white">

    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Sidebar -->
        <aside class="bg-green-600 w-full md:w-64 p-4 space-y-4">
            <div class="text-center mb-6">
                <img src="https://i0.wp.com/www.pinnyshop.com/wp-content/uploads/2021/01/smb-anniversary-smb-mushroom.png?fit=800,800&ssl=1"
                    alt="Mario" class="w-16 mx-auto">
                <h2 class="text-yellow-300 text-sm mt-2">MARIO DASH</h2>
            </div>
            <nav class="space-y-2 text-sm">
                <a href="/dashboard" class="block px-4 py-2 rounded bg-green-800 hover:bg-green-700">🏠 Dashboard</a>
                <a href="/settings" class="block px-4 py-2 rounded bg-green-800 hover:bg-green-700">👥 Users</a>
                <a href="#" class="block px-4 py-2 rounded bg-green-800 hover:bg-green-700">⚙️ Settings</a>
                <a href="#" class="block px-4 py-2 rounded bg-red-800 hover:bg-red-700">🚪 Logout</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-2xl text-yellow-300 mb-6 text-center md:text-left">👋 Welcome, Mario!</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Card 1 -->
                <div class="brick rounded-lg p-4 text-center shadow-md">
                    <img src="https://i.imgur.com/NKsK28J.png" class="w-8 h-8 mx-auto mb-2" alt="Mushroom">
                    <p class="text-yellow-200 text-lg">47</p>
                    <p class="text-sm text-white">New Orders</p>
                </div>

                <!-- Card 2 -->
                <div class="brick rounded-lg p-4 text-center shadow-md">
                    <img src="https://i.imgur.com/GbQEbT4.png" class="w-8 h-8 mx-auto mb-2" alt="Star">
                    <p class="text-yellow-200 text-lg">123</p>
                    <p class="text-sm text-white">Visitors</p>
                </div>

                <!-- Card 3 -->
                <div class="brick rounded-lg p-4 text-center shadow-md">
                    <img src="https://i.imgur.com/34xvV2n.png" class="w-8 h-8 mx-auto mb-2" alt="Fire Flower">
                    <p class="text-yellow-200 text-lg">12</p>
                    <p class="text-sm text-white">New Users</p>
                </div>

                <!-- Card 4 -->
                <div class="brick rounded-lg p-4 text-center shadow-md">
                    <img src="https://i.imgur.com/BRw7snk.png" class="w-8 h-8 mx-auto mb-2" alt="? Box">
                    <p class="text-yellow-200 text-lg">10</p>
                    <p class="text-sm text-white">Reports</p>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
