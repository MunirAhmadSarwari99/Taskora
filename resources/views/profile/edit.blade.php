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
    <x-snackbar></x-snackbar>
    @section('AppScript')
        <script>
            var data = {
                data() {
                    return {
                        drawer: true,
                        dialog: false,
                        loading: false,
                        snackbar: false,
                        errors: {},
                        user: @json($user),
                        changeUserPassword: {},
                        file: null,
                        preview : 'build/assets/images/' + @json($user->avatar),
                        previewStatus: false,
                    };
                },
                computed: {
                    capitalizedErrors() {
                        return this.errors.name
                            ? this.errors.name.map(
                                e => e.charAt(0).toUpperCase() + e.slice(1)
                            )
                            : [];
                    }
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
                                    setTimeout(() => (this.loading = false), 2000);
                                    setTimeout(() => (this.snackbar = true), 2000);
                                }
                            })
                            .catch(error => {
                                this.loading = false;
                                this.errors = error.response.data.errors;
                            });
                    },
                    updatePassword() {
                        this.loading = true;

                        axios.put("{{ route('password.update') }}",  this.changeUserPassword, {
                            headers: {
                                "X-CSRF-TOKEN": document
                                    .querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content'),
                                "Accept": "application/json"
                            }
                        })
                        .then(response => {
                            if (response.data.status){
                                this.changeUserPassword = {};
                                setTimeout(() => (this.loading = false), 2000);
                                setTimeout(() => (this.snackbar = true), 2000);
                            }
                        })
                        .catch(error => {
                            this.loading = false;
                            this.errors = error.response.data.errors;
                        });
                    },
                    openFilePicker(){
                        document.getElementById('fileInput').click();
                    },
                    onFileChange(event){
                        this.loading = true;
                        const selectedFile = event.target.files[0];
                        if (!selectedFile) return;

                       this.file = selectedFile;
                       this.preview = URL.createObjectURL(selectedFile);

                        const formData = new FormData()
                        formData.append('avatar', this.file);

                        axios.post("{{ route('profile.uploadImage') }}",  formData, {
                            headers: {
                                "X-CSRF-TOKEN": document
                                    .querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content'),
                                "Accept": "application/json",
                                'Content-Type': 'multipart/form-data',
                            }
                        })
                        .then(response => {
                            if (response.data.status){
                                this.previewStatus = response.data.status;
                                setTimeout(() => (this.loading = false), 2000);
                                setTimeout(() => (this.snackbar = true), 2000);
                            }
                        })
                        .catch(error => {
                            this.loading = false;
                            this.errors = error.response.data.errors;
                        });
                    },
                    removePicker(){
                        this.loading = true;
                        this.preview = 'build/assets/images/default.png';

                        axios.post("{{ route('profile.removePicker') }}", {
                            headers: {
                                "X-CSRF-TOKEN": document
                                    .querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content'),
                                "Accept": "application/json",
                            }
                        })
                            .then(response => {
                                if (response.data.status){
                                    this.previewStatus = false;
                                    setTimeout(() => (this.loading = false), 2000);
                                    setTimeout(() => (this.snackbar = true), 2000);
                                }
                            })
                            .catch(error => {
                                this.loading = false;
                                this.errors = error.response.data.errors;
                            });
                    },

                }

            }
        </script>
    @endsection
</x-app-layout>
