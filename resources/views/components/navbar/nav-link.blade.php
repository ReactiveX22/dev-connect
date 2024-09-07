@props(['active' => false, 'type' => 'a'])


<a class="{{ $active ? 'border-b border-primary-600/90' : 'hover:text-primary-500' }} rounded-md px-3 py-2 transition-all"
    aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>{{ $slot }}</a>
