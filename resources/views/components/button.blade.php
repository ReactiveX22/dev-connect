@props(['variant' => 'primary', 'type' => 'button', 'href' => null, 'class' => ''])

@php
    $classes = [
        'primary' => 'bg-primary-600 hover:bg-primary-800',
        'ghost' => 'bg-transparent hover:text-primary-400',
        'secondary' => 'bg-transparent hover:bg-primary-800',
    ];

    // Get the variant class or default to 'primary'
    $variantClass = $classes[$variant] ?? $classes['primary'];

    // Merge the variant class with any additional classes passed via the 'class' attribute
    $combinedClass = trim("$variantClass $class");
@endphp

@if ($href)
    <a href="{{ $href }}"
        class="{{ $combinedClass }} inline-flex items-center justify-center rounded-md px-3 py-1 text-sm font-semibold transition-all duration-300"
        role="button">
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}"
        class="{{ $combinedClass }} inline-flex items-center justify-center rounded-md px-3 py-1 text-sm font-semibold transition-all duration-300">
        {{ $slot }}
    </button>
@endif
