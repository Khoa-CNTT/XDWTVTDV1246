<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/asset/css/style.css') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@stack('scripts')
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const sliderItem = document.querySelectorAll('.slider-item')
        for (let index = 0; index < sliderItem.length; index++) {

            sliderItem[index].style.left = index * 100 + "%"

        }

        const sliderItems = document.querySelector('.slider-items')
        const arrowRight = document.querySelector('.ri-arrow-right-fill')
        const arrowLeft = document.querySelector('.ri-arrow-left-fill')
        let i = 0
        if (arrowRight != null && arrowLeft != null) {
            arrowRight.addEventListener('click', () => {
                if (i < sliderItem.length - 1) {
                    i++
                    sliderMove(i)
                } else {
                    return false
                }
            })
            arrowLeft.addEventListener('click', () => {
                if (i <= 0) {
                    return false
                } {
                    i--
                    sliderMove(i)
                }
            })
            function autoSlider() {
                if (i < sliderItem.length - 1) {
                    i++
                    sliderMove(i)
                } else {
                    i = 0
                    sliderMove(i)
                }
            }
        }
        function sliderMove(i) {
            sliderItems.style.left = -i * 100 + "%"
        }
        setInterval(autoSlider, 3000)});
    </script>
</body>

</html>
