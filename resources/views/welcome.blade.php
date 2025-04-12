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

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}">
                                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('Quản Lý')">
                                {{ __('Quản Lý') }}
                            </x-nav-link>
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('Support')">
                                {{ __('Support') }}
                            </x-nav-link>
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('Product')">
                                {{ __('Product') }}
                            </x-nav-link>
                        </div>
                        <div style="padding-top: 10px;transform: translateX(17cm);" class="hearder-right-login">
                            @if (Route::has('login'))
                                <nav class="flex items-center justify-end gap-4">
                                    @auth
                                        <a href="{{ url('/dashboard') }}"
                                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                            Dashboard
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                                            Log in
                                        </a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                                Register
                                            </a>
                                        @endif
                                    @endauth
                                </nav>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
    
    <section class="banner">
        <div class="banner-items">
            <div class="banner-item">
                <img src="{{ asset('frontend/asset/images/banner1.jpg') }}" alt="">
            </div>
            <div class="banner-item">
                <img src="{{ asset('frontend/asset/images/banner2.jpg') }}" alt="">
            </div>
            <div class="banner-item">
                <img src="{{ asset('frontend/asset/images/banner3.jpg') }}" alt="">
            </div>
            <div class="banner-item">
                <img src="{{ asset('frontend/asset/images/banner4.jpg') }}" alt="">
            </div>
            <div class="banner-item">
                <img src="{{ asset('frontend/asset/images/banner3.jpg') }}" alt="">
            </div>
        </div>
        <div class="banner-arrow" style="display: none;">
            <i class="ri-arrow-right-fill"></i>
            <i class="ri-arrow-left-fill"></i>
        </div>
    </section>
</body>

</html>
