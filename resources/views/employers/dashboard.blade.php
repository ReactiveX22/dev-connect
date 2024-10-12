<x-layout>
    <div class="space-y-10">
        <section>
            <x-section-heading>Posted Jobs</x-section-heading>

            <div class="mt-6 space-y-6">
                @foreach ($jobs as $job)
                    <x-dashboard-job-card :$job />
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
