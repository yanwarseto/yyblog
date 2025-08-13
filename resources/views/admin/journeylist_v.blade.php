<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="couple.png" type="image/x-icon">


    <script src="https://cdn.jsdelivr.net/npm/tinymce@7.4.1/tinymce.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tinymce@7.4.1/skins/ui/oxide/content.min.css" rel="stylesheet">
</head>

<style>
    input[type=file] {
        width: 100%;
        max-width: 350px;
        color: #444;
        padding: 5px;
        background: #fff;
        border-radius: 10px;
        border: 1px solid #555;
    }

    input[type=file]::file-selector-button {
        margin-right: 20px;
        border: none;
        background: #084cdf;
        padding: 10px 20px;
        border-radius: 10px;
        color: #fff;
        cursor: pointer;
        transition: background .2s ease-in-out;
    }

    input[type=file]::file-selector-button:hover {
        background: #0d45a5;
    }
</style>

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
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Our Journey</h2>
        <!-- Trigger Button -->
        <button id="openModal"
            class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
            Add New Journey
        </button>

        <!-- Modal Background -->
        <div id="journeyModal"
            class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden transition-opacity duration-300 ease-out flex items-start justify-center overflow-y-auto">
            <!-- Modal Content -->
            <div id="journeyContent"
                class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4 md:mx-0 p-6 relative transform transition-all duration-300 scale-95 opacity-0">
                <!-- Close Button -->
                <button id="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <!-- Modal Form -->
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Add Our New Journey</h2>
                <form action="{{ route('journey.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Journey</label>
                        <input type="text" name="judul" id="judul" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500">
                    </div>
                    <div class="mb-4">
                        <label for="tag" class="block text-sm font-medium text-gray-700">Berikan Tag <span
                                class="text-red-400"> (berikan koma tiap tag) </span></label>
                        <input type="text" name="tag" id="tag" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-white"
                            style="margin-right: 4rem;">
                            Pilih File
                        </label>
                        <div class="mt-1">
                            <label for="fileimage" class="drop-container" id="dropcontainer">
                                <input type="file" name="fileimage" id="fileimage" accept=".jpg,.png,.jpeg">
                                <span id="fileSizeError" style="color:red; display:none;">File size exceeds 3MB</span>
                            </label>
                            <p style="font-size: 12px;">
                                <span class="text-danger" style="font-size: 12px;">* Hanya file jpg, png maksimal 10
                                    MB</span><br>
                            </p>
                        </div>
                        <script>
                            document.getElementById('fileimage').addEventListener('change', function() {
                                const file = this.files[0];
                                const maxSize = 10 * 1024 * 1024;

                                if (file && file.size > maxSize) {
                                    document.getElementById('fileSizeError').style.display = 'block';
                                    this.value = '';
                                } else {
                                    document.getElementById('fileSizeError').style.display = 'none';
                                }
                            });
                        </script>
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 px-4 py-6 max-w-7xl mx-auto">
            @foreach ($listJourney as $l)
                <div
                    class="group relative bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">

                    {{-- Gambar --}}
                    <div class="overflow-hidden rounded-t-xl">
                        <img class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300"
                            src="{{ asset('storage/perjalanan/' . $l->IMG) }}" alt="Journey image">
                    </div>

                    {{-- Tombol Edit & Delete muncul saat hover (posisi atas kanan) --}}
                    <div
                        class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex space-x-2 z-20">
                        <a href="javascript:void(0)"
                            class="editBtn bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1 rounded shadow"
                            data-id="{{ $l->ID }}" data-judul="{{ $l->JUDUL }}"
                            data-tag="{{ $l->TAG }}" data-deskripsi="{{ $l->DETAIL }}"
                            data-img="{{ $l->IMG }}">
                            Edit
                        </a>
                        <form action="{{ route('journey.delete', $l->ID) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus journey ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white text-xs px-3 py-1 rounded shadow">Delete</button>
                        </form>
                    </div>

                    {{-- Konten --}}
                    <div class="flex flex-col flex-grow p-5">
                        {{-- Judul --}}
                        <h3 class="text-lg font-semibold text-gray-900 mb-1 line-clamp-2">{{ $l->JUDUL }}</h3>
                        {{-- Date --}}
                        <p class="text-sm text-gray-500 mb-3">{{ \Carbon\Carbon::parse($l->DATE)->format('d M Y') }}
                        </p>

                        {{-- Tags --}}
                        <div class="mt-auto flex flex-wrap gap-2">
                            @foreach (explode(',', $l->TAG) as $tag)
                                @php $tag = trim($tag); @endphp
                                @if ($tag != '')
                                    <span
                                        class="bg-gray-200 text-gray-700 text-xs font-medium px-3 py-1 rounded-full hover:bg-gray-300 cursor-default select-none">
                                        #{{ $tag }}
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        {{-- Edit Journey --}}
        <div id="editJourneyModal"
            class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden flex items-start justify-center overflow-y-auto">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4 md:mx-0 p-6 relative mt-12">
                <!-- Close button -->
                <button id="closeEditModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Journey</h2>
                <form id="editJourneyForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" id="editJourneyId">

                    <div class="mb-4">
                        <label for="editJudul" class="block text-sm font-medium text-gray-700">Judul Journey</label>
                        <input type="text" name="judul" id="editJudul" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500">
                    </div>

                    <div class="mb-4">
                        <label for="editTag" class="block text-sm font-medium text-gray-700">Berikan Tag <span
                                class="text-red-400">(berikan koma tiap tag)</span></label>
                        <input type="text" name="tag" id="editTag" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500">
                    </div>

                    <div class="mb-4">
                        <label for="editFileimage" class="block text-sm font-medium text-gray-700">Pilih File
                        </label>
                        <input type="file" name="fileimage" id="editFileimage" accept=".jpg,.png,.jpeg"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-purple-50 file:text-purple-700
                    hover:file:bg-purple-100">
                        <span id="fileSizeError" style="color:red; display:none;">File size exceeds 10MB</span>
                        <p id="editImg" class="mb-2 text-sm text-gray-600">
                            File lama: <a href="#" target="_blank" id="oldFileLink"
                                class="text-blue-600 underline">Download</a>
                        </p>
                    </div>

                    <div class="mb-4">
                        <label for="editDeskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" id="editDeskripsi" rows="4"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500"></textarea>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="button" id="cancelEditBtn"
                            class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500">Batal</button>
                        <button type="submit"
                            class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        const toggle = document.getElementById('menuToggle');
        const menu = document.getElementById('mobileMenu');
        toggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        //
        const openModalBtn = document.getElementById('openModal');
        const closeModalBtn = document.getElementById('closeModal');
        const modal = document.getElementById('journeyModal');
        const content = document.getElementById('journeyContent');

        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
            setTimeout(() => {
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10); // slight delay for transition to apply
        });

        const closeModal = () => {
            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300); // match transition duration
        };

        closeModalBtn.addEventListener('click', closeModal);

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });

        tinymce.init({
            selector: 'textarea', // Target all textareas on the page
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | bold italic backcolor | \
                                                                                                                                                                                                                                                                                                                                                      alignleft aligncenter alignright alignjustify | \
                                                                                                                                                                                                                                                                                                                                                      bullist numlist outdent indent | removeformat | help',
            height: 300 // Set the height of the editor
        });

        //
        document.querySelectorAll('.editBtn').forEach(btn => {
            btn.addEventListener('click', function() {
                // Ambil data dari atribut data-*
                const id = this.dataset.id;
                const judul = this.dataset.judul;
                const tag = this.dataset.tag;
                const deskripsi = this.dataset.deskripsi;
                console.log(deskripsi);
                const oldFileLink = document.getElementById('oldFileLink');
                const editImgP = document.getElementById('editImg');

                // Isi form modal
                document.getElementById('editJourneyId').value = id;
                document.getElementById('editJudul').value = judul;
                document.getElementById('editTag').value = tag;
                document.getElementById('editDeskripsi').value = deskripsi;
                tinymce.get('editDeskripsi').setContent(deskripsi);
                if (this.dataset.img) {
                    // Buat link ke file lama (sesuaikan base URL storage kamu)
                    oldFileLink.href = `/storage/perjalanan/${this.dataset.img}`;
                    oldFileLink.textContent = this.dataset.img;
                    editImgP.style.display = 'block'; // tampilkan paragraf
                } else {
                    editImgP.style.display = 'none'; // sembunyikan jika ga ada file lama
                }

                // Set form action ke route update sesuai ID
                const form = document.getElementById('editJourneyForm');
                form.action = `/journey/${id}`;

                // Tampilkan modal
                document.getElementById('editJourneyModal').classList.remove('hidden');
            });
        });

        function closeEditModal() {
            document.getElementById('editJourneyModal').classList.add('hidden');
        }

        // Close modal tombol & tombol batal
        document.getElementById('closeEditModal').addEventListener('click', closeEditModal);
        document.getElementById('cancelEditBtn').addEventListener('click', closeEditModal);

        // Validasi file size 10MB
        document.getElementById('editFileimage').addEventListener('change', function() {
            const file = this.files[0];
            const maxSize = 10 * 1024 * 1024; // 10MB

            if (file && file.size > maxSize) {
                document.getElementById('fileSizeError').style.display = 'block';
                this.value = '';
            } else {
                document.getElementById('fileSizeError').style.display = 'none';
            }
        });
    </script>

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
