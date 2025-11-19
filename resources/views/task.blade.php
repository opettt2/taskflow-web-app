<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @vite('resources/css/app.css')
  <title>Tasks</title>
</head>
<body>

  <h1>Your Tasks</h1>
  <form method="POST" action="{{route('task.store')}}" class="max-w-md mx-auto p-4 bg-white 
  shadow-md rounded">
    @csrf

    <div class="mb-4">
      <label for="title" class="block text-gray-700 font-semibold mb-1">Title:</label>
      <input type="text" id="title" name="title" value="{{ old('title')}}" class="w-full border rounded p-2">
      @error('title')
          <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-4">
      <label for="description" class="block text-gray-700 font-semibold mb-1">Description</label>
      <input type="text" id="description" name="description" value="{{ old('description')}}"  class="w-full border rounded p-2">
      @error('description')
          <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-4">
      <label for="due_at" class="block text-gray-700 font-semibold mb-1">Due at</label>
      <input type="date" id="due_at" name="due_at" value="{{ old('due_at')}}" class="w-full border rounded p-2">
      @error('due_at')
          <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Task</button>
  </form>
  
  <ul>
    @forelse ($tasks as $task)
      <li>
        {{ $task->title }} - {{ $task->description }} - {{ $task->due_at }}

        <form action="{{ route('task.destroy', $task->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Delete Task
            </button>
        </form>
      </li>
    @empty
      <li>No tasks yet</li>
    @endforelse
  </ul>

</body>
</html>
