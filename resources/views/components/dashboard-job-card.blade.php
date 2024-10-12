@props(['job'])

<x-panel class="cursor-pointer gap-6 border border-zinc-800 transition-all duration-300 hover:border-primary-500"
    onclick="window.location.href='/jobs/{{ $job->id }}'">
    <div class="flex w-full justify-between">
        <div class="flex flex-col">
            <div class="text-nowrap my-2 text-xl font-bold transition-all duration-300 group-hover:text-primary-400">
                {{ $job->title }}
            </div>
            <p class="text-nowrap mt-auto text-sm text-zinc-400">{{ $job->schedule }} - {{ $job->salary }}</p>
        </div>
        <div class="flex flex-col items-center justify-center gap-1">
            <p class="text-xl">{{ $job->applications_count }}</p>
            <p class="text-sm text-zinc-400">application</p>
        </div>
        <div class="flex-shrink">
            <div class="flex flex-wrap items-end justify-end gap-2">
                @foreach ($job->tags as $tag)
                    <x-tag :$tag />
                @endforeach
            </div>
        </div>
    </div>
</x-panel>
