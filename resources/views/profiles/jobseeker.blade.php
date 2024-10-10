<x-layout>
    <div class="mx-auto flex max-w-3xl flex-col gap-4">
        <x-panel>
            <div class="flex justify-between gap-1">
                <div class="flex flex-col">
                    <div class="text-lg font-bold">{{ $user->name }}</div>
                    <div class="text-sm text-zinc-400">{{ $user->email }}</div>
                </div>
            </div>
        </x-panel>
    </div>
</x-layout>
