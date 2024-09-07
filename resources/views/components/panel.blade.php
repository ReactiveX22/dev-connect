@php
    $classes =
        'group rounded-xl border border-transparent bg-zinc-900 p-4 transition-all duration-300 hover:border-lime-500';
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
