<!-- resources/views/layouts/navigation.blade.php -->
<nav x-data="{ open: false }" class="fixed inset-x-0 top-0 z-50 bg-glass-light dark:bg-glass-dark border-b border-white/10 dark:border-white/6 backdrop-blur-md">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">

      <div class="flex items-center gap-6">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
          <span class="text-2xl font-bold text-ocean-baltic">TaskFlow</span>
        </a>

        <div class="hidden sm:flex sm:items-center sm:space-x-4">
          <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-nav-link>
          <x-nav-link :href="route('task.index')" :active="request()->routeIs('task.*')">Tasks</x-nav-link>
        </div>
      </div>

      <div class="flex items-center gap-3">
        <div id="weatherBox" class="hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-lg bg-white/20 dark:bg-white/6 border border-white/10">
          <span id="weatherTemp" class="text-sm font-semibold text-ocean-baltic">--°C</span>
          <img id="weatherIcon" class="w-8 h-8 rounded-md" src="" alt="weather"/>
        </div>

        <div class="hidden sm:flex items-center">
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              <button class="flex items-center text-sm font-medium text-ocean-baltic hover:text-ocean-smart transition">
                <div>{{ Auth::user()->name }}</div>
                <svg class="ml-2 w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21..." clip-rule="evenodd"/></svg>
              </button>
            </x-slot>

            <x-slot name="content">
              <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
              <form method="POST" action="{{ route('logout') }}">@csrf
                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-dropdown-link>
              </form>
            </x-slot>
          </x-dropdown>
        </div>

        <div class="-mr-2 flex sm:hidden">
          <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-ocean-baltic hover:text-ocean-smart">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
              <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>
      </div>

    </div>
  </div>

  <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
      <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-responsive-nav-link>
      <x-responsive-nav-link :href="route('task.index')" :active="request()->routeIs('task.*')">Tasks</x-responsive-nav-link>
    </div>

    <div class="pt-4 pb-1 border-t border-white/10">
      <div class="px-4">
        <div class="font-medium text-base text-ocean-baltic">{{ Auth::user()->name }}</div>
        <div class="font-medium text-sm text-ocean-sky">{{ Auth::user()->email }}</div>
      </div>
      <div class="mt-3 space-y-1">
        <x-responsive-nav-link :href="route('profile.edit')">Profile</x-responsive-nav-link>
        <form method="POST" action="{{ route('logout') }}">@csrf
          <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-responsive-nav-link>
        </form>
      </div>
    </div>
  </div>
</nav>
