<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Y & Y Adventures</title>
    <link rel="icon" href="couple.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes jump {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes moveRight {
            from {
                transform: translateX(-100px);
            }

            to {
                transform: translateX(calc(100vw + 100px));
            }
        }

        @keyframes pipeAnimation {
            0% {
                transform: scaleY(1);
            }

            50% {
                transform: scaleY(1.05);
            }

            100% {
                transform: scaleY(1);
            }
        }

        @keyframes coinSpin {
            0% {
                transform: rotateY(0);
            }

            100% {
                transform: rotateY(360deg);
            }
        }

        .jump-animate {
            animation: jump 0.5s ease infinite;
        }

        .move-right {
            animation: moveRight 15s linear infinite;
        }

        .pipe-animate {
            animation: pipeAnimation 2s ease-in-out infinite;
        }

        .coin-spin {
            animation: coinSpin 2s linear infinite;
        }

        .bg-pixel {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="%2341b06e"><rect width="8" height="8"/></svg>');
            background-size: 16px 16px;
        }

        /* for journey */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1000;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* Modal base styles */
        #myModal {
            @apply fixed inset-0 flex items-center justify-center bg-black bg-opacity-70 z-50 opacity-0 pointer-events-none transition-opacity duration-300;
        }

        #myModal.open {
            @apply opacity-100 pointer-events-auto;
        }

        .modal-content {
            @apply bg-white rounded-lg p-6 max-w-lg w-[90vw] max-h-[90vh] overflow-auto shadow-lg relative;
        }

        /* Close button */
        .modal-close {
            @apply absolute top-3 right-3 text-3xl font-bold cursor-pointer select-none transition-colors duration-200 text-gray-700 hover:text-red-600;
        }

        /* Tags in modal */
        .modal-tag {
            @apply text-black px-2 py-1 rounded text-sm bg-blue-300;
        }
    </style>
</head>

