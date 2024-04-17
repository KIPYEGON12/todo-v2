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
        <form method="POST" action="{{ url('tasks/' . $task->id) }}">
            @csrf
            @method('PUT') {{-- or @method('PATCH') depending on your setup --}}
            <div class="row">
                <div class="col-9">


                    {{-- <div class="alert alert-success rounded-3 shadow-sm" role="alert">
                            Task assigned successfuCreate a new tCreate a new task.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div> --}}
                    <div class="card-body">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Edit Task</h5>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control rounded-3" id="taskName"
                                            placeholder="Task Name" name="name" value="{{ $task->name }}">
                                    </div>
                                    <div class="col">
                                        <select class="form-select rounded-3" id="assignedTo" name="user_id">
                                            <option disabled>Select User</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    @if ($user->id == $task->user_id) selected @endif>
                                                    {{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        <div> User ID: {{ $task->user_id }}</div>
                                    </div>
                                    <hr>
                                    <div class="d-flex gap-1 align-items-center">
                                        <button class="btn btn-outline-primary rounded-3 btn-sm" type="submit">Update
                                            Task</button>
                                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm">Back To
                                            Tasks</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mt-3">
                        <!-- Task List will be displayed here -->
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
