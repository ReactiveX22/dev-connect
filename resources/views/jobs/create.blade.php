<x-layout>
    <div class="my-16 flex flex-col gap-4">
        <x-page-heading>Post a New Job</x-page-heading>
        <x-forms.form method="POST" action="/jobs">
            <div class="grid grid-cols-2 gap-6">
                <x-forms.input label="Title" name="title" placeholder="Backend Developer" />
                <x-forms.input label="Salary" name="salary" placeholder="90,000 BDT" />
                <x-forms.input label="Location" name="location" placeholder="Chittagong, Bangladesh" />
                <x-forms.select label="Schedule" name="schedule">
                    <option>Part Time</option>
                    <option>Full Time</option>
                </x-forms.select>
                <div class="col-span-full">
                    <x-forms.textarea label="Description" name="description" placeholder="Enter job description here..."
                        rows="4" />
                </div>
                <div class="col-span-full">
                    <x-forms.input label="Tags (comma separated)" name="tags"
                        placeholder="frontend, fullstack, JavaScript" />
                </div>
                <div class="col-span-full flex items-center justify-center rounded-xl border border-white/10 px-2 py-2">
                    <x-forms.checkbox label="Feature (Costs Extra)" name="featured" />
                </div>
                {{-- <x-forms.divider /> --}}
                <div class="col-span-full flex items-center justify-center">
                    <x-button variant="primary" type="submit" class="w-1/3 px-4 py-2">Publish</x-button>
                </div>
            </div>
        </x-forms.form>
    </div>
</x-layout>
