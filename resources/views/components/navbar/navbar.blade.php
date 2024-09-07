<nav class="flex items-center justify-between border-b border-zinc-500/30 py-3 font-mono">
    <div>
        <a href="/" class="flex items-center gap-1">
            <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
            <h3 class="text-2xl">devHunt🎯</h3>
        </a>
    </div>
    <div class="flex items-center justify-center gap-6 font-semibold">
        <x-navbar.nav-link href='/' :active="request()->is('/')">Find Jobs</x-navbar.nav-link>
        <x-navbar.nav-link href='/employer' :active="request()->is('employer')">Companies</x-navbar.nav-link>

    </div>

    @auth
        <div class="flex gap-2">
            <a href="/jobs/create">Post Job</a>

            <form action="/logout" method="post">
                @csrf
                @method('DELETE')
                <button>Logout</button>
            </form>
        </div>
    @endauth

    @guest
        <div class="space-x-6 font-bold">
            <a href="/login">Login</a>
            <a href="/register">Sign up</a>
        </div>
    @endguest
</nav>
