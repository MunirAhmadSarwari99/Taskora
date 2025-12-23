@props([
'DialogWidth',
'CardTitleIcon' => '',
'CardTitle'
])

<v-dialog v-model="loading" width="{{ $DialogWidth }}" persistent scrollable>
    <v-card>
        <v-card-title>
            @if(isset($CardTitleIcon) && $CardTitleIcon != '')
                <v-icon icon="{{ $CardTitleIcon }}"></v-icon>
            @endif
            {{ $CardTitle }}
        </v-card-title>
        <v-divider></v-divider>
        <v-card-text>
            <v-progress-linear indeterminate color="primary" />
        </v-card-text>
    </v-card>
</v-dialog>
