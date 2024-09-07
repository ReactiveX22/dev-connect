<x-layout>
    <div class="mx-auto flex max-w-lg flex-col gap-4">
        <x-panel>
            <div class="flex items-center justify-between gap-1">
                <div class="text-lg font-bold">{{ $employer->name }}</div>
                <div class="flex items-center justify-between gap-1">
                    <div class="text-xl font-bold">{{ $employer->jobs->count() }}</div>
                    <div class="text-sm text-zinc-400">jobs available</div>
                </div>
            </div>
        </x-panel>

        <section>
            <x-section-heading>Recent Jobs</x-section-heading>
            <div class="mt-6 space-y-6">
                @foreach ($employer->jobs as $job)
                    <x-job-card-wide :$job />
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
