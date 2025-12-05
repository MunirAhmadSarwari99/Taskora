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
            <v-navigation-drawer color="background" elevation="4" permanent width="260">
                <v-container>
                    <h2 class="text-white mb-6">
                        <x-application-logo/>
                    </h2>

                    <v-list nav>

                        <v-list-item prepend-icon="mdi-view-dashboard" title="Dashboard"></v-list-item>
                        <v-list-item prepend-icon="mdi-calendar" title="Calendar"></v-list-item>
                        <v-list-item prepend-icon="mdi-account-group" title="Projects"></v-list-item>
                        <v-list-item prepend-icon="mdi-cog" title="Settings"></v-list-item>

                    </v-list>
                </v-container>
            </v-navigation-drawer>
            <v-app-bar color="background">
                <v-app-bar-title>
                    Dashboard
                </v-app-bar-title>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link icon :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        <v-icon>mdi-power</v-icon>
                    </x-dropdown-link>
                </form>
            </v-app-bar>
            <v-main>
                {{ $slot }}
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
