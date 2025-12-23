<v-card>
    <v-img src="{{ asset('build/assets/images/' . Auth::user()->avatar) }}" alt="John">
        <v-toolbar color="transparent">
            <template v-slot:append>
                <v-btn icon="mdi-close-circle"></v-btn>
            </template>
        </v-toolbar>
    </v-img>
</v-card>
<v-card class="mt-5 pa-2" color="background">
    <v-btn color="primary" block>
        <v-icon icon="mdi-cloud-upload"></v-icon>
        Upload Photo
    </v-btn>
</v-card>
