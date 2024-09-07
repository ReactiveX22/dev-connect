@props(['tag', 'size' => 'base'])

@php
    $classes = 'transition-colorsd rounded-full bg-zinc-800 font-bold duration-300 hover:bg-zinc-700';
    if ($size === 'base') {
        $classes .= ' px-4 py-1 text-xs';
    }

    if ($size === 'small') {
        $classes .= ' px-3 py-1 text-2xs';
    }
@endphp

<a href="/tags/{{ strtolower($tag->name) }}" class="{{ $classes }}">{{ $tag->name }}</a>
