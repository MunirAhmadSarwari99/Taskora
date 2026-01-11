<v-card>
    <v-img :src="preview" alt="John">
        <v-toolbar color="transparent"  v-if="user.avatar != 'default.png' || previewStatus == true">
            <template v-slot:append>
                <v-btn color="error" icon="mdi-close-circle" @click="removePicker"></v-btn>
            </template>
        </v-toolbar>
    </v-img>
</v-card>
<v-card class="mt-5 pa-2" color="background">
    <v-btn color="primary" block @click="openFilePicker">
        <v-icon icon="mdi-cloud-upload"></v-icon>
        Upload Photo
    </v-btn>
    <input
        id="fileInput"
        type="file"
        accept="image/png, image/jpg, image/jpeg"
        class="d-none"
        @change="onFileChange"
    />
</v-card>
