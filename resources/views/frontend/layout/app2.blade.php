@props(['setting', 'pageDetails', 'menus'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ isset($pageDetails) ? $pageDetails->title . ' |' : '' }} {{ $setting->title }}</title>
    <link rel="icon" href="{{ $setting->favicon ?? asset('/public/storage/default/logo.png') }}" />
    <link rel="alternate" href="https://bhuiyanbarimasjid.bd/" hreflang="bn-BD" />

    <!-- Meta Tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Open Graph -->
    <meta property="og:title"
        content="{{ $post->title ?? ($page->title ?? ($event->title ?? ($activity->title ?? ($fund->title ?? ($album->title ?? ($setting->title ?? '')))))) }}" />
    <meta property="og:description" content="{{ $setting->description }}" />
    <meta property="og:url" content="{{ url('https://bhuiyanbarimasjid.bd') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ $setting->favicon ?? asset('/public/storage/default/logo.png') }}" />
    <meta property="og:site_name" content="Bhuiyanbarimasjid" />

    <!-- Twitter Meta -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:title" content="" />
    <meta property="twitter:description" content="" />
    <meta property="twitter:image" content="" />
    <meta property="twitter:site" content="" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Lightbox2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/lightbox2@2/dist/css/lightbox.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('public/front/css/style.css') }}">
</head>

<body>
    <x-frontend.header :menus="$menus" />

    {{ $slot }}

    <x-frontend.footer :menus="$menus" />

    <!-- Lightbox2 JS (includes jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/lightbox2@2/dist/js/lightbox-plus-jquery.min.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('public/front/js/main.js') }}"></script>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 0,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            speed: 1500,
            direction: "horizontal",
            slidesPerView: 1,
        });
    </script>
</body>

</html>
