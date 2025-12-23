<v-snackbar :timeout="2000" :model-value="true" {{ $attributes->merge(['']) }} rounded="pill">
    <v-icon icon="mdi-check-decagram"></v-icon>
    <strong> Operation completed successfully</strong>
</v-snackbar>
