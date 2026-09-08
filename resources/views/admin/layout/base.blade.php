@props(['title' => ''])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        ইসলামী নব জাগরণ সংগঠন | {{ $title }}</title>
    <link rel="icon" href="{{ $setting->favicon }}">

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



<body class="font-sans antialiased bg-gray-100">

    {{-- Header --}}
    <header class="w-full bg-white/80 backdrop-blur-md shadow-sm border-b border-green-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                {{-- Logo --}}
                <a href="https://bhuiyanbarimasjid.bd" target="_blank" rel="noopener noreferrer"
                    class="flex items-center gap-3">
                    <x-application-logo class="h-10 w-auto text-white fill-current" />
                </a>

                {{-- Security Badge --}}
                <div class="hidden sm:flex items-center gap-2 text-sm text-gray-500">
                    <i class="bi bi-shield-check text-green-600"></i>
                    <span>Trusted & Secure Login</span>
                </div>

            </div>
        </div>
    </header>


    {{-- Page Content --}}
    <main class="p-6 sm:p-8 min-h-screen">
        {{ $slot }}
    </main>


    {{-- Footer --}}
    <footer class="w-full border-t border-gray-200 py-4 text-center text-sm text-gray-600 mt-5">
        <p>
            Copyright &copy; {{ date('Y') }}
            <span class="font-semibold text-black">
                Bhuiyan Bari Baytul Mamur Jame Masjid
            </span>.
            All rights reserved.
        </p>
    </footer>


    {{-- Core JS Libraries --}}
    <script src="{{ asset('public/admin/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('public/admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/admin/js/font-awesome.js') }}"></script>
    <script src="{{ asset('public/admin/js/main.js') }}"></script>


    {{-- Plugin JS Libraries --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.ckbox.io/ckbox/2.6.1/ckbox.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>


    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


    @stack('scripts')


    {{-- DataTables + Notifications --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // Simple DataTables
            if (typeof simpleDatatables !== 'undefined') {
                document.querySelectorAll(
                    '#adminTable, #adminTable2, #adminTables, #adminTable3'
                ).forEach((table) => {
                    new simpleDatatables.DataTable(table);
                });
            }


            // Success Message
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: @json(session('success')),
                    timer: 2500,
                    showConfirmButton: false
                });
            @endif


            // Warning Message
            @if (session('message'))
                Swal.fire({
                    icon: 'warning',
                    title: 'Notice',
                    text: @json(session('message'))
                });
            @endif


            // Error Message
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: @json(session('error'))
                });
            @endif


            // Validation Errors
            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: @json(
                        '<ul style="text-align:left;color:red;margin:0;padding-left:20px;">' .
                            implode('', array_map(fn($error) => '<li>' . e($error) . '</li>', $errors->all())) .
                            '</ul>')
                });
            @endif

        });
    </script>


    {{-- Dropzone / Image Upload --}}
    <script>
        function initDropzones() {

            document.querySelectorAll('.dropzone-container').forEach(container => {

                const name = container.dataset.name;

                const dropzone = document.getElementById(`dropzone-${name}`);
                const fileInput = document.getElementById(name);
                const uploadInterface = document.getElementById(`upload-interface-${name}`);
                const preview = document.getElementById(`${name}-preview`);

                if (!dropzone || !fileInput || !uploadInterface || !preview) {
                    return;
                }


                const handleFile = (file) => {

                    if (!file.type.startsWith('image/')) {
                        alert('Only image files are allowed.');
                        return;
                    }

                    const dataTransfer = new DataTransfer();

                    dataTransfer.items.add(file);
                    fileInput.files = dataTransfer.files;


                    const reader = new FileReader();

                    reader.onload = (event) => {
                        preview.src = event.target.result;

                        uploadInterface.classList.add('hidden');
                        preview.classList.remove('hidden');
                    };

                    reader.readAsDataURL(file);
                };


                // Click to upload
                dropzone.addEventListener('click', () => {
                    fileInput.click();
                });


                // Drag over
                dropzone.addEventListener('dragover', (event) => {
                    event.preventDefault();

                    dropzone.classList.add(
                        'border-blue-400',
                        'bg-blue-50'
                    );
                });


                // Drag leave
                dropzone.addEventListener('dragleave', () => {
                    dropzone.classList.remove(
                        'border-blue-400',
                        'bg-blue-50'
                    );
                });


                // Drop
                dropzone.addEventListener('drop', (event) => {

                    event.preventDefault();

                    dropzone.classList.remove(
                        'border-blue-400',
                        'bg-blue-50'
                    );

                    const file = event.dataTransfer.files[0];

                    if (file) {
                        handleFile(file);
                    }
                });


                // File input
                fileInput.addEventListener('change', () => {

                    const file = fileInput.files[0];

                    if (file) {
                        handleFile(file);
                    }
                });

            });
        }


        document.addEventListener('DOMContentLoaded', initDropzones);

        window.initDropzones = initDropzones;
    </script>


    {{-- Template / Post Type Fields --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const templateSelect = document.getElementById('templateSelect');
            const memberTypeWrapper = document.getElementById('memberTypeWrapper');
            const postTypeSelect = document.getElementById('postTypeSelect');
            const awardsWrapper = document.getElementById('awardsWrapper');
            const awardsYearWrapper = document.getElementById('awardsYearWrapper');
            const newsType = document.getElementById('news_type');


            const toggleFields = () => {

                const template = templateSelect?.value;
                const type = postTypeSelect?.value;


                memberTypeWrapper?.classList.toggle(
                    'hidden',
                    template !== 'members'
                );


                awardsYearWrapper?.classList.toggle(
                    'hidden',
                    template !== 'awards'
                );


                awardsWrapper?.classList.toggle(
                    'hidden',
                    template !== 'awards'
                );


                newsType?.classList.toggle(
                    'hidden',
                    type !== 'news'
                );
            };


            toggleFields();

            templateSelect?.addEventListener(
                'change',
                toggleFields
            );

            postTypeSelect?.addEventListener(
                'change',
                toggleFields
            );

        });
    </script>


    {{-- Summernote --}}
    <script>
        $(document).ready(function() {

            $('#editor, #editor2, #editor3').each(function() {

                if ($(this).length) {
                    $(this).summernote({
                        height: 200
                    });
                }

            });

        });
    </script>


    {{-- Tom Select + Permissions --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const multiselect = document.getElementById('multiselect');

            if (multiselect && typeof TomSelect !== 'undefined') {

                new TomSelect('#multiselect', {
                    plugins: ['remove_button'],
                    create: false,
                    persist: false
                });

            }

        });


        function checkAll() {

            document
                .querySelectorAll('.permission-checkbox')
                .forEach(checkbox => {
                    checkbox.checked = true;
                });

        }


        function clearAll() {

            document
                .querySelectorAll('.permission-checkbox')
                .forEach(checkbox => {
                    checkbox.checked = false;
                });

        }
    </script>


    {{-- Member Type --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const template = document.getElementById('template');
            const memberTypeWrapper = document.getElementById('memberTypeWrapper');


            if (!template || !memberTypeWrapper) {
                return;
            }


            const toggleMemberType = () => {

                const show =
                    template.value === 'member' ||
                    template.value === 'committee';


                memberTypeWrapper.style.display =
                    show ? 'block' : 'none';

            };


            toggleMemberType();

            template.addEventListener(
                'change',
                toggleMemberType
            );

        });
    </script>

</body>

</html>
