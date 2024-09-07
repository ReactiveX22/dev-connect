<x-layout>
    <div class="space-y-10">
        <section class="pt-6">
            <div class="flex flex-col items-center justify-center">
                <h1 class="text-4xl font-bold">Find Your Next Career</h1>
                <x-forms.form action="/search" class="tex-sm mt-10 w-full">
                    <x-searchbar />
                </x-forms.form>
            </div>
        </section>

        <section class="pt-10">
            <x-section-heading>Top Jobs</x-section-heading>
            <div class="mt-6 grid gap-8 lg:grid-cols-3">
                @foreach ($featuredJobs as $job)
                    <x-job-card :$job />
                @endforeach

            </div>
        </section>
        <section>
            <x-section-heading>Tags</x-section-heading>
            <div class="mt-6 space-x-1">
                @foreach ($tags as $tag)
                    <x-tag :$tag />
                @endforeach

            </div>
        </section>
        <section>
            <x-section-heading>Recent Jobs</x-section-heading>

            <div class="mt-6 space-y-6">
                @foreach ($jobs as $job)
                    <x-job-card-wide :$job />
                @endforeach

            </div>
        </section>
    </div>
</x-layout>