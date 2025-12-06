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
            <!-- ================= SIDEBAR ================= -->
            @include('layouts.navigation')
            <v-app-bar color="background">
                <v-app-bar-title>
                    Dashboard
                </v-app-bar-title>


            </v-app-bar>
            <v-main>
                <v-container>
                    {{ $slot }}
                </v-container>
            </v-main>
        </v-app>
    </div>
    <!-- Vue 3 -->
    <script src="{{ asset('build/assets/js/vue.global.js') }}"></script>
    <!-- Vuetify JS -->
    <script src="{{ asset('build/assets/js/vuetify.min.js') }}"></script>
    <!-- App Script -->
    @yield('AppScript')
    <script>
        const { createApp } = Vue
        const { createVuetify } = Vuetify

        const vuetify = createVuetify({
            theme: {
                defaultTheme: 'dark',
                themes: {
                    light: {
                        colors: {
                            primary: '#4A6CF7',   // Taskora Blue
                            secondary: '#1E293B',
                            accent: '#FACC15',
                            success: '#22C55E',
                            error: '#EF4444',
                            background: '#F8FAFC',
                            surface: '#FFFFFF',
                        }
                    },
                    dark: {
                        colors: {
                            primary: '#4A6CF7',
                            secondary: '#CBD5E1',
                            accent: '#FACC15',
                            background: '#0F172A',
                            surface: '#1E293B',
                        }
                    }
                }
            }
        })

        createApp(data).use(vuetify).mount('#app')
    </script>
    </body>
</html>
