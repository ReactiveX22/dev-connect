@props(['job'])

<x-panel class="flex gap-6 border border-zinc-800">
    <div>
        <x-employer-logo :employer="$job->employer" :size=90 />
    </div>

    <div class="flex flex-1 flex-col">
        <a href="/" class="self-start text-sm text-zinc-500">{{ $job->employer->name }}</a>

        <a href="{{ $job->url }}" target="_blank" class="mt-3 text-xl font-bold">{{ $job->title }}</a>

        <p class="mt-auto text-sm text-zinc-400">{{ $job->schedule }} - {{ $job->salary }}</p>
    </div>

    <div>
        @foreach ($job->tags as $tag)
            <x-tag :$tag />
        @endforeach
    </div>


</x-panel>
