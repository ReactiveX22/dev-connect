<x-layout>
    <x-panel class="mx-auto max-w-lg border-none">
        <x-page-heading>Reset Your Password</x-page-heading>

        <x-forms.form method="POST" action="{{ route('password.update') }}" size="narrow" class="mb-4 mt-6">
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="grid max-w-xs grid-cols-1 gap-6">
                <div class="flex flex-col gap-4">
                    <x-forms.input label="Email" name="email" type="email" required
                        value="{{ old('email', $email) }}" />
                    <x-forms.input label="New Password" name="password" type="password" required />
                    <x-forms.input label="Confirm Password" name="password_confirmation" type="password" required />
                </div>

                <div class="col-span-full flex items-center justify-center">
                    <x-button type="submit" variant="primary" class="w-full px-5 py-2">
                        Reset Password
                    </x-button>
                </div>

                @if (session('status'))
                    <div class="text-green-500">{{ session('status') }}</div>
                @endif
            </div>
        </x-forms.form>
    </x-panel>
</x-layout>
