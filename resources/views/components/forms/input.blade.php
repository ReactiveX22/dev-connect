@props(['label', 'name', 'type' => 'text'])

@php
    $defaults = [
        'type' => $type,
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-md bg-white/10 border border-white/10 px-2 text-sm mt-1 py-2 w-full',
        'value' => old($name),
    ];

@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes($defaults) }}>
</x-forms.field>
