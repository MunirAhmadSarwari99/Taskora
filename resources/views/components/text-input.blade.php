@props(['disabled' => false])

<v-text-field @disabled($disabled) {{ $attributes->merge(['class' => '']) }} variant="outlined"></v-text-field>
