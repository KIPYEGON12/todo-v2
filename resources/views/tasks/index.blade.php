@extends('layouts.app')

@section("content")
<div>

    <div class="d-flex justify-content-between">
        <h1>Assigned Tasks</h1>
        <div>
            <a href="{{ url('tasks/create') }}" class="btn btn-primary btn-sm">Create a new task</a>
        </div>
    </div>

    {{-- @dd($tasks) --}}
    @foreach ($tasks as $task)

    <div class="task">
        <h2>{{ $task->name }}</h2>
        <p>{{ $task->user_id }}</p>
        <form  method="delete" action="{{ route('tasks.destroy') }}">
            <button type="button" class="btn btn-danger">Delete</button>
        </form>
        <button type="button" class="btn btn-primary">Edit</button>

    </div>
    @endforeach
</div>

@endsection
