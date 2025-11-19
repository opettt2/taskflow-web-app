<x-guest-layout>
  <div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md backdrop-blur-md bg-glass-light dark:bg-glass-dark border border-black/20 rounded-2xl p-8 shadow-xl">
      <h2 class="text-3xl font-bold text-ocean-baltic mb-6 text-center">Create an Account</h2>

      <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <!-- Name -->
        <div class="mb-4">
          <label class="block text-sm font-medium text-ocean-slate">Name</label>
          <input type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full mt-1 p-3 rounded-xl border border-black/20 bg-white/70 dark:bg-white/10" />
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mb-4">
          <label class="block text-sm font-medium text-ocean-slate">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" required class="w-full mt-1 p-3 rounded-xl border border-black/20 bg-white/70 dark:bg-white/10" />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
          <label class="block text-sm font-medium text-ocean-slate">Password</label>
          <input type="password" name="password" required class="w-full mt-1 p-3 rounded-xl border border-black/20 bg-white/70 dark:bg-white/10" />
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-6">
          <label class="block text-sm font-medium text-ocean-slate">Confirm Password</label>
          <input type="password" name="password_confirmation" required class="w-full mt-1 p-3 rounded-xl border border-black/20 bg-white/70 dark:bg-white/10" />
          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button class="w-full bg-blue-600 hover:bg-blue-700 transition text-white font-semibold py-3 rounded-xl">Register</button>
      </form>

      <div class="text-center mt-4">
        <span class="text-sm text-ocean-slate">Already have an account? </span>
        <a href="{{ route('login') }}" class="text-sm text-ocean-baltic hover:underline font-medium">
          Log in
        </a>
      </div>
    </div>
  </div>
</x-guest-layout>
