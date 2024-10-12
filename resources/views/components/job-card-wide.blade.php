@props(['job'])

<x-panel class="flex cursor-pointer gap-6 border border-zinc-800 transition-all duration-300 hover:border-primary-500"
    onclick="window.location.href='/jobs/{{ $job->id }}'">
    <div>
        <x-employer-logo :employer="$job->employer" :size=90 />
    </div>

    <div class="flex flex-grow flex-col">
        <a href="/employers/{{ $job->employer->id }}"
            class="text-nowrap mb-2 self-start border-b border-transparent text-sm transition-all hover:border-primary-500">{{ $job->employer->name }}</a>

        <div class="text-nowrap my-2 text-xl font-bold transition-all duration-300 group-hover:text-primary-400">
            {{ $job->title }}
        </div>

        <p class="text-nowrap mt-auto text-sm text-zinc-400">{{ $job->schedule }} - {{ $job->salary }}</p>
    </div>

    <div class="flex-shrink">
        <div class="flex flex-wrap items-end justify-end gap-2">
            @foreach ($job->tags as $tag)
                <x-tag :$tag />
            @endforeach
        </div>
    </div>
</x-panel>
