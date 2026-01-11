@props([
    'disabled' => false,
    'errorMessages' => null
])

<v-text-field @disabled($disabled) {{ $attributes->merge(['class' => 'text-capitalize']) }} variant="outlined" :error-messages="{{ $errorMessages ? $errorMessages : 'null' }}"></v-text-field>
