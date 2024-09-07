@props(['active' => false, 'type' => 'a'])


<a class="{{ $active ? 'border-b border-lime-600/90' : 'hover:text-lime-400' }} rounded-md px-3 py-2 transition-all"
    aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>{{ $slot }}</a>
