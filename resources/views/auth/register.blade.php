<x-guest-layout>
    <v-container fluid class="fill-height">
        <v-row align="center" justify="center">
            <v-col cols="12" md="6" lg="4">
                <v-card class="pa-4 rounded-xl">
                    <!-- Logo Row -->
                    <x-application-logo/>
                    <v-card-subtitle class="text-h6 text-center">
                        Your Tasks. Your Flow.
                    </v-card-subtitle>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <v-row class="mt-5 mb-5">
                            <!-- Name -->
                            <v-col cols="12">
                                <x-text-input prepend-inner-icon="mdi-account" label="{{ __('First Name') }}" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')"/>
                            </v-col>

                            <!-- Last Name -->
                            <v-col cols="12">
                                <x-text-input prepend-inner-icon="mdi-account" label="{{ __('Last Name') }}" type="text" name="lastName" :value="old('lastName')" required autofocus autocomplete="lastName" />
                                <x-input-error :messages="$errors->get('lastName')"/>
                            </v-col>

                            <!-- Email Address -->
                            <v-col cols="12">
                                <x-text-input prepend-inner-icon="mdi-email" label="{{ __('Email') }}" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')"/>
                            </v-col>

                            <!-- Password -->
                            <v-col cols="12">
                                <x-text-input prepend-inner-icon="mdi-lock" label="{{ __('Password') }}" type="password" name="password" required autocomplete="current-password" />
                                <x-input-error :messages="$errors->get('password')"/>
                            </v-col>

                            <!-- Confirm Password -->
                            <v-col cols="12">
                                <x-text-input prepend-inner-icon="mdi-lock-check" label="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')"/>
                            </v-col>
                        </v-row>
                        <v-card-actions>
                            {{ __('Already registered?') }}
                            <x-primary-button type="button" href="{{ route('login') }}" variant="plain" class="text-primary font-weight-bold">
                                {{ __('Sign In') }}
                            </x-primary-button>
                            <v-spacer></v-spacer>

                            <x-primary-button prepend-icon="mdi-login" color="primary">
                                {{ __('Sign Up') }}
                            </x-primary-button>
                        </v-card-actions>
                    </form>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
    @section('AppScript')
        <script>
            var data = {

            }
        </script>
    @endsection
</x-guest-layout>
