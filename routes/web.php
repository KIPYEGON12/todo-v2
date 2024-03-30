<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssignedTasksController;
use App\Http\Controllers\CompletedTasksController;
use App\Http\Controllers\UsersController;

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        //auth()->logout();
        return view('dashboard');

    });

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    Route::get('/home/feed', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

    Route::get('/profile', [DashboardController::class,'index']);


    Route::get('/completed-tasks', [CompletedTasksController::class,'index']);

    Route::get('/tasks', [TasksController::class,'index']);

    Route::get('/tasks/create', [TasksController::class,'create']);

    Route::post('/tasks', [TasksController::class,'store'])->name('tasks.store');

    Route::delete('/tasks/{id}', [TasksController::class,'destroy'])->name('tasks.destroy');

    Route::get('/tasks/{id}', [TasksController::class,'show'])->name('tasks.show');

    Route::put('/tasks/{id}', [TasksController::class,'update'])->name('tasks.update');

    Route::post('/tasks/edit/{id}', [TasksController::class,'edit'])->name('tasks.edit');

    Route::get('/top-five/', [DashboardController::class,'topFiveTasks']);

    Route::get('/users/index', [UsersController::class,'index']);

    Route::resource('/users', UsersController::class);

});


