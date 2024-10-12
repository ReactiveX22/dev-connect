@props(['application'])

<x-panel>
    <div class="flex justify-between">
        <div>
            {{ $application->user->name }}
        </div>
        <div>
            {{ $application->created_at->format('F j, Y, g:i A') }} <!-- Format the date and time -->
        </div>
        <a href="{{ route('resumes.download', $application->id) }}" class="text-primary-500 underline">
            Download Resume
        </a>
    </div>
</x-panel>
