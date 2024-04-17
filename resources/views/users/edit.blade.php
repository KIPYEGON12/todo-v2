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
        <form method="POST" action="{{ url('users/' . $user->id) }}"> <!-- Assuming $user is the user you want to edit -->
            @csrf
            @method('PUT') {{-- or @method('PATCH') depending on your setup --}}
            <div class="row">
                <div class="col-9">
                    <div class="card-body">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Edit User</h5>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control rounded-3" id="userName"
                                            placeholder="User Name" name="name" value="{{ $user->name }}">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control rounded-3" id="userEmail"
                                            placeholder="Email Address" name="email" value="{{ $user->email }}">
                                    </div>
                                    <div> User ID: {{ $user->id }}</div>
                                    <!-- Add other user fields as needed -->
                                    <hr>
                                    <div class="d-flex gap-1 align-items-center">
                                        <button class="btn btn-outline-primary rounded-3 btn-sm" type="submit">Update
                                            User</button>
                                        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">Back To
                                            Users</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <!-- User List will be displayed here -->
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
