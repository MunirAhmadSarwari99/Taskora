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
        <style>
            *{
                font-family: figtree;
            }
        </style>

        <!-- Vuetify CSS -->
        <link href="{{ asset('build/assets/css/vuetify.min.css') }}" rel="stylesheet">
        <!-- Material Design Icons -->
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
        <!-- Scripts -->
{{--        @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
    </head>
    <body>
    <div id="app">
        <v-app>
            <v-main style="background: #F2F2F2;">
                {{ $slot }}
            </v-main>
        </v-app>
    </div>

    <!-- Vue 3 -->
    <script src="{{ asset('build/assets/js/vue.global.js') }}"></script>
    <!-- Vuetify JS -->
    <script src="{{ asset('build/assets/js/vuetify.min.js') }}"></script>
    @yield('AppScript')
    <!-- App Script -->
    <script>
        const { createApp } = Vue
        const { createVuetify } = Vuetify

        const vuetify = createVuetify()

        createApp(data).use(vuetify).mount('#app')
    </script>
    </body>
{{--    <body class="font-sans antialiased">--}}
{{--        <div class="min-h-screen bg-gray-100">--}}
{{--            @include('layouts.navigation')--}}

{{--            <!-- Page Heading -->--}}
{{--            @isset($header)--}}
{{--                <header class="bg-white shadow">--}}
{{--                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                        {{ $header }}--}}
{{--                    </div>--}}
{{--                </header>--}}
{{--            @endisset--}}

{{--            <!-- Page Content -->--}}
{{--            <main>--}}
{{--                {{ $slot }}--}}
{{--            </main>--}}
{{--        </div>--}}
{{--    </body>--}}
</html>
