@props(['title' => ''])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BH | {{ $title }}</title>
    <link rel="icon" href="{{ asset($setting->favicon) }}">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('public/admin/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" />

    <!-- Summernote CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>


    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="font-sans antialiased bg-gray-100 min-h-screen">


    <!-- Page Content -->
    {{ $slot }}

    <footer class="w-full border-t border-gray-200 py-4 text-center text-sm text-gray-600 mt-5">
        <p>
            Copyright &copy; {{ date('Y') }}
            <span class="font-semibold text-black">Larong</span>.
            All rights reserved.
        </p>
    </footer>


    <!-- Core JS Libraries -->

    <script src="{{ asset('/public/admin/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('/public/admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/public/admin/js/font-awesome.js') }}"></script>
    <script src="{{ asset('/public/admin/js/main.js') }}"></script>

    <!-- Plugin JS Libraries -->

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.ckbox.io/ckbox/2.6.1/ckbox.js" crossorigin></script>
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>



    @stack('scripts')

    <!-- Inline JS -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            document.querySelectorAll("#adminTable, #adminTable2, #adminTables, #adminTable3").forEach((table) => {
                new simpleDatatables.DataTable(table);
            });


            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    timer: 2500,
                    showConfirmButton: false
                });
            @endif
            @if (session('message'))
                Swal.fire({
                    icon: 'warning',
                    title: 'Notice',
                    text: "{{ session('message') }}"
                });
            @endif
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "{{ session('error') }}"
                });
            @endif

            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: `<ul style="text-align:left;color:red;">{!! implode('', $errors->all('<li>:message</li>')) !!}</ul>`
                });
            @endif
        });
    </script>

    <script>
        function initDropzones() {
            document.querySelectorAll('.dropzone-container').forEach(container => {
                const name = container.dataset.name;
                const dropzone = document.getElementById(`dropzone-${name}`);
                const fileInput = document.getElementById(name);
                const uploadInterface = document.getElementById(`upload-interface-${name}`);
                const preview = document.getElementById(`${name}-preview`);

                dropzone.addEventListener('click', () => fileInput.click());
                dropzone.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    dropzone.classList.add('border-blue-400', 'bg-blue-50');
                });
                dropzone.addEventListener('dragleave', () => {
                    dropzone.classList.remove('border-blue-400', 'bg-blue-50');
                });
                dropzone.addEventListener('drop', (e) => {
                    e.preventDefault();
                    dropzone.classList.remove('border-blue-400', 'bg-blue-50');
                    if (e.dataTransfer.files[0]) {
                        handleFile(e.dataTransfer.files[0]);
                    }
                });
                fileInput.addEventListener('change', () => {
                    if (fileInput.files[0]) {
                        handleFile(fileInput.files[0]);
                    }
                });

                function handleFile(file) {
                    if (!file.type.match('image.*')) {
                        alert('Only image files are allowed');
                        return;
                    }

                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    fileInput.files = dataTransfer.files;

                    const reader = new FileReader();
                    reader.onload = (e) => {
                        preview.src = e.target.result;
                        uploadInterface.classList.add('hidden');
                        preview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
        document.addEventListener('DOMContentLoaded', initDropzones);
        window.initDropzones = initDropzones;
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const templateSelect = document.getElementById('templateSelect');
            const memberTypeWrapper = document.getElementById('memberTypeWrapper');
            const postTypeSelect = document.querySelector('#postTypeSelect');
            const awardsWrapper = document.querySelector('#awardsWrapper');
            const awardsYearWrapper = document.querySelector('#awardsYearWrapper');
            const newsType = document.getElementById('news_type');

            const toggleFields = () => {
                const template = templateSelect?.value;
                const type = postTypeSelect?.value;


                memberTypeWrapper?.classList.toggle('hidden', template !== 'members');
                awardsYearWrapper?.classList.toggle('hidden', template !== 'awards');
                awardsWrapper?.classList.toggle('hidden', template !== 'Awards');
                newsType?.classList.toggle('hidden', type !== 'news');
            };

            toggleFields(); // initialize
            templateSelect?.addEventListener('change', toggleFields);
            postTypeSelect?.addEventListener('change', toggleFields);
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#editor').summernote({
                height: 200
            });
            $('#editor2').summernote({
                height: 200
            });
            $('#editor3').summernote({
                height: 200
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new TomSelect('#multiselect', {
                plugins: ['remove_button'],
                create: false,
                persist: false
            });
        });

        function checkAll() {
            document.querySelectorAll('.permission-checkbox').forEach(cb => cb.checked = true);
        }

        function clearAll() {
            document.querySelectorAll('.permission-checkbox').forEach(cb => cb.checked = false);
        }
    </script>
</body>

</html>
