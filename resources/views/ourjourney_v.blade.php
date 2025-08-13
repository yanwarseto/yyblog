<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Y & Y Adventures - Our Journey</title>
    <link rel="icon" href="couple.png" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Pixel background consistent with main site */
        .bg-pixel {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="%2341b06e"><rect width="8" height="8"/></svg>');
            background-size: 16px 16px;
        }

        /* Animations similar to main site */
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

        .pipe-animate {
            animation: pipeAnimation 2s ease-in-out infinite;
        }

        .coin-spin {
            animation: coinSpin 2s linear infinite;
        }

        /* Modal styles */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            z-index: 50;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
            transition: opacity 0.3s ease;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 8px;
            animation: fadeIn 0.3s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body class="bg-blue-400 font-mono overflow-x-hidden bg-pixel min-h-screen flex flex-col">

    <!-- Header -->
    <header class="container mx-auto px-4 py-8 relative z-10">
        <div class="flex items-center">
            <a href="/" class="flex items-center space-x-2 no-underline">
                <div class="text-4xl mr-2 jump-animate select-none">👨‍❤️‍👩</div>
                <h1
                    class="text-3xl font-bold text-white bg-red-500 px-4 py-2 rounded-lg border-4 border-black shadow-lg">
                    Y<span class="text-yellow-300 px-2">&</span>Y Adventures
                </h1>
            </a>
        </div>
    </header>

    <main class="container mx-auto px-4 py-16 flex-grow">
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($listJourney as $l)
                <article
                    class="bg-white border-4 border-black rounded-lg shadow-lg overflow-hidden transform transition hover:scale-105 cursor-pointer flex flex-col">
                    <img src="storage/perjalanan/{{ $l->IMG }}" alt="{{ $l->JUDUL }}"
                        class="h-48 w-full object-cover border-b-4 border-black" />
                    <div class="p-6 flex flex-col flex-grow">
                        <h2 class="text-2xl font-bold mb-2 border-b-2 border-red-500 pb-1">{{ $l->JUDUL }}</h2>
                        <time datetime="{{ $l->DATE }}"
                            class="text-gray-700 italic mb-3">{{ $l->DATE }}</time>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach (explode(',', $l->TAG) as $tag)
                                @php
                                    $tag = trim($tag);
                                    $colors = [
                                        'bg-red-300',
                                        'bg-green-300',
                                        'bg-blue-300',
                                        'bg-yellow-300',
                                        'bg-purple-300',
                                        'bg-orange-300',
                                    ];
                                    $hash = crc32($tag);
                                    $index = abs($hash) % count($colors);
                                    $randomColor = $colors[$index];
                                @endphp
                                @if ($tag != '')
                                    <span
                                        class="text-black px-2 py-1 rounded text-sm {{ $randomColor }}">{{ $tag }}</span>
                                @endif
                            @endforeach
                        </div>
                        <button
                            onclick="openModal('{{ $l->IMG }}', '{{ $l->JUDUL }}', '{{ $l->DATE }}', '{{ $l->TAG }}', '{{ $l->ID }}')"
                            class="self-start bg-red-500 border-4 border-black rounded px-4 py-2 text-white font-bold transition hover:bg-red-600 hover:scale-105">
                            Read More &gt;&gt;
                        </button>

                    </div>
                    <div class="absolute top-3 right-3 text-2xl coin-spin select-none">🌓</div>
                </article>
            @endforeach
        </section>

        <!-- Pagination -->
        <div class="flex justify-center mt-8">
            {{ $listJourney->links('vendor.pagination.tailwind') }}
        </div>
    </main>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()" class="cursor-pointer">&times;</span>
            <img id="modalImage" src="" alt="" class="w-full h-48 object-cover mb-4 rounded" />
            <h2 id="modalTitle" class="text-2xl font-bold mb-2 text-center"></h2>
            <time id="modalDate" class="text-gray-700 italic mb-3 font-bold"></time>
            <div id="modalDetail" class="text-gray-800 mb-6">
            </div>
            <div id="modalTags" class="flex flex-wrap gap-2 mb-4"></div>
        </div>
    </div>

    <div class="text-center mt-4 mb-4">
        <a href="/" role="button"
            class="mt-4 bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-lg border-4 border-black transition transform hover:scale-105 w-6/12 inline-block text-center">
            Back To Home
        </a>
    </div>

    <!-- Footer -->
    <footer class="bg-black text-white py-8 relative mt-auto">
        <div class="container mx-auto px-4 text-center">
            <p class="mb-4">©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                Yan & Yen Adventures. All rights reserved.
            </p>
            <p class="text-gray-400 text-sm">Made with ♥ in the Pelican Town</p>
        </div>
    </footer>

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
                    document.getElementById("myModal").style.display = "block"; // Show the modal
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }

        // Close the modal when clicking outside of it
        window.onclick = function(event) {
            const modal = document.getElementById("myModal");
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>

</html>
