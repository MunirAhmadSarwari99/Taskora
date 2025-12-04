@props(['disabled' => false])

<v-text-field @disabled($disabled) {{ $attributes->merge([]) }} variant="outlined"></v-text-field>
