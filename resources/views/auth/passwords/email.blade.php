<x-layout>
    <x-panel class="mx-auto max-w-lg border-none">
        <x-page-heading>Forgot Password?</x-page-heading>

        <x-forms.form method="POST" action="{{ route('password.email') }}" size="narrow" class="mb-4 mt-6">
            <div class="grid max-w-xs grid-cols-1 gap-6">
                <div class="flex flex-col gap-4">
                    <x-forms.input label="Email" name="email" type="email" required />
                </div>

                <div class="col-span-full flex items-center justify-center">
                    <x-button type="submit" variant="primary" class="w-full px-5 py-2">
                        Send Password Reset Link
                    </x-button>
                </div>

                @if (session('status'))
                    <div class="text-green-500">{{ session('status') }}</div>
                @endif
            </div>
        </x-forms.form>
    </x-panel>
</x-layout>
