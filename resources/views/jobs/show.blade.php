<x-layout>
    <div class="mx-auto flex max-w-lg flex-col gap-4">
        @php
            $defaultClasses = 'flex flex-col cursor-pointer border border-zinc-800 text-center';
        @endphp

        <x-panel>
            <div class="mb-4 self-start text-sm">{{ $job->employer->name }}</div>

            <div class="my-auto flex justify-center">
                <div class="text-xl font-bold">
                    {{ $job->title }}
                </div>
            </div>

            <div class="my-4 flex flex-col items-center gap-2">
                <div class="text-md">{{ $job->schedule }}</div>
                <div>
                    <span class="text-xs">from</span> {{ $job->salary }}
                </div>
            </div>

            <div class="mt-auto flex items-center justify-between">
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

        @auth

            @employer(false)
                <section>
                    <x-section-heading>Apply For The Job</x-section-heading>
                    <x-forms.form action="{{ route('jobs.apply', $job->id) }}" method="POST" enctype="multipart/form-data"
                        class="py-4">
                        <div class="flex flex-col gap-4">
                            <label class="text-center text-lg font-medium">Upload Your Resume</label>
                            <div id="drop-area"
                                class="flex h-32 cursor-pointer items-center justify-center rounded-lg border-2 border-dashed border-zinc-800 transition-all hover:border-primary-500">
                                <input type="file" name="resume" id="fileInput" class="hidden" />
                                <span id="drop-text">Drag and drop a file here or <span
                                        class="cursor-pointer text-blue-500 underline"
                                        onclick="document.getElementById('fileInput').click()">browse</span></span>
                            </div>

                            <x-button type="submit" variant="primary" class="w-1/3 self-center px-4 py-2">
                                Submit
                            </x-button>
                        </div>
                    </x-forms.form>
                </section>
            @endemployer

        @endauth
    </div>
</x-layout>
