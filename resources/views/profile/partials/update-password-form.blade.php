<v-card elevation="0">

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <v-row class="mb-5">
            <v-col cpls="12">
                <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                <x-text-input id="update_password_current_password" prepend-inner-icon="mdi-lock" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </v-col>

            <v-col cols="12">
                <x-input-label for="update_password_password" :value="__('New Password')" />
                <x-text-input id="update_password_password" prepend-inner-icon="mdi-lock" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </v-col>

            <v-col cols="12">
                <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="update_password_password_confirmation" prepend-inner-icon="mdi-lock-check" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </v-col>

            <v-col cols="12">
                <x-primary-button color="primary" block>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'password-updated')
                    <x-snackbar color="success"></x-snackbar>
                @endif
            </v-col>
        </v-row>
    </form>
</v-card>
