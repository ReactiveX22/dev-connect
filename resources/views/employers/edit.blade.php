<x-layout>
    <x-panel class="mx-auto my-auto max-w-xl border-none">
        <x-page-heading>Edit Profile</x-page-heading>
        <x-forms.form method="POST" action="{{ route('employers.update', $employer->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            <div class="grid grid-cols-2 gap-6">
                <div class="flex flex-col gap-4">
                    <x-forms.input label="Name" name="name" value="{{ $employer->user->name }}" required />
                    <x-forms.input label="Email" name="email" type="email" value="{{ $employer->user->email }}"
                        required />
                    <x-forms.input label="Password" name="password" type="password"
                        placeholder="Leave blank if you don't want to change" />
                    <x-forms.input label="Password Confirmation" name="password_confirmation" type="password"
                        placeholder="Leave blank if you don't want to change" />
                </div>
                <div class="flex flex-col gap-4">
                    <x-forms.input label="Employer Name" name="employer" value="{{ $employer->name }}" required />
                    <x-forms.input label="Employer Logo" name="logo" type="file" />
                </div>
                <div class="col-span-full flex items-center justify-center">
                    <x-button type="submit" variant="primary" class="w-1/3 px-5 py-2">
                        Update Profile
                    </x-button>
                </div>
            </div>
        </x-forms.form>
    </x-panel>
</x-layout>