<body class="bg-blue-400 font-mono overflow-x-hidden bg-pixel">
    <!-- Clouds -->
    <div class="absolute top-20 move-right">
        <div class="text-white text-6xl">☁️</div>
    </div>
    <div class="absolute top-40 move-right" style="animation-delay: 5s">
        <div class="text-white text-4xl">☁️</div>
    </div>
    <div class="absolute top-80 move-right" style="animation-delay: 8s">
        <div class="text-white text-5xl">☁️</div>
    </div>

    <!-- Header -->
    <header class="container mx-auto px-4 py-8 relative z-10">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-2 no-underline">
                    <div class="text-4xl mr-2 jump-animate select-none">👨‍❤️‍👩</div>
                    <h1
                        class="text-3xl font-bold text-white bg-red-500 px-4 py-2 rounded-lg border-4 border-black shadow-lg">
                        Y<span class="text-yellow-300 px-2">&</span>Y Adventures
                    </h1>
                </a>
            </div>

            <nav class="hidden md:flex space-x-4">
                <a href="#about"
                    class="bg-yellow-400 text-white px-4 py-2 rounded-lg border-4 border-black font-bold hover:bg-yellow-300 transition">ABOUT</a>
                <a href="#favorites"
                    class="bg-green-500 text-white px-4 py-2 rounded-lg border-4 border-black font-bold hover:bg-green-400 transition">FAVORITE</a>
                <a href="#journey"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg border-4 border-black font-bold hover:bg-blue-400 transition">JOURNEY</a>
                <a href="#contact"
                    class="bg-red-500 text-white px-4 py-2 rounded-lg border-4 border-black font-bold hover:bg-red-400 transition">CONTACT</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="container mx-auto px-4 py-16 relative z-10">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h2 class="text-5xl md:text-6xl font-bold text-white mb-4">
                    IT'S US, <span class="text-red-500">Yan</span><span class="text-yellow-300">Yen</span>!
                </h2>
                <p class="text-xl text-white mb-6 bg-black bg-opacity-50 p-4 rounded-lg">
                    Hey everyone! Welcome to YanYen Blog! 👋 We're Yanwar and Yenita, a Jakarta-based couple who
                    absolutely love exploring new places and discovering delicious eats, both here in our vibrant city
                    and beyond. This blog is where we share our exciting travel adventures and mouthwatering food
                    journeys.
                </p>
                <div class="flex space-x-4">
                    <a href="#contact"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-lg border-4 border-black transition transform hover:scale-105">
                        LET'S CONNECT!
                    </a>
                    <a href="#journey"
                        class="bg-yellow-400 hover:bg-yellow-300 text-black font-bold py-3 px-6 rounded-lg border-4 border-black transition transform hover:scale-105">
                        OUR JOURNEY'S
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 relative ">
                <img src="img/yny2.jpg" alt="Yan Yen Blog"
                    class="w-full h-[600px] rounded-lg border-8 border-black shadow-2xl" style="object-fit: cover;" />
                <div class="absolute -top-8 -right-8 text-6xl jump-animate">🌟</div>
                <div class="absolute -bottom-4 -left-4 text-4xl coin-spin">🌓</div>
            </div>
        </div>
    </section>

    <!-- Floating Coins -->
    <div class="absolute top-1/4 left-1/4 text-2xl coin-spin" style="animation-delay: 0.5s">
        🌓
    </div>
    <div class="absolute top-1/3 right-1/4 text-2xl coin-spin" style="animation-delay: 1s">
        🌓
    </div>
    <div class="absolute top-1/2 left-1/3 text-2xl coin-spin" style="animation-delay: 1.5s">
        🌓
    </div>

    <!-- About Section -->
    <section id="about" class="bg-yellow-400 py-16 relative overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-black mb-4">ABOUT US</h2>
                <div class="w-32 h-2 bg-black mx-auto mb-6"></div>
            </div>
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/3 mb-8 md:mb-0 flex justify-center">
                    <div class="relative">
                        <img src="img/real.jpeg" alt="Yan and Yen"
                            class="rounded-full border-8 border-black w-64 h-64 object-cover" />
                        <div class="absolute -bottom-4 -right-4 text-4xl pipe-animate">
                            🍄
                        </div>
                    </div>
                </div>
                <div class="md:w-2/3 md:pl-12">
                    <p class="text-xl text-black mb-6">
                        Hey there! We're Yanwar and Yenita, the duo behind YanYen Blog. For us, life is all about
                        exploring new horizons and savoring delicious moments together. What started as a shared love
                        for weekend getaways and trying out the latest food spots in Jakarta has blossomed into this
                        exciting journey of documenting our adventures.
                    </p>
                    <p class="text-xl text-black mb-6">
                        Through this blog, we aim to share our authentic experiences – the breathtaking landscapes that
                        leave us in awe, the hidden culinary gems we stumble upon, and the funny little moments that
                        make our travels unique. Whether you're looking for inspiration for your next trip, craving a
                        new restaurant recommendation in Jakarta, or simply curious about our life as a travel-loving
                        couple, you've come to the right place!
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <div class="bg-white text-black px-4 py-2 rounded-lg border-4 border-black font-bold">
                            Travel Enthusiasts
                        </div>
                        <div class="bg-white text-black px-4 py-2 rounded-lg border-4 border-black font-bold">
                            Food Lovers
                        </div>
                        <div class="bg-white text-black px-4 py-2 rounded-lg border-4 border-black font-bold">
                            Jakarta Explorers
                        </div>
                        <div class="bg-white text-black px-4 py-2 rounded-lg border-4 border-black font-bold">
                            Sharing Our Journey
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 w-full h-16 bg-green-600"></div>
    </section>

    <!-- Favorite Section -->
    <section id="favorites" class="bg-green-600 py-16 relative">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-white mb-4">OUR FAVORITE ADVENTURES</h2>
                <div class="w-32 h-2 bg-white mx-auto mb-6"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div
                    class="bg-white p-6 rounded-lg border-4 border-black text-center transform hover:scale-105 transition">
                    <div class="text-4xl mb-4 jump-animate">⛰️</div>
                    <h3 class="text-xl font-bold mb-2">Mountain Escapes</h3>
                    <p class="text-gray-700">Finding serenity in the highlands.</p>
                </div>
                <div
                    class="bg-white p-6 rounded-lg border-4 border-black text-center transform hover:scale-105 transition">
                    <div class="text-4xl mb-4 jump-animate" style="animation-delay: 0.2s">
                        🏖️
                    </div>
                    <h3 class="text-xl font-bold mb-2">Beach Getaways</h3>
                    <p class="text-gray-700">Sun, sand, and salty air adventures.</p>
                </div>
                <div
                    class="bg-white p-6 rounded-lg border-4 border-black text-center transform hover:scale-105 transition">
                    <div class="text-4xl mb-4 jump-animate" style="animation-delay: 0.4s">
                        🍜
                    </div>
                    <h3 class="text-xl font-bold mb-2">Local Flavors</h3>
                    <p class="text-gray-700">Exploring the heart of Jakarta's cuisine.</p>
                </div>
                <div
                    class="bg-white p-6 rounded-lg border-4 border-black text-center transform hover:scale-105 transition">
                    <div class="text-4xl mb-4 jump-animate" style="animation-delay: 0.6s">
                        ☕
                    </div>
                    <h3 class="text-xl font-bold mb-2">Cozy Cafes</h3>
                    <p class="text-gray-700">Our favorite spots for a relaxing break.</p>
                </div>
            </div>
        </div>
        <div class="absolute -bottom-4 left-0 w-full flex justify-center">
            <div
                class="bg-green-700 w-64 h-16 rounded-lg border-4 border-black flex items-center justify-center pipe-animate">
                <div class="w-16 h-16 bg-black rounded-full"></div>
            </div>
        </div>
    </section>

    <!-- journey Section -->
    <section id="journey" class="py-16 bg-white relative">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-black mb-4">OUR RECENT EXPLORATIONS</h2>
                <div class="w-32 h-2 bg-red-500 mx-auto mb-6"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($listJourney as $l)
                    <a href="javascript:void(0);"
                        onclick="openModal('{{ $l->IMG }}', '{{ $l->JUDUL }}', '{{ $l->DATE }}', '{{ $l->TAG }}', '{{ $l->ID }}')"
                        class="block">
                        <div
                            class="bg-gray-100 rounded-lg border-4 border-black overflow-hidden transform hover:scale-105 transition">
                            <img src="storage/perjalanan/{{ $l->IMG }}" alt="Our Journey"
                                class="w-full h-48 object-cover" />
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $l->JUDUL }}</h3>
                                <time datetime="2024-04-10"
                                    class="text-gray-700 italic mb-5">{{ $l->DATE }}</time>

                                <div class="flex flex-wrap gap-2 mt-2">
                                    @foreach (explode(',', $l->TAG) as $tag)
                                        @php
                                            $tag = trim($tag);
                                            $colors = [
                                                'bg-red-300',
                                                'bg-red-400',
                                                'bg-red-500',
                                                'bg-green-300',
                                                'bg-green-400',
                                                'bg-green-500',
                                                'bg-blue-300',
                                                'bg-blue-400',
                                                'bg-blue-500',
                                                'bg-yellow-300',
                                                'bg-yellow-400',
                                                'bg-yellow-500',
                                                'bg-purple-300',
                                                'bg-purple-400',
                                                'bg-purple-500',
                                                'bg-pink-300',
                                                'bg-pink-400',
                                                'bg-pink-500',
                                                'bg-indigo-300',
                                                'bg-indigo-400',
                                                'bg-indigo-500',
                                                'bg-orange-300',
                                                'bg-orange-400',
                                                'bg-orange-500',
                                                'bg-teal-300',
                                                'bg-teal-400',
                                                'bg-teal-500',
                                                'bg-cyan-300',
                                                'bg-cyan-400',
                                                'bg-cyan-500',
                                            ];
                                            $hash = crc32($tag); // Or md5($tag) for a longer hash (more unique colors)
                                            $index = abs($hash) % count($colors); // Ensure index is within the bounds of the array
                                            $randomColor = $colors[$index];
                                        @endphp
                                        @if ($tag != '')
                                            <span
                                                class="text-black px-2 py-1 rounded text-sm {{ $randomColor }}">{{ $tag }}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="text-center mt-4">

                <h2 class="text-4xl font-bold text-red-600 ">Wanna Read Another ?</h2>
                <a href="/ourjourney" role="button"
                    class="mt-4 bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-lg border-4 border-black transition transform hover:scale-105 w-6/12 inline-block text-center">
                    Read More ..
                </a>
            </div>
        </div>
    </section>

    {{-- Modal Journey --}}
    <div id="myModal"
        class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-2 overflow-x-hidden">
        <div
            class="modal-content relative bg-white rounded-2xl p-4 w-full max-w-lg max-h-screen overflow-y-auto shadow-lg box-border">
            <!-- Close button -->
            <button
                class="close absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-2xl font-bold">&times;</button>

            <!-- Image -->
            <img id="modalImage" src="" alt="Journey Image" class="w-full h-auto rounded-lg mb-4" />

            <!-- Title -->
            <h3 id="modalTitle" class="text-2xl font-bold mb-2"></h3>

            <!-- Date -->
            <time id="modalDate" class="block text-gray-500 italic mb-4 font-medium"></time>

            <!-- Detail -->
            <div id="modalDetail" class="text-justify leading-relaxed [&>p]:mb-4"></div>

            <!-- Tags -->
            <div id="modalTags" class="flex flex-wrap gap-2 mt-4"></div>
        </div>
    </div>


    <!-- Contact Section -->
    <section id="contact" class="bg-red-500 py-16 relative ">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-white mb-4">GOT A SUGGESTION?</h2>
                <div class="w-32 h-2 bg-white mx-auto mb-6"></div>
                <p class="text-xl text-white max-w-2xl mx-auto">
                    Know a must-visit spot in Jakarta or beyond? Tell us where our next adventure should be!
                </p>
            </div>
            <div class="max-w-2xl mx-auto bg-white rounded-lg border-4 border-black p-8 relative mb-2">
                <div class="absolute -top-6 -right-6 text-4xl jump-animate">📍</div>
                <form method="POST" action="{{ route('send.suggestion') }}">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block text-black font-bold mb-2">Your Name</label>
                        <input type="text" id="name" name="name"
                            class="w-full px-4 py-2 border-2 border-black rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block text-black font-bold mb-2">Your Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full px-4 py-2 border-2 border-black rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                    </div>
                    <div class="mb-6">
                        <label for="suggestion" class="block text-black font-bold mb-2">Your Suggestion</label>
                        <textarea id="suggestion" name="suggestion" rows="5"
                            class="w-full px-4 py-2 border-2 border-black rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Where should Yan & Yen explore next?"></textarea>
                    </div>
                    <button type="submit"
                        class="bg-yellow-400 hover:bg-yellow-300 text-black font-bold py-3 px-6 rounded-lg border-4 border-black transition transform hover:scale-105 w-full">
                        SEND SUGGESTION
                    </button>
                </form>

            </div>
        </div>
        <div class="absolute bottom-0 left-0 w-full h-16 bg-black "></div>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-white py-8 relative">
        <div class="container mx-auto px-4 text-center">
            <div class="flex justify-center space-x-6 mb-6">
                <a href="#" class="text-2xl hover:text-yellow-400 transition">🐦</a>
                <a href="#" class="text-2xl hover:text-blue-400 transition">💼</a>
                <a href="#" class="text-2xl hover:text-purple-400 transition">👾</a>
                <a href="#" class="text-2xl hover:text-red-500 transition">🛠️</a>
            </div>
            <p class="mb-4">
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                <a href="https://yanwarsp.netlify.app/" class="text-yellow-400">Yanwar</a>. All rights
                reserved.
            </p>
            <p class="text-gray-400 text-sm">Made with ♥ in the Pelican Town</p>
        </div>
        <div class="absolute top-0 left-0 w-full flex justify-center -mt-8">
            <div class="flex">
                <div
                    class="w-16 h-16 bg-red-500 border-4 border-black rounded-full flex items-center justify-center text-2xl jump-animate">
                    👨‍❤️‍👩
                </div>
            </div>
        </div>
    </footer>

    <!-- Moving Mario -->
    <div class="fixed bottom-4 left-0 text-4xl move-right" style="animation-duration: 20s; z-index: 20">
        <div class="jump-animate" style="animation-duration: 0.8s">🏃‍♂️</div>
    </div>

    <script>
        function openModal(image, title, date, tags, id) {
            document.getElementById("modalImage").src = "storage/perjalanan/" + image;
            document.getElementById("modalTitle").innerText = title;
            document.getElementById("modalDate").innerText = date;

            const tagsContainer = document.getElementById("modalTags");
            tagsContainer.innerHTML = ''; // Clear previous tags

            // Split tags and trim whitespace
            const tagArray = tags.split(',').map(tag => tag.trim()).filter(tag => tag !== '');

            tagArray.forEach(tag => {
                const tagElement = document.createElement("span");
                tagElement.className = "text-black px-2 py-1 rounded text-sm bg-blue-300"; // Example color
                tagElement.innerText = tag;
                tagsContainer.appendChild(tagElement);
            });

            // Fetch detail using the ID
            fetch(`/ourjourney/${id}`) // Adjust the URL according to your routing
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Assuming the detail is in data.detail
                    document.getElementById("modalDetail").innerHTML = data.detail; // Set the detail in the modal
                    document.getElementById("myModal").style.display = "flex"; // Show the modal
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }

        // Close modal functionality
        document.querySelector('.close').onclick = function() {
            document.getElementById("myModal").style.display = "none";
        }

        // Close modal when clicking outside of the modal content
        window.onclick = function(event) {
            const modal = document.getElementById("myModal");
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>
