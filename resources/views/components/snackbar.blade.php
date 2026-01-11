<v-snackbar :timeout="2000" v-model="snackbar" {{ $attributes->merge(['']) }} rounded="pill" color="success">
    <v-icon icon="mdi-check-decagram"></v-icon>
    <strong> Operation completed successfully</strong>
</v-snackbar>
