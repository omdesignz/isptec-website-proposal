<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ISPTEC') }}</title>

        <link rel="stylesheet" href="{{ asset('css/inter.css') }}">
        <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
        
        @yield('header_css')

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Scripts -->
    
        <script defer src="{{ asset('js/alpine.js') }}"></script>
        @yield('header_scripts')
        <style>
          [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="font-sans antialiased">
    <div class="bg-white" x-data="{ mobileMenuOpen: false }">
    @include('layouts.includes._mobile_navigation')
   
  </div>

  <header class="relative bg-white">
    <p class="bg-isptec h-10 flex items-center justify-center text-sm font-medium text-gray-900 px-4 sm:px-6 lg:px-8">
      Volente Nihil Difficile
    </p>

    @include('layouts.includes._navigation')
  </header>
</div>
@yield('content')

@include('layouts.includes.footer')
@yield('footer_scripts')
@include('layouts.includes._analytics')
</body>
</html>
