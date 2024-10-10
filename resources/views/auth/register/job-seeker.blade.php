<x-layout>
    <x-panel class="mx-auto my-auto max-w-xl border-none">
        <x-page-heading>Register</x-page-heading>
        <x-forms.form method="POST" action="/register/job-seeker" enctype="multipart/form-data">
            <div class="flex flex-col items-center gap-6">
                <div class="flex w-1/2 flex-col gap-4">
                    <x-forms.input label="Name" name="name" />
                    <x-forms.input label="Email" name="email" type="email" />
                    <x-forms.input label="Password" name="password" type="password" />
                    <x-forms.input label="Password Confirmation" name="password_confirmation" type="password" />
                </div>

                <div class="flex w-full items-center justify-center">
                    <x-button type="submit" variant="primary" class="w-1/3 px-5 py-2">
                        Register
                    </x-button>
                </div>
            </div>
        </x-forms.form>
    </x-panel>
</x-layout>
