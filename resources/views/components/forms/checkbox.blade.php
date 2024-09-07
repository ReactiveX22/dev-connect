@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'checkbox',
        'id' => $name,
        'name' => $name,
        'value' => old($name),
        'class' => 'w-4 h-4',
    ];
@endphp


<div class="flex items-center">
    <input {{ $attributes($defaults) }}>
    <span class="pl-2 text-sm">{{ $label }}</span>
</div>
