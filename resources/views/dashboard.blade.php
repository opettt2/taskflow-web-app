<x-app-layout>
    <div class="space-y-4 sm:space-y-6">

        {{-- Page Header --}}
        <div class="flex flex-col gap-4">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">
                    Dashboard
                </h1>

                <a href="{{ route('task.create') }}"
                    class="w-full sm:w-auto text-center px-4 py-2 rounded-xl bg-ocean-baltic text-white font-semibold hover:bg-ocean-baltic/80 transition text-sm sm:text-base">
                    + New Task
                </a>
            </div>

            {{-- Filter & Search --}}
            <form method="GET" action="{{ route('task.index')}}" class="flex flex-col gap-3 p-3 sm:p-4 bg-white/60 dark:bg-gray-800/60 backdrop-blur-md rounded-xl sm:rounded-2xl border border-white/20 shadow">
                
                <input type="text" name="search" placeholder="Search tasks..." value="{{ request('search') }}"
                    class="w-full p-2 rounded-xl border border-black/30 bg-white/30 dark:bg-gray-700/30 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-ocean-baltic transition text-sm sm:text-base" />

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <select name="priority" class="p-2 rounded-xl border border-white/30 bg-white/30 dark:bg-gray-700/30 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-ocean-baltic transition text-sm sm:text-base">
                        <option value="all">All Priorities</option>
                        <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>
                        <option value="normal" {{ request('priority') == 'normal' ? 'selected' : '' }}>Normal</option>
                        <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>
                    </select>

                    <select name="status" class="p-2 rounded-xl border border-white/30 bg-white/30 dark:bg-gray-700/30 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-ocean-baltic transition text-sm sm:text-base">
                        <option value="all">All Statuses</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>

                    <button type="submit" class="px-4 py-2 bg-ocean-baltic text-white font-semibold rounded-xl hover:bg-ocean-baltic/80 transition text-sm sm:text-base">
                        Filter
                    </button>
                </div>

            </form>
        </div>

        {{-- Stats Overview --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 lg:gap-6">
            <div class="p-4 sm:p-6 bg-white/60 dark:bg-gray-800/60 backdrop-blur-md border border-white/20 shadow rounded-xl sm:rounded-2xl">
                <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-300">Total Tasks</p>
                <h2 class="text-2xl sm:text-3xl font-bold text-ocean-baltic mt-1 sm:mt-2">{{ $totalTasks }}</h2>
            </div>

            <div class="p-4 sm:p-6 bg-white/60 dark:bg-gray-800/60 backdrop-blur-md border border-white/20 shadow rounded-xl sm:rounded-2xl">
                <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-300">Completed</p>
                <h2 class="text-2xl sm:text-3xl font-bold text-green-600 mt-1 sm:mt-2">{{ $completedTasks }}</h2>
            </div>

            <div class="p-4 sm:p-6 bg-white/60 dark:bg-gray-800/60 backdrop-blur-md border border-white/20 shadow rounded-xl sm:rounded-2xl sm:col-span-2 lg:col-span-1">
                <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-300">Pending</p>
                <h2 class="text-2xl sm:text-3xl font-bold text-red-500 mt-1 sm:mt-2">{{ $pendingTasks }}</h2>
            </div>
        </div>

        {{-- Tasks List --}}
        <div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-lg border border-white/20 shadow rounded-xl sm:rounded-2xl p-4 sm:p-6 lg:p-8">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-white mb-3 sm:mb-4">Recent Tasks</h2>

            <div class="space-y-3 sm:space-y-4">
                @forelse ($tasks as $task)
                    <div
                        class="p-3 sm:p-4 flex flex-col md:flex-row items-start md:items-center justify-between gap-3 sm:gap-4 rounded-xl border border-white/20 bg-white/40 dark:bg-gray-700/40 shadow hover:bg-white/70 dark:hover:bg-gray-700/60 transition">

                        <div class="flex-1 min-w-0 w-full">
                            <h3 class="font-semibold text-sm sm:text-base text-gray-900 dark:text-white break-words">{{ $task->title }}</h3>
                            
                            {{-- Description --}}
                            @if($task->description)
                            <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-300 mt-1 line-clamp-2 break-words">{{ $task->description }}</p>
                            @endif

                            {{-- Priority, Status & Due Date --}}
                            <div class="mt-2 flex flex-wrap gap-2 text-xs">
                                {{-- Priority Chip --}}
                                <span class="inline-flex items-center px-2 py-1 rounded-full font-medium whitespace-nowrap
                                    {{ $task->priority == 'low' ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : '' }}
                                    {{ $task->priority == 'normal' ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : '' }}
                                    {{ $task->priority == 'high' ? 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400' : '' }}">
                                    {{ ucfirst($task->priority) }} Priority
                                </span>

                                {{-- Status Chip --}}
                                <span class="inline-flex items-center px-2 py-1 rounded-full font-medium whitespace-nowrap
                                    {{ $task->status == 'pending' ? 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400' : '' }}
                                    {{ $task->status == 'in_progress' ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : '' }}
                                    {{ $task->status == 'completed' ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : '' }}">
                                    {{ $task->status == 'in_progress' ? 'In Progress' : ucfirst($task->status) }}
                                </span>

                                {{-- Due Date Chip --}}
                                @if($task->due_at)
                                <span class="inline-flex items-center px-2 py-1 rounded-full bg-gray-100 text-gray-700 dark:bg-gray-900/30 dark:text-gray-400 font-medium whitespace-nowrap">
                                    <span class="hidden sm:inline">📅 </span>{{ \Carbon\Carbon::parse($task->due_at)->format('d M Y') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-center gap-2 sm:gap-3 w-full md:w-auto">
                            {{-- Edit --}}
                            <a href="{{ route('task.edit', $task->id) }}"
                                class="flex-1 md:flex-none text-center px-3 py-1.5 sm:py-1 text-xs sm:text-sm rounded-lg bg-ocean-baltic text-white hover:bg-ocean-baltic/80 transition whitespace-nowrap">
                                Edit
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('task.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="flex-1 md:flex-none">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full px-3 py-1.5 sm:py-1 text-xs sm:text-sm rounded-lg bg-red-600 text-white hover:bg-red-700 transition whitespace-nowrap">
                                    Delete
                                </button>
                            </form>

                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 dark:text-gray-300 text-center py-4 sm:py-6 text-sm sm:text-base">
                        No tasks yet. Let's be productive! 💪
                    </p>
                @endforelse

            </div>
        </div>

    </div>
</x-app-layout>
