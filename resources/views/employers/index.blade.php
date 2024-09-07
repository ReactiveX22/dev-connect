<x-layout>
    <div class="space-y-10">
        <!-- Employer Search Section -->
        <section class="pt-6">
            <div class="flex flex-col items-center justify-center">
                <h1 class="text-4xl font-bold">Find Companies</h1>
                <x-forms.form action="/employers/search" class="tex-sm mt-10 w-full">
                    <x-searchbar placeholder="Search for Companies..." />
                </x-forms.form>
            </div>
        </section>

        <!-- Featured Employers Section -->
        <section class="pt-10">
            <x-section-heading>Top Companies</x-section-heading>
            <div class="mt-6 grid gap-8 lg:grid-cols-3">
                @foreach ($employers as $employer)
                    <x-employer-card :$employer />
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
