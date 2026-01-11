<v-card elevation="0">
        <v-row class="mb-5">
            <v-col cpls="12">
                <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                <x-text-input v-model="changeUserPassword.current_password" error-messages="errors.current_password" id="update_password_current_password" prepend-inner-icon="mdi-lock" name="current_password" type="password" autocomplete="current-password" />
            </v-col>

            <v-col cols="12">
                <x-input-label for="update_password_password" :value="__('New Password')" />
                <x-text-input v-model="changeUserPassword.password" error-messages="errors.password" id="update_password_password" prepend-inner-icon="mdi-lock" name="password" type="password" autocomplete="new-password" />
            </v-col>

            <v-col cols="12">
                <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                <x-text-input v-model="changeUserPassword.password_confirmation" error-messages="errors.name" id="update_password_password_confirmation" prepend-inner-icon="mdi-lock-check" name="password_confirmation" type="password" autocomplete="new-password" />
            </v-col>

            <v-col cols="12">
                <x-primary-button  type="button" @click="updatePassword" color="primary" block>
                    {{ __('Save') }}
                </x-primary-button>
            </v-col>
        </v-row>
</v-card>
