<v-btn variant="flat" color="error" {{ $attributes->merge(['type' => 'submit', 'class' => '']) }}>
    {{ $slot }}
</v-btn>
