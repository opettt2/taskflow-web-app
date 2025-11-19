<header class="w-full glass border-b border-white/20 p-4 flex items-center justify-between">

    <!-- Sidebar Toggle -->
    <button @click="sidebarOpen = !sidebarOpen"
            class="p-2 rounded-lg hover:bg-white/10 transition">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
    </button>

    <!-- Page Title -->
    <h2 class="text-xl font-bold text-slate-700 dark:text-slate-200">
        @yield('page-title', 'Dashboard')
    </h2>

    <!-- Right Section -->
    <div class="flex items-center gap-4">

        <!-- Dark Mode Toggle -->
        <button id="themeToggle"
                class="p-2 rounded-lg hover:bg-white/10 transition bg-gray-200 dark:bg-gray-700">
            <span class="dark:hidden">🌙</span>
            <span class="hidden dark:inline">☀️</span>
        </button>

        <!-- User Avatar + Dropdown -->
        <div class="relative" x-data="{ open: false }">

            <button @click="open = !open"
                    class="flex items-center gap-2 p-1">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}"
                     class="w-9 h-9 rounded-full shadow border border-white/20" />

                <span class="hidden md:block font-semibold
                             text-slate-800 dark:text-slate-200">
                    {{ Auth::user()->name }}
                </span>
            </button>

            <!-- Dropdown -->
            <div x-show="open"
                 @click.outside="open=false"
                 x-transition
                 class="absolute right-0 mt-2 w-44 bg-white/80 dark:bg-gray-800/80
                        backdrop-blur-md p-3 rounded-xl shadow border border-white/20">

                <a href="/profile"
                   class="dropdown-item block px-3 py-2 rounded-lg
                          hover:bg-black/5 dark:hover:bg-white/10">
                    Profile
                </a>

                <a href="/tasks"
                   class="dropdown-item block px-3 py-2 rounded-lg
                          hover:bg-black/5 dark:hover:bg-white/10">
                    My Tasks
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        class="w-full text-left px-3 py-2 rounded-lg text-red-500
                               hover:bg-black/5 dark:hover:bg-white/10">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</header>

{{-- Theme Script --}}
<script>
    const html = document.documentElement

    document.getElementById('themeToggle').onclick = () => {
        html.classList.toggle('dark')
        localStorage.theme = html.classList.contains('dark') ? 'dark' : 'light'
    }

    // Load theme from localStorage
    if (localStorage.theme === 'dark') {
        html.classList.add('dark')
    }
</script>
