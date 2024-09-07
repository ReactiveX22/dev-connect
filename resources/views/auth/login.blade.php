<x-layout>
    <x-page-heading>Login</x-page-heading>

    <x-forms.form method="POST" action="/login" enctype="multipart/form-data" size="narrow">
        <div class="grid max-w-xs grid-cols-1 gap-6">
            <div class="flex flex-col gap-4">
                <x-forms.input label="Email" name="email" type="email" />
                <x-forms.input label="Password" name="password" type="password" />
            </div>

            <div class="col-span-full flex items-center justify-center"><x-forms.button>Login</x-forms.button>
            </div>
        </div>
    </x-forms.form>
</x-layout>
