<nav class="text-md flex items-center justify-between border-b border-zinc-500/30 py-3">
    <div>
        <a href="/" class="flex items-center gap-1">
            <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
            <h3 class="text-xl">devHunt🎯</h3>
        </a>
    </div>

    {{-- <div class="flex items-center justify-between gap-6 font-semibold">
        <x-navbar.nav-link href='/' :active="request()->is('/')">Find Jobs</x-navbar.nav-link>
        <x-navbar.nav-link href='/employer' :active="request()->is('employer')">Companies</x-navbar.nav-link>
    </div> --}}

    <div
        class="absolute left-1/2 flex -translate-x-1/2 transform items-center justify-between gap-6 text-sm font-semibold">
        @employer(true)
            <x-navbar.nav-link href='/dashboard' :active="request()->is('dashboard')">Dashboard</x-navbar.nav-link>
        @endemployer
        <x-navbar.nav-link href='/' :active="request()->is('/')">Jobs</x-navbar.nav-link>
        <x-navbar.nav-link href='/employers' :active="request()->is('employers')">Companies</x-navbar.nav-link>
    </div>

    @auth
        <div class="flex gap-2">

            @employer
                <x-button variant="primary" href="/jobs/create" class="px-4 py-1">
                    Post Job
                </x-button>
            @endemployer
            <x-navbar.nav-link href='/profile' :active="request()->is('profile')">Profile</x-navbar.nav-link>

            <form action="/logout" method="post">
                @csrf
                @method('DELETE')
                <x-button variant="ghost" type="submit">
                    <x-icons.logout size="24" />
                </x-button>
            </form>
        </div>
    @endauth

    @guest
        <div class="space-x-6 font-bold">
            <x-button variant="primary" href="/login" class="px-4 py-[1.25]">
                Login
            </x-button>
            {{-- <x-button variant="primary" href="/register">
                Signup
            </x-button> --}}
        </div>
    @endguest
</nav>
