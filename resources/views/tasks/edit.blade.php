<x-app-layout>
    <div class="max-w-xl mx-auto bg-white/70 dark:bg-gray-800/70 p-4 sm:p-6 rounded-xl sm:rounded-2xl backdrop-blur-md shadow border border-white/20">

        <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-4">Edit Task</h1>

        <form method="POST" action="{{ route('task.update', $task->id) }}">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                <input name="title" value="{{ old('title', $task->title) }}" required
                    class="w-full mt-1 p-2 sm:p-3 rounded-xl border border-black/20 bg-white/70 dark:bg-white/10 text-sm sm:text-base">
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                <textarea name="description" rows="4" class="w-full mt-1 p-2 sm:p-3 rounded-xl border border-black/20 bg-white/70 dark:bg-white/10 text-sm sm:text-base">{{ old('description', $task->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            {{-- Due Date --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Due Date</label>
                <input type="datetime-local" name="due_at" value="{{ old('due_at', $task->due_at) }}"
                    class="w-full mt-1 p-2 sm:p-3 rounded-xl border border-black/20 bg-white/70 dark:bg-white/10 text-sm sm:text-base">
                <x-input-error :messages="$errors->get('due_at')" class="mt-2" />
            </div>
            
            {{-- Priority --}}
            <div class="mb-4 sm:mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Priority</label>
                <select name="priority" class="w-full mt-1 p-2 sm:p-3 rounded-xl border border-black/20 bg-white/70 dark:bg-white/10 text-sm sm:text-base">
                    <option value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>Low</option>
                    <option value="normal" {{ old('priority', $task->priority) == 'normal' ? 'selected' : '' }}>Normal</option>
                    <option value="high" {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>High</option>
                </select>
                <x-input-error :messages="$errors->get('priority')" class="mt-2" />
            </div>

            {{-- Status --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                <select name="status" class="w-full mt-1 p-2 sm:p-3 rounded-xl border border-black/20 bg-white/70 dark:bg-white/10 text-sm sm:text-base">
                    <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>

            {{-- Buttons --}}
            <div class="flex flex-col sm:flex-row justify-end gap-3">
                <a href="{{ route('task.index') }}"
                    class="w-full sm:w-auto text-center px-4 py-2 rounded-2xl bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 transition text-sm sm:text-base">
                    Cancel
                </a>
                <button type="submit" class="w-full sm:w-auto px-6 py-2 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white shadow-lg transition text-sm sm:text-base">
                    Update Task
                </button>
            </div>

        </form>
    </div>
</x-app-layout>
