<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $users = User::count();
        $total_tasks = Task::count();
        $today_tasks = Task::whereDate('created_at', Carbon::today())->count();
        $user_tasks_count = Task::where('user_id', $user->id)->count();

        return view('dashboard', compact('users', 'total_tasks', 'today_tasks', 'user_tasks_count'));
    }

    public function topFiveTasks()
    {
        $tasks = Task::limit(5)->with('user')->get();

        return response($tasks);
    }
}
