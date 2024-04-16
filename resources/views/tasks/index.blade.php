@extends('layouts.app')

@section('content')
    <div>

        <div class="d-flex justify-content-between">
            <h1>All Tasks</h1>
            <div>
                <a href="{{ url('tasks/create') }}" class="btn btn-primary btn-sm" style="font-weight: bold; border-radius: 0.2rem; padding: 0.25rem 0.5rem;">Create a new task</a>
            </div>
        </div>

        {{-- @dd($tasks) --}}
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Task</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->permission->name ?? 'N/A' }}</td>
                            {{-- <td>{{ $task->person->name  }}</td> --}}
                            <td class="d-flex gap-1">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>

                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-warning">View</a>

                                {{-- @dd(route('tasks.destroy', $task->id)) --}}
                                <form method="post" action="{{ route('tasks.destroy', $task->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="nav-item btn btn-success btn-sm d-flex align-items-center justify-content-center"
                style="border-radius: 0.2rem; width: 150px;">
                <a class="nav-link" href="/completed-tasks" style="font-weight: bold;">
                    <svg class="bi" width="20" height="20">
                        <use xlink:href="#cart" />
                    </svg>
                    <span style="font-size: 0.9rem;">Completed Tasks</span>
                </a>
            </div>
        </div>
    @endsection
