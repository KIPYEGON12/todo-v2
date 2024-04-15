@extends('layouts.app')

@section("content")
<div>

    <div class="d-flex justify-content-between">
        <h1>All Tasks</h1>
        <div>
            <a href="{{ url('tasks/create') }}" class="btn btn-primary btn-sm">Create a new task</a>
        </div>
          <div class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="/completed-tasks">
                    <svg class="bi">
                        <use xlink:href="#cart" />
                    </svg>
                    Completed Tasks
                </a>
            </div>
    </div>

    {{-- @dd($tasks) --}}
    @foreach ($tasks as $task)

    <div class="task">
        <h2>{{ $task->name }}</h2>
        <h2 class="card-title">
            <span>Created by:{{ $task->user->name }}</span>
            <span class=text-success>(#{{ $task->user_id }})</span>
        </h2>
        <div class="d-flex gap-1">

            <form  method="post" action="{{ route('tasks.destroy', $task->id) }}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>

            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-warning">View</a>
        </div>

    </div>
    @endforeach
</div>

@endsection
