<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompletedTasksController extends Controller
{
    public function index() {
        return view('tasks.completed');
    }
}
