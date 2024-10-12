<x-layout>
    <x-page-heading>Search Results</x-page-heading>

    @if (count($jobs) === 0)
        <div class="mt-8 space-y-2">
            <h1 class="text-center text-xl">No jobs found for your search.</h1>
            <p class="text-center text-gray-500">Try using different keywords or check for spelling mistakes.</p>
        </div>
    @else
        <div class="mt-8 space-y-6">
            @foreach ($jobs as $job)
                <x-job-card-wide :$job />
            @endforeach
        </div>
    @endif
</x-layout>
