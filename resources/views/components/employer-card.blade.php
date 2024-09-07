@props(['employer'])

<x-panel class="flex flex-col justify-between gap-2 border border-zinc-800 p-5">
    <div class="flex justify-between">
        <div class="text-lg font-bold">{{ $employer->name }}</div>
    </div>

    <div class="flex justify-center py-4">
        <x-employer-logo :employer="$employer" :size="90" />
    </div>


    <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold">53 jobs</h3>
        <a href="/employer/{{ $employer->id }}" class="inline-flex gap-1 text-sm text-zinc-200">
            View Profile <x-icons.external-link size="20" />
        </a>
    </div>
</x-panel>
