<x-layout>
    <x-page-heading>Register</x-page-heading>

    <x-forms.form method="POST" action="/register" enctype="multipart/form-data">
        <div class="grid grid-cols-2 gap-6">
            <div class="flex flex-col gap-4">
                <x-forms.input label="Name" name="name" />
                <x-forms.input label="Email" name="email" type="email" />
                <x-forms.input label="Password" name="password" type="password" />
                <x-forms.input label="Password Confirmation" name="password_confirmation" type="password" />
            </div>
            {{-- <x-forms.divider /> --}}
            <div class="flex flex-col gap-4">
                <x-forms.input label="Employer Name" name="employer" />
                <x-forms.input label="Employer Logo" name="logo" type="file" />
            </div>
            <div class="col-span-full flex items-center justify-center"><x-forms.button>Create Account</x-forms.button>
            </div>
        </div>
    </x-forms.form>
</x-layout>
