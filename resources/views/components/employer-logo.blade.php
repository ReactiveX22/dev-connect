@props(['employer', 'size' => 42])

<img src="{{ asset('storage/' . $employer->logo) }}" class="aspect-square rounded-xl" alt=""
    style="width: {{ $size }}px;">
