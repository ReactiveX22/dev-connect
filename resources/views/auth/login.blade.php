<x-layout>
    <x-panel class="mx-auto max-w-lg border-none">
        <x-page-heading>Login</x-page-heading>
        <x-forms.form method="POST" action="/login" enctype="multipart/form-data" size="narrow">
            <div class="grid max-w-xs grid-cols-1 gap-6">
                <div class="flex flex-col gap-4">
                    <x-forms.input label="Email" name="email" type="email" />
                    <x-forms.input label="Password" name="password" type="password" />
                </div>



                <!-- Login Button -->
                <div class="col-span-full flex items-center justify-center">
                    <x-button type="submit" variant="primary" class="w-full px-5 py-2">
                        Login
                    </x-button>
                </div>

                <div class="col-span-full flex flex-col items-center justify-between">
                    <p class="text-sm text-zinc-400">
                        New to devHunt?
                        <a href="/register" class="font-medium text-blue-500 hover:text-blue-700">
                            Register here
                        </a>
                    </p>
                    <p class="text-sm text-zinc-400">
                        Forgot Password?
                        <a href="{{ route('password.request') }}" class="font-medium text-blue-500 hover:text-blue-700">
                            Reset password
                        </a>
                    </p>
                </div>
            </div>
        </x-forms.form>
    </x-panel>
</x-layout>
