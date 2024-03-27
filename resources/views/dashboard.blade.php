
@extends('layouts.app')

@section('content')
    <style>
        .custom-input {
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
            border: 1px solid #ced4da;
            (0, 0, 0, 0.125);
        }

        .custom-select {
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
            border: 1px solid #000305;
            (0, 0, 0, 0.125);
        }
    </style>

    <div class="container py-4">
        <form method="post" action="{{ url('tasks') }}">
            @csrf
        <div class="row">
            <div class="col-9">
                <div class="alert alert-success rounded-3 shadow-sm" role="alert">
                    Task assigned successfuCreate a new tCreate a new task.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <h4>Assign a Task</h4>
                <div class="col">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control rounded-3" id="taskName" placeholder="Task Name" name="name">
                    </div>

                    <div class="col">
                        <select class="form-select rounded-3" id="assignedTo" name="user_id">
                            <option selected disabled>Select User</option>
                            <option value="1">User 1</option>
                            <option value="2">User 2</option>
                            <option value="3">User 3</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-outline-secondary rounded-3 mt-3" type="submit">Assign
                            Task</button>
                    </div>
                </div>
                <hr>
                <div class="mt-3">
                    <!-- Task List will be displayed here -->
                </div>
            </div>
            <div class="col-3">
                <div class="card border rounded-0">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="mb-0">Search Users</h5>
                    </div>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input placeholder="Search users..." class="form-control rounded-0 mb-3" type="text"
                                id="searchUsers">
                            <button class="btn btn-dark rounded-3 w-100">Search</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-3">
                    <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                        <li class="nav-item">
                            <a class="nav-link text-dark rounded-bottom border border-dark" href="/users/create">
                                <span>Create User</span>
                            <style/a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-bottom border border-dark" href="/users">
                                <span>Manage Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-bottom border border-dark" href="/tasks/create">
                                <span>Create Task</span>
                            </a>
                        </li>
                        <li class="nav-item rounded-bottom border border-dark">
                            <a class="nav-link" href="/tasks">
                                <span>Manage Tasks</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
