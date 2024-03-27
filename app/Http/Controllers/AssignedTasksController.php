<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignedTasksController extends Controller
{
    public function index() {
        return view('tasks.assigned');
    }
}
