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
        <form method="POST" action="{{ url('roles/' . $role->id) }}">
            @csrf
            @method('PUT') {{-- or @method('PATCH') depending on your setup --}}
            <div class="row">
                <div class="col-9">
                    {{-- <div class="alert alert-success rounded-3 shadow-sm" role="alert">
                    role assigned successfuCreate a new tCreate a new role.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> --}}
                    <div class="card-body">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Edit Role</h5>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control rounded-3" id="roleName"
                                            placeholder="Role Name" name="name" value="{{ $role->name }}">
                                    </div>
                                    <div class="col mb-3">
                                        <select class="form-select rounded-3" id="assignedTo" multiple name="permission_ids[]">
                                            <option disabled>Select Permission</option>
                                            @foreach ($permissions as $permission)
                                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-select rounded-3" id="assignedTo" name="user_id">
                                            <option disabled>Select User</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    @if ($user->id == $role->user_id) selected @endif>{{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div> User ID: {{ $role->user_id }}</div>
                                    </div>
                                    <div class="d-grid d-flex gap-1 align-items-center">
                                        <button class="btn btn-outline-primary rounded-3 btn-sm" type="submit">Update
                                            Role</button>
                                            <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm">Back To Roles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <!-- Role List will be displayed here -->
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
