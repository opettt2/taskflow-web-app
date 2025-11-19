@props(['task'])

<div class="p-4 sm:p-5 rounded-xl bg-white/60 dark:bg-gray-700/60 backdrop-blur-md border border-white/20 shadow hover:shadow-lg transition">

    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
        {{-- Left Side: Task Info --}}
        <div class="flex-1 space-y-2 min-w-0">
            <h3 class="font-semibold text-base sm:text-lg text-gray-900 dark:text-white break-words">
                {{ $task->title }}
            </h3>

            @if($task->description)
            <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-2 break-words">
                {{ $task->description }}
            </p>
            @endif

            {{-- Chips: Priority, Status, Due Date --}}
            <div class="flex flex-wrap gap-2 pt-2">
                {{-- Priority Chip --}}
                <span class="inline-flex items-center px-2 sm:px-3 py-1 text-xs font-medium rounded-full whitespace-nowrap
                    {{ $task->priority == 'low' ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : '' }}
                    {{ $task->priority == 'normal' ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : '' }}
                    {{ $task->priority == 'high' ? 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400' : '' }}">
                    {{ ucfirst($task->priority) }} Priority
                </span>

                {{-- Status Chip --}}
                <span class="inline-flex items-center px-2 sm:px-3 py-1 text-xs font-medium rounded-full whitespace-nowrap
                    {{ $task->status == 'pending' ? 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400' : '' }}
                    {{ $task->status == 'in_progress' ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : '' }}
                    {{ $task->status == 'completed' ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : '' }}">
                    {{ $task->status == 'in_progress' ? 'In Progress' : ucfirst($task->status) }}
                </span>

                {{-- Due Date Chip --}}
                @if($task->due_at)
                <span class="inline-flex items-center px-2 sm:px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-700 dark:bg-gray-900/30 dark:text-gray-400 whitespace-nowrap">
                    <span class="hidden sm:inline">📅 </span>{{ \Carbon\Carbon::parse($task->due_at)->format('d M Y, H:i') }}
                </span>
                @endif
            </div>
        </div>

        {{-- Right Side: Action Buttons --}}
        <div class="flex sm:flex-col gap-2 w-full sm:w-auto">
            {{-- Edit button --}}
            <a href="{{ route('task.edit', $task->id) }}"
                class="flex-1 sm:flex-none px-3 sm:px-4 py-2 text-xs sm:text-sm rounded-lg bg-ocean-baltic text-white hover:bg-ocean-baltic/80 transition text-center whitespace-nowrap">
                <span class="hidden sm:inline">Edit</span>
                <span class="sm:hidden">✏️</span>
            </a>

            {{-- Mark Completed button --}}
            @if($task->status !== 'completed')
            <form action="{{ route('task.complete', $task->id) }}" method="POST" class="flex-1 sm:flex-none">
                @csrf
                @method('PATCH')
                <button type="submit"
                    class="w-full px-3 sm:px-4 py-2 text-xs sm:text-sm rounded-lg bg-green-600 text-white hover:bg-green-700 transition whitespace-nowrap">
                    <span class="hidden sm:inline">✓ Complete</span>
                    <span class="sm:hidden">✓</span>
                </button>
            </form>
            @endif

            {{-- Delete button --}}
            <form action="{{ route('task.destroy', $task->id) }}" method="POST" 
                onsubmit="return confirm('Are you sure you want to delete this task?')" class="flex-1 sm:flex-none">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="w-full px-3 sm:px-4 py-2 text-xs sm:text-sm rounded-lg bg-red-600 text-white hover:bg-red-700 transition whitespace-nowrap">
                    <span class="hidden sm:inline">Delete</span>
                    <span class="sm:hidden">🗑️</span>
                </button>
            </form>
        </div>
    </div>

</div>
 