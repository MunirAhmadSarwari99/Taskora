@props(['messages'])

{{--@if ($messages)--}}
{{--        @foreach ((array) $messages as $message)--}}
{{--            <v-alert type="error" {{ $attributes->merge(['class' => 'text-capitalize mb-2']) }}>--}}
{{--                {{ $message }}--}}
{{--            </v-alert>--}}
{{--        @endforeach--}}
{{--@endif--}}

@if ($messages)
    <v-alert type="error" {{ $attributes->merge(['class' => 'text-capitalize mb-2']) }}>
        {{ $messages }}
    </v-alert>
@endif
