<x-layout>
    <x-panel class="mx-auto my-auto max-w-md border-none">
        <x-page-heading>Select Account Type</x-page-heading>
        <div class="flex flex-col items-center gap-6">
            <a href="/register/job-seeker" class="w-full">
                <x-button class="w-full py-3 text-lg" variant="primary">
                    Register as Job Seeker
                </x-button>
            </a>
            <a href="/register/employer" class="w-full">
                <x-button class="w-full py-3 text-lg" variant="secondary">
                    Register as Employer
                </x-button>
            </a>
        </div>
    </x-panel>
</x-layout>
