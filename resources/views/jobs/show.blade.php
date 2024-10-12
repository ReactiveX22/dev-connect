<x-layout>
    <div class="mx-auto flex max-w-lg flex-col gap-6">
        @php
            $defaultClasses = 'flex flex-col cursor-pointer border border-zinc-800 text-center';
        @endphp

        <x-panel>
            <a href="/employers/{{ $job->employer->id }}"
                class="text-nowrap mb-4 self-start border-b border-transparent text-sm transition-all hover:border-primary-500">{{ $job->employer->name }}
            </a>

            <div class="my-4 flex justify-center">
                <div class="text-xl font-bold">
                    {{ $job->title }}
                </div>
            </div>

            <div class="my-4 flex flex-col items-center gap-1">
                <div class="text-md">{{ $job->schedule }}</div>
                <div>
                    <span class="text-xs">from</span> {{ $job->salary }}
                </div>
            </div>

            <div class="mt-8 flex items-center justify-between">
                <div class="flex max-w-xs items-center gap-2 overflow-hidden">
                    <div class="flex flex-wrap gap-1 overflow-hidden">
                        @foreach ($job->tags as $tag)
                            <x-tag :$tag size="small" />
                        @endforeach
                    </div>
                    <div class="h-full w-6 bg-gradient-to-l from-transparent to-zinc-800"></div>
                    <!-- Gradient shadow -->
                </div>

                <x-employer-logo :employer="$job->employer" :size=42 />
            </div>
        </x-panel>

        <section>
            <x-section-heading>Description</x-section-heading>
            <div class="mt-4 flex w-full text-base text-zinc-400">
                <p>{{ $job->description }}</p>
            </div>

        </section>

        @auth
            @employer(false)
                <section>
                    <x-section-heading>Apply For The Job</x-section-heading>

                    @if ($application)
                        <div class="my-4 flex w-full flex-col gap-3 py-4">
                            <div class="text-center text-lg font-medium">You have already applied for this job</div>
                            <div class="flex flex-col items-center gap-3">
                                <p class="text-zinc-500">Uploaded on: {{ $application->created_at->format('F j, Y') }}</p>
                                <div class="flex w-full items-center justify-center gap-4">
                                    <a href="{{ route('resumes.download', $application->id) }}"
                                        class="text-primary-500 underline">
                                        Download Resume
                                    </a>
                                    <!-- Delete Application Form -->
                                    <form action="{{ route('applications.delete', $application->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 underline">Delete Application</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <x-forms.form action="{{ route('jobs.apply', $job->id) }}" method="POST" enctype="multipart/form-data"
                            class="py-4">
                            <div class="flex flex-col gap-4">
                                <label class="text-center text-lg font-medium">Upload Your Resume</label>
                                <div id="drop-area"
                                    class="flex h-32 cursor-pointer items-center justify-center rounded-lg border-2 border-dashed border-zinc-800 transition-all hover:border-primary-500">
                                    <input type="file" name="resume" id="fileInput" class="hidden" />

                                    <span id="drop-text">Drag and drop a file here or <span
                                            class="cursor-pointer text-primary-500 underline"
                                            onclick="document.getElementById('fileInput').click()">browse</span></span>
                                </div>

                                @error('resume')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror

                                <x-button type="submit" variant="primary" class="w-1/3 self-center px-4 py-2">
                                    Submit
                                </x-button>
                            </div>
                        </x-forms.form>
                    @endif
                </section>
            @endemployer

            @employer(true)
                @if ($isOwnerOfJob)
                    <section>
                        <x-section-heading>Applications</x-section-heading>
                        <div class="mt-6 space-y-6">
                            @foreach ($applications as $application)
                                <x-application-card :$application />
                            @endforeach
                        </div>
                    </section>
                @else
                    <div class="mt-6 text-center text-zinc-500">
                        This job is not posted by you.
                    </div>
                @endif
            @endemployer
        @endauth

        @guest
            @employer(false)
                <section>
                    <h1 class="mt-6 text-center text-lg font-medium text-zinc-500">You need to be logged in to apply for jobs.
                    </h1>
                </section>
            @endemployer
        @endguest
    </div>
</x-layout>
