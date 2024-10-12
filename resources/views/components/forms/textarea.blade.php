@props(['label', 'name', 'placeholder' => '', 'rows' => 4])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-md bg-white/10 border border-white/10 px-2 text-sm mt-1 py-2 w-full',
        'placeholder' => $placeholder,
    ];
@endphp

<x-forms.field :$label :$name>
    <textarea {{ $attributes($defaults) }} rows="{{ $rows }}">{{ old($name) }}</textarea>
</x-forms.field>
