<x-guest-layout>
  <div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md backdrop-blur-md bg-glass-light dark:bg-glass-dark border border-white/20 rounded-2xl p-8 shadow-xl">

      <h2 class="text-3xl font-bold text-ocean-baltic mb-6 text-center">Welcome Back</h2>

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
          <label class="block text-sm font-medium text-ocean-slate">Email</label>
          <input type="email" name="email" required autofocus class="w-full mt-1 p-3 rounded-xl border border-black/20 bg-white/70 dark:bg-white/10" />
        </div>

        <div class="mb-6">
          <label class="block text-sm font-medium text-ocean-slate">Password</label>
          <input type="password" name="password" required class="w-full mt-1 p-3 rounded-xl border border-black/20 bg-white/70 dark:bg-white/10" />
        </div>

        <button class="w-full bg-blue-600 hover:bg-blue-700 transition text-white font-semibold py-3 rounded-xl mt-2">Log In</button>
      </form>

      <a href="{{ route('google.login') }}"
        class="w-full mt-4 flex items-center justify-center gap-2 
               bg-white text-gray-800 rounded-lg py-2 shadow hover:bg-gray-100">
          <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5">
          Continue with Google
      </a>

      <div class="text-center mt-3">
        <a href="{{ route('password.request') }}" class="text-sm text-ocean-baltic hover:underline">
          Forgot your password?
        </a>
      </div>

      <div class="text-center mt-3">
        <a href="{{ route('register') }}" class="text-sm text-ocean-baltic hover:underline">
          Haven't made an account?
        </a>
      </div>

    </div>
  </div>
</x-guest-layout>
