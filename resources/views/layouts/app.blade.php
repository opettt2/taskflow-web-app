<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://accounts.google.com/gsi/client" async defer></script>
  <title>{{ config('app.name', 'TaskFlow') }}</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-[#dbe9ee] via-[#c0d6df] to-white dark:from-[#0b1220] dark:to-[#07121a]">

  @include('layouts.navigation')

  <main class="pt-20 sm:pt-24 lg:pt-28 pb-8 sm:pb-12 px-3 sm:px-4 lg:px-8">
    <div class="max-w-6xl mx-auto">
      
      {{-- Flash Messages --}}
      @if(session('success'))
      <div class="mb-4 sm:mb-6 p-3 sm:p-4 rounded-xl bg-green-100 dark:bg-green-900/30 border border-green-300 dark:border-green-700 text-green-800 dark:text-green-200">
        <div class="flex items-center gap-2">
          <svg class="w-4 h-4 sm:w-5 sm:h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
          </svg>
          <span class="font-medium text-sm sm:text-base">{{ session('success') }}</span>
        </div>
      </div>
      @endif

      @if(session('error'))
      <div class="mb-4 sm:mb-6 p-3 sm:p-4 rounded-xl bg-red-100 dark:bg-red-900/30 border border-red-300 dark:border-red-700 text-red-800 dark:text-red-200">
        <div class="flex items-center gap-2">
          <svg class="w-4 h-4 sm:w-5 sm:h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
          </svg>
          <span class="font-medium text-sm sm:text-base">{{ session('error') }}</span>
        </div>
      </div>
      @endif

      <div class="backdrop-blur-md bg-glass-light dark:bg-glass-dark border border-white/10 dark:border-white/6 rounded-xl sm:rounded-2xl p-3 sm:p-4 lg:p-6">
        @isset($header)
          <div class="mb-4 sm:mb-6">
            {{ $header }}
          </div>
        @endisset

        {{ $slot }}
      </div>
    </div>
  </main>

  @stack('scripts')
</body>
</html>
