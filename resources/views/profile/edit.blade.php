<x-app-layout>
    <v-card>
        <v-card-title>
            <v-icon icon="mdi-account"></v-icon>
            Account
        </v-card-title>
        <v-divider></v-divider>
        <v-row class="">
            <v-col cols="12" md="3">
                <v-card class="pa-5" align="center" justify="center">
                    @include('profile.partials.update-avatar-form')
                </v-card>
                <v-card class="pl-5 pr-5">
                    @include('profile.partials.update-password-form')
                </v-card>
            </v-col>
            <v-col cols="12" md="9">
                @include('profile.partials.update-profile-information-form')
                @include('profile.partials.delete-user-form')
            </v-col>
        </v-row>
    </v-card>
    <x-progressLinear DialogWidth="600" CardTitleIcon="mdi-reload-alert" CardTitle="Please wait…"></x-progressLinear>

    @section('AppScript')
        <script>
            var data = {
                data() {
                    return {
                        drawer: true,
                        dialog: false,
                        loading: false,
                        errors: {},
                        user: @json($user)
                    };
                },
                methods: {
                    updateProfile() {
                        this.loading = true;

                        axios.patch("{{ route('profile.update') }}",  this.user, {
                            headers: {
                                "X-CSRF-TOKEN": document
                                    .querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content'),
                                "Accept": "application/json"
                            }
                        })
                            .then(response => {
                                if (response.data.status){
                                    setTimeout(() => (this.loading = false), 2000)
                                }
                            })
                            .catch(error => {
                                // console.error(error.response.data);
                                this.errors = error.response.data.errors;
                                console.log(this.errors.lastName[0]);
                            });
                    }
                }

            }
        </script>
    @endsection
</x-app-layout>
