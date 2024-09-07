@props(['job'])

<x-panel class="flex flex-col border border-zinc-800 text-center">

    <div class="self-start text-sm">{{ $job->employer->name }}</div>
    <div class="py-8">
        <a href="{{ $job->url }}" target="_blank"
            class="text-xl font-bold transition-all duration-300 group-hover:text-lime-400">{{ $job->title }}</a>
        <p class="mt-4 text-sm">{{ $job->schedule }} - {{ $job->salary }}</p>
    </div>
    <div class="mt-auto flex items-center justify-between">
        <div>
            @foreach ($job->tags as $tag)
                <x-tag :$tag size="small" />
            @endforeach
        </div>

        <x-employer-logo :employer="$job->employer" :size=42 />

    </div>


</x-panel>
