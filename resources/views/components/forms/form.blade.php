@props(['size' => 'wide'])

@php
    if ($size === 'wide') {
        $width = 'lg';
    } elseif ($size === 'narrow') {
        $width = 'xs';
    }
@endphp

<form {{ $attributes(['class' => 'max-w-' . $width . ' mx-auto space-y-4', 'method' => 'GET']) }}>
    @if ($attributes->get('method', 'GET') !== 'GET')
        @csrf
        @method($attributes->get('method'))
    @endif

    {{ $slot }}
</form>
