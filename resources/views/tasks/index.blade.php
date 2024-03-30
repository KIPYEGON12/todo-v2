@extends('layouts.app')

@section("content")
<div>

    <div class="d-flex justify-content-between">
        <h1>All Tasks</h1>
        <div>
            <a href="{{ url('tasks/create') }}" class="btn btn-primary btn-sm">Create a new task</a>
        </div>
    </div>

    {{-- @dd($tasks) --}}
    @foreach ($tasks as $task)

    <div class="task">
        <h2>{{ $task->name }}</h2>
        <p>{{ $task->user_id }}</p>
        <div class="d-flex">

            <form  method="post" action="{{ route('tasks.destroy', $task->id) }}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            &nbsp;
             <form  method="post" action="{{ route('tasks.edit', $task->id) }}">
                @csrf
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>

            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-link">View</a>
        </div>

    </div>
    @endforeach
</div>

@endsection
