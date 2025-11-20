<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class taskc extends Controller
{
    // Show all tasks
    public function index(Request $request)
    {
        $query = Task::where('user_id', Auth::id());

        // Filter by status
        if ($request->status && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Filter by priority
        if ($request->priority && $request->priority !== 'all') {
            $query->where('priority', $request->priority);
        }

        // ===========================
        // 3. Search by Title
        // ===========================
        if ($request->search) {
            $query->where('title', 'LIKE', "%{$request->search}%");
        }

        // ===========================
        // 4. Sorting
        // ===========================
        if ($request->sort_by === 'due_date') {
            $query->orderBy('due_at', 'asc');
        } elseif ($request->sort_by === 'priority') {
            $query->orderByRaw("FIELD(priority, 'high', 'normal', 'low')");
        } elseif ($request->sort_by === 'status') {
            $query->orderByRaw("FIELD(status, 'pending', 'in_progress', 'completed')");
        } else {
            // default sorting
            $query->orderBy('created_at', 'desc');
        }

        // FINAL RESULT
        $tasks = $query->get();

        return view('tasks.index', compact('tasks'));
    }


    //Create new task
    public function create(){
        return view('tasks.create');
    }

    // Store a new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'due_at' => 'nullable|date',
            'priority' => 'required|in:low,normal,high',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        Task::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'due_at' => $request->due_at,
            'priority' => $request->priority,
            'status' => $request->status,
            'is_complete' => $request->status == 'completed',
        ]);

        return redirect()->route('task.index')->with('success','Task Created');
    }

    // Mark Complete Function
    public function markComplete($id)
    {
        $task = Task::findOrFail($id);
        $this->authorizeTask($task);

        $task->update([
            'status' => 'completed',
            'is_complete' => true,
            'completed_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Task marked as completed!');
    }


    //Edit Task
    public function edit($id){
        $task = Task::findOrFail($id);
        $this->authorizeTask($task);
        return view ('tasks.edit', compact('task'));
    }
    // Update Task
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $this->authorizeTask($task);

        $request->validate([
        'title'=>'required|string|max:255', 
        'description'=>'nullable|string', 
        'due_at'=>'nullable|date', 
        'priority' => 'required|in:low,normal,high',
        'status' => 'required|in:pending,in_progress,completed',
        ]);
        $task->update($request->all());
        return redirect()->route('task.index')->with('success', 'Task Updated');
    }

    // Delete
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $this->authorizeTask($task);
        $task->delete();

        return redirect()->route('task.index')->with('success', 'Task deleted successfuly.');
    }

    private function authorizeTask(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
    }
}


