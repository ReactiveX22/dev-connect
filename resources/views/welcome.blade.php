<x-layout>
    <div class="space-y-10">
        <section class="pt-6 text-center">
            <h1 class="text-4xl font-bold">Lets Find your next job.</h1>

            <form action="" method="post" class="mt-6 text-sm">
                <input type="text" placeholder="Web Developer..."
                    class="w-full max-w-lg rounded-xl border border-zinc-800 bg-zinc-900 px-5 py-4 placeholder:text-zinc-600">
            </form>
        </section>

        <section class="pt-10">
            <x-section-heading>Top Jobs</x-section-heading>
            <div class="mt-6 grid gap-8 lg:grid-cols-3">
                <x-job-card />
                <x-job-card />
                <x-job-card />
            </div>
        </section>
        <section>
            <x-section-heading>Tags</x-section-heading>
            <div class="mt-6 space-x-1">
                <x-tag>API</x-tag>
                <x-tag>API</x-tag>
                <x-tag>API</x-tag>
                <x-tag>API</x-tag>
                <x-tag>API</x-tag>
                <x-tag>API</x-tag>
                <x-tag>API</x-tag>
            </div>
        </section>
        <section>
            <x-section-heading>Recent Jobs</x-section-heading>

            <div class="mt-6 space-y-6">
                <x-job-card-wide />
                <x-job-card-wide />
                <x-job-card-wide />
            </div>
        </section>
    </div>
</x-layout>
