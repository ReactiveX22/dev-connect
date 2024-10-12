@props(['size' => 'wide'])

@php
    $width = $size === 'wide' ? 'lg' : ($size === 'narrow' ? 'xs' : 'lg');
@endphp

<form {{ $attributes(['class' => 'max-w-' . $width . ' mx-auto space-y-4']) }}
    method="{{ $attributes->get('method', 'GET') }}">
    @if ($attributes->get('method') !== 'GET')
        @csrf
        @method($attributes->get('method'))
    @endif
    {{ $slot }}
</form>
