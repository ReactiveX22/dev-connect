@props(['placeholder' => ''])

<div class="group flex items-center">
    <input
        class="peer w-full max-w-lg rounded-l-xl border border-zinc-800 bg-zinc-900 px-5 py-3 shadow-sm shadow-transparent outline-none transition-shadow duration-500 placeholder:text-zinc-600 focus:shadow-sm focus:shadow-primary-500 group-hover:shadow-sm group-hover:shadow-primary-500"
        type="text" name="q" placeholder="{{ $placeholder }}">

    <div
        class="flex h-full rounded-r-xl border-y border-r border-zinc-800 bg-zinc-900 p-3 text-zinc-500 transition-all duration-500 group-hover:text-primary-500 group-hover:shadow-sm group-hover:shadow-primary-500 peer-focus:text-primary-500 peer-focus:shadow-sm peer-focus:shadow-primary-500">
        <x-icons.search alt="search" />
    </div>
</div>
