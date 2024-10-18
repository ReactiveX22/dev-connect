<nav class="text-md flex items-center justify-between border-b border-zinc-500/30 py-3">
    <div>
        <a href="/" class="flex items-center gap-1">
            <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
            <h3 class="text-xl">DevConnect🎯</h3>
        </a>
    </div>

    <div
        class="absolute left-1/2 flex -translate-x-1/2 transform items-center justify-between gap-6 text-sm font-semibold">
        @employer(true)
            <x-navbar.nav-link href='/dashboard' :active="request()->is('dashboard')">Dashboard</x-navbar.nav-link>
        @endemployer
        <x-navbar.nav-link href='/' :active="request()->is('/')">Jobs</x-navbar.nav-link>
        <x-navbar.nav-link href='/employers' :active="request()->is('employers')">Companies</x-navbar.nav-link>
    </div>

    @auth
        <div class="flex items-center gap-3">
            @employer
                <x-button variant="primary" href="/jobs/create">
                    New Job
                </x-button>
            @endemployer

            <!-- Profile Dropdown Menu -->
            <div class="relative" id="profile-dropdown-container" onclick="toggleDropdown(event)">
                <div class="relative rounded-full" id="profile-button-container">
                    <!-- Conditional Logo Display -->
                    @employer
                        <button type="button"
                            class="flex items-center justify-center rounded-full bg-transparent text-sm font-semibold transition-all duration-300"
                            id="profile-button">
                            <x-employer-logo :employer="auth()->user()->employer" :size="30" />
                        </button>
                    @else
                        <!-- Profile Icon Button -->
                        <button type="button"
                            class="flex items-center justify-center rounded-full bg-transparent text-sm font-semibold transition-all duration-300"
                            id="profile-button">
                            <x-icons.profile-icon size="30" />
                        </button>
                    @endemployer
                </div>

                <!-- Dropdown Menu -->
                <div id="profile-dropdown"
                    class="absolute right-0 z-10 mt-3 hidden w-40 overflow-hidden rounded-lg border border-zinc-800 bg-zinc-900 shadow-md">
                    <a href="/profile" class="block px-4 py-2 text-sm hover:bg-zinc-800">
                        Profile
                    </a>

                    <form action="/logout" method="post" class="block w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full px-4 py-2 text-left text-sm hover:bg-zinc-800">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endauth

    @guest
        <div class="space-x-2 font-bold">
            <x-button variant="ghost" href="/login">
                Login
            </x-button>
            <x-button variant="primary" href="/register">
                Signup
            </x-button>
        </div>
    @endguest
</nav>
