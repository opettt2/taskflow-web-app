<!DOCTYPE html>
<html lang="en" class="h-full" x-data="dashboard()" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow Dashboard</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.14.0/cdn.min.js" defer></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* Glass effect */
        .glass {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(12px);
        }
        .dark .glass {
            background: rgba(30, 41, 59, 0.4);
        }
    </style>
</head>
<body class="h-full bg-gray-100 dark:bg-slate-900 transition">

<div class="flex h-screen overflow-hidden">

    <!-- SIDEBAR -->
    @include('components.sidebar')

    <!-- MAIN CONTENT AREA -->
    <div class="flex-1 flex flex-col">

        <!-- NAVBAR / HEADER -->
        @include('components.navbar')

        <!-- MAIN PAGE CONTENT -->
        <main class="p-6 overflow-y-auto">
            @yield('content')
        </main>

    </div>
</div>

<!-- LAYOUT SCRIPTS -->
<script>
    function dashboard() {
        return {
            darkMode: false,
        }
    }
</script>

</body>
</html>
