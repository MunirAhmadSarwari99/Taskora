 <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <v-row class="ma-5">
        <v-col cols="12" class="font-weight-bold text-h5">
            {{ __('Profile Information') }}
        </v-col>
        <v-col cols="12">
            <v-row>
                <v-col cols="12" md="6">
                    <x-input-label for="name" :value="__('First Name')" />
                    <x-text-input  v-model="user.name" error-messages="errors.name" id="name" name="name" type="text" required autofocus autocomplete="name" />
                </v-col>
                <v-col cols="12" md="6">
                    <x-input-label for="lastName" :value="__('Last Name')" />
                    <x-text-input  v-model="user.lastName" error-messages="errors.lastName" id="lastName" name="lastName" type="text" required autofocus autocomplete="lastName" />
                </v-col>
                <v-col cols="12">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input v-model="user.email" error-messages="errors.email" id="email" name="email" type="email" class="mt-1 block w-full" required autocomplete="username" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </v-col>
                <v-col cols="12">
                    <x-primary-button type="button" @click="updateProfile" class="float-end" prepend-icon="mdi-content-save" color="primary">
                        {{ __('Save') }}
                    </x-primary-button>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
