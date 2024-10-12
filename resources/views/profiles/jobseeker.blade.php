<x-layout>
    <div class="mx-auto flex max-w-3xl flex-col gap-6">
        <div class="flex w-full gap-3">
            <x-panel class="flex-grow">
                <div class="flex justify-between gap-1">
                    <div class="flex flex-col">
                        <div class="text-lg font-bold">{{ $user->name }}</div>
                        <div class="text-sm text-zinc-400">{{ $user->email }}</div>
                    </div>
                </div>
            </x-panel>
            <x-panel>
                <div class="flex flex-col gap-2">
                    <a href="{{ route('profile.edit') }}" class="flex items-center justify-center">
                        <x-button variant="primary">Edit</x-button>
                    </a>
                </div>
            </x-panel>
        </div>

        <section>
            <x-section-heading>Applied Jobs</x-section-heading>
            <div class="mt-3 space-y-6">
                @foreach ($user->jobApplications as $application)
                    <x-job-card-wide :job="$application->job" />
                @endforeach
            </div>

        </section>
    </div>
</x-layout>
