<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        // Get recent tasks
        $tasks = Task::where('user_id', $userId)
            ->latest()
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
