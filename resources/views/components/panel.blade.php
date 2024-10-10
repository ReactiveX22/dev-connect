@php
    $classes = 'group rounded-xl bg-zinc-900 p-4 border border-zinc-800';
    // 'group rounded-xl border border-transparent bg-zinc-900 p-4 transition-all duration-300 hover:border-primary-500';
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
