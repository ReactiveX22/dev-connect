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


        <section>
            <x-section-heading>Apply</x-section-heading>
            <x-forms.form>
                <div class="flex flex-col gap-4">
                    Upload Resume

                    Submit
                </div>
            </x-forms.form>
        </section>
    </div>
</x-layout>
