<x-app-layout>
    <div class="space-y-4 sm:space-y-6">

        {{-- Header with Filter & Search --}}
        <div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-md rounded-xl sm:rounded-2xl border border-white/20 shadow p-4 sm:p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-4 sm:mb-6">
                <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">
                    Your Tasks
                </h1>

                <a href="{{ route('task.create') }}"
                    class="w-full sm:w-auto text-center px-4 py-2 rounded-xl bg-ocean-baltic text-white font-semibold hover:bg-ocean-baltic/80 transition">
                    + Add Task
                </a>
            </div>

            {{-- Filter & Search Form --}}
            <form method="GET" action="{{ url('/') }}" class="space-y-3">
                {{-- Search --}}
                <input type="text" name="search" placeholder="Search tasks..." value="{{ request('search') }}"
                    class="w-full px-4 py-2 sm:py-3 rounded-xl border border-white/30 bg-white/50 dark:bg-gray-700/50 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-ocean-baltic transition text-sm sm:text-base" />

                {{-- Filters Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <select name="priority" class="w-full px-3 sm:px-4 py-2 rounded-xl border border-white/30 bg-white/50 dark:bg-gray-700/50 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-ocean-baltic transition text-sm sm:text-base">
                        <option value="all">All Priorities</option>
                        <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>
                        <option value="normal" {{ request('priority') == 'normal' ? 'selected' : '' }}>Normal</option>
                        <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>
                    </select>

                    <select name="status" class="w-full px-3 sm:px-4 py-2 rounded-xl border border-white/30 bg-white/50 dark:bg-gray-700/50 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-ocean-baltic transition text-sm sm:text-base">
                        <option value="all">All Statuses</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>

                    <select name="sort_by" class="w-full px-3 sm:px-4 py-2 rounded-xl border border-white/30 bg-white/50 dark:bg-gray-700/50 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-ocean-baltic transition text-sm sm:text-base">
                        <option value="">Sort By</option>
                        <option value="due_date" {{ request('sort_by') == 'due_date' ? 'selected' : '' }}>Due Date</option>
                        <option value="priority" {{ request('sort_by') == 'priority' ? 'selected' : '' }}>Priority</option>
                        <option value="status" {{ request('sort_by') == 'status' ? 'selected' : '' }}>Status</option>
                    </select>

                    <div class="flex gap-2">
                        <button type="submit" class="flex-1 px-4 py-2 bg-ocean-baltic text-white font-semibold rounded-xl hover:bg-ocean-baltic/80 transition text-sm sm:text-base">
                            Apply
                        </button>

                        @if(request()->hasAny(['search', 'priority', 'status', 'sort_by']))
                        <a href="{{ url('/') }}" class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-xl hover:bg-gray-600 transition text-sm sm:text-base">
                            Clear
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        {{-- Tasks List --}}
        <div class="grid grid-cols-1 gap-3 sm:gap-4">
            @forelse ($tasks as $task)
                <x-task-card :task="$task" />
            @empty
                <div class="text-center py-8 sm:py-12 bg-white/60 dark:bg-gray-800/60 backdrop-blur-md rounded-xl sm:rounded-2xl border border-white/20">
                    <p class="text-gray-500 dark:text-gray-300 text-base sm:text-lg px-4">
                        No tasks found. Start being productive! 💪
                    </p>
                    <a href="{{ route('task.create') }}" class="inline-block mt-4 px-6 py-2 bg-ocean-baltic text-white rounded-xl hover:bg-ocean-baltic/80 transition text-sm sm:text-base">
                        Create Your First Task
                    </a>
                </div>
            @endforelse
        </div>

    </div>
</x-app-layout>
