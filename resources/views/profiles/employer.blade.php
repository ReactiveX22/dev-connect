<x-layout>
    <div class="mx-auto flex max-w-3xl flex-col gap-4">
        <div class="flex w-full gap-3">
            <x-panel class="flex-grow">
                <div class="flex justify-between gap-1">
                    <div class="flex flex-col">
                        <div class="text-lg font-bold">{{ $employer->name }}</div>
                        <div class="text-sm text-zinc-400">{{ $employer->user->name }}</div>
                        <div class="text-sm text-zinc-400">{{ $employer->user->email }}</div>
                    </div>
                    <div>
                        <x-employer-logo :employer="$employer" :size=128 />
                    </div>
                </div>
            </x-panel>
            <x-panel>
                <div class="flex flex-col gap-2">
                    <a href="{{ route('employers.edit', $employer->id) }}" class="flex items-center justify-center">
                        <x-button variant="primary">Edit</x-button>
                    </a>
                </div>
            </x-panel>
        </div>

        <x-panel>
            <div class="flex items-center justify-center gap-1">
                <div class="text-xl font-bold">{{ $employer->jobs->count() }}</div>
                <div class="text-sm text-zinc-400">jobs available</div>
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
