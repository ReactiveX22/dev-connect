@props(['job'])

<x-panel class="cursor-pointer gap-6 border border-zinc-800 transition-all duration-300 hover:border-primary-500"
    onclick="window.location.href='/jobs/{{ $job->id }}'">
    <div class="flex w-full justify-between">
        <!-- First column (job title and schedule) -->
        <div class="flex flex-1 flex-col space-y-1">
            <div
                class="my-2 whitespace-nowrap text-xl font-bold transition-all duration-300 group-hover:text-primary-400">
                {{ $job->title }}
            </div>
            <p class="mt-auto whitespace-nowrap text-sm text-zinc-400">{{ $job->schedule }} - {{ $job->salary }}</p>
        </div>

        <!-- Second column (applications count) -->
        <div class="flex flex-1 flex-col items-center justify-center">
            <p class="text-2xl">{{ $job->applications_count }}</p>
            <p class="text-sm text-zinc-400">applications</p>
        </div>

        <!-- Third column (tags) -->
        <div class="flex-1">
            <div class="flex flex-wrap items-end justify-end gap-2">
                @foreach ($job->tags as $tag)
                    <x-tag :$tag />
                @endforeach
            </div>
        </div>
    </div>
</x-panel>
