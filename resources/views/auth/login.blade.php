<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <v-container fluid class="fill-height">
        <v-row align="center" justify="center">
            <v-col cols="12" md="6" lg="4">
                <v-card class="pa-4 rounded-xl">
                    <!-- Logo Row -->
                    <x-application-logo/>
                    <v-card-subtitle class="text-h6 text-center">
                        Your Tasks. Your Flow.
                    </v-card-subtitle>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <v-row class="mt-5 mb-5">
                                <!-- Email Address -->
                                <v-col cols="12">
                                    <x-text-input label="{{ __('Email') }}" type="email" name="email" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </v-col>

                                <!-- Password -->
                                <v-col cols="12">
                                    <x-text-input label="{{ __('Password') }}" type="password" name="password" required autocomplete="current-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </v-col>

                                <!-- Remember Me -->
{{--                                    <v-col cols="12">--}}
{{--                                        <label for="remember_me" class="inline-flex items-center">--}}
{{--                                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">--}}
{{--                                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                                        </label>--}}
{{--                                    </v-col>--}}

                            </v-row>
                            <v-card-actions>
                                Don't have an account?
                                @if (Route::has('register'))
                                    <x-primary-button type="button" href="{{ route('register') }}" variant="plain" class="text-primary font-weight-bold">
                                        {{ __('Sign Up') }}
                                    </x-primary-button>
                                @endif
                                <v-spacer></v-spacer>
{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot your password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}

                                <x-primary-button prepend-icon="mdi-login" color="primary">
                                    {{ __('Sign In') }}
                                </x-primary-button>
                            </v-card-actions>
                        </form>
                </v-card>
            </v-col>
        </v-row>
    </v-container>


{{--    <form method="POST" action="{{ route('login') }}">--}}
{{--        @csrf--}}

{{--        <!-- Email Address -->--}}
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input id="password" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="current-password" />--}}

{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Remember Me -->--}}
{{--        <div class="block mt-4">--}}
{{--            <label for="remember_me" class="inline-flex items-center">--}}
{{--                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">--}}
{{--                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--            </label>--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            @if (Route::has('password.request'))--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">--}}
{{--                    {{ __('Forgot your password?') }}--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            <x-primary-button class="ms-3">--}}
{{--                {{ __('Log in') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
    @section('AppScript')
        <script>
            var data = {

            }
        </script>
    @endsection
</x-guest-layout>
