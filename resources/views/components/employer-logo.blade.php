@props(['employer', 'size' => 42])

<img src="{{ asset('storage/' . $employer->logo) }}" class="aspect-square rounded-xl border border-zinc-800" alt=""
    style="width: {{ $size }}px;">
