<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Y & Y Adventures</title>
    <link rel="icon" href="couple.png" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');

        .mario-font {
            font-family: 'Press Start 2P', cursive;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-sky-400 to-blue-600 flex items-center justify-center min-h-screen mario-font">

    <div class="relative max-w-md w-full bg-yellow-200 border-4 border-red-500 rounded-3xl shadow-2xl p-8">
        <div class="absolute -top-16 left-1/2 transform -translate-x-1/2">
            <img src="img/mario.png" alt="Mario" class="w-24 h-24 rounded-full border-4 border-white bg-white" />
        </div>

        <h2 class="text-xl text-center text-red-600 mt-12 mb-6">Welcome to <br> Y&Y Access</h2>

        <form class="space-y-5" method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div>
                <label class="block text-xs text-red-700 mb-1">Username</label>
                <input type="text"
                    class="w-full px-4 py-2 border border-red-300 rounded-lg bg-white text-sm focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                    placeholder="hit me with ur name" name="username" />
            </div>

            <div>
                <label class="block text-xs text-red-700 mb-1">Password</label>
                <input type="password"
                    class="w-full px-4 py-2 border border-red-300 rounded-lg bg-white text-sm focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                    placeholder="••••••••" name="password" />
            </div>

            <button
                class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 rounded-lg shadow-md transition-colors">
                Sign In
            </button>
        </form>
    </div>
    @if ($errors->any())
        <script>
            // Swal.fire({
            //     icon: 'error',
            //     title: 'Oops...',
            //     text: '{{ $errors->first() }}',
            // });
            Swal.fire({
                icon: "error",
                title: "{{ $errors->first() }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
</body>

</html>
