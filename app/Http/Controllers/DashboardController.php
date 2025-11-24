<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userId = auth()->id();

        // Get recent tasks
        $query = Task::where('user_id', $userId);

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'LIKE', "%{$request->search}%")
                  ->orWhere('description', 'LIKE', "%{$request->search}%");
            });
        }

        $tasks = $query->latest()
            ->take(5)
            ->get();

        // Count total tasks
        $totalTasks = Task::where('user_id', $userId)->count();

        // Count completed tasks (status = 'completed')
        $completedTasks = Task::where('user_id', $userId)
            ->where('status', 'completed')
            ->count();

        // Count pending tasks (status = 'pending')
        $pendingTasks = Task::where('user_id', $userId)
            ->where('status', 'pending')
            ->count();

        // Count overdue tasks (due date passed and not completed)
        $overdueTasks = Task::where('user_id', $userId)
            ->where('status', '!=', 'completed')
            ->where('due_at', '<', now())
            ->whereNotNull('due_at')
            ->count();

        return view('dashboard', compact(
            'totalTasks',
            'completedTasks',
            'pendingTasks',
            'overdueTasks',
            'tasks'
        ));
    }
}
