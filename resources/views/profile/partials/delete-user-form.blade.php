<v-card elevation="5" class="ml-5 mr-5 mb-5">
    <v-card-title>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>
    </v-card-title>
    <v-card-text>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
            </br/>
            {{ __('Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </v-card-text>
    <v-card-text>
    <x-danger-button @click="dialog = true">
        {{ __('Delete Account') }}
    </x-danger-button>

    <x-modal DialogWidth="600" CardTitleIcon="mdi-account-cancel" CardTitle="Confirm User Deletion">
        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')
            <v-card-text>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="mt-6">
                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('Password') }}"
                    />

                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>
            </v-card-text>
            <v-card-actions>
                <v-row class="mb-5 pl-5 pr-5 justify-space-between">
                    <x-secondary-button @click="dialog = false">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button>
                        {{ __('Delete Account') }}
                    </x-danger-button>
                </v-row>
            </v-card-actions>


{{--            @section('CardActions')--}}
{{--                <x-secondary-button @click="dialog = false">--}}
{{--                    {{ __('Cancel') }}--}}
{{--                </x-secondary-button>--}}
{{--                <v-spacer></v-spacer>--}}
{{--                <x-danger-button>--}}
{{--                    {{ __('Delete Account') }}--}}
{{--                </x-danger-button>--}}
{{--            @endsection--}}
        </form>
    </x-modal>
    </v-card-text>
</v-card>
