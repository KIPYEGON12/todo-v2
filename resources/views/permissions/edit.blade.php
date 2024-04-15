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
    <form method="POST" action="{{ url('permissions/'.$permission->id) }}">
        @csrf
        @method('PUT') {{-- or @method('PATCH') depending on your setup --}}
        <div class="row">
            <div class="col-9">
                {{-- <div class="alert alert-success rounded-3 shadow-sm" role="alert">
                    permission assigned successfuCreate a new tCreate a new permission.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> --}}
                <h4>Edit permission</h4>
                <div class="col">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control rounded-3" id="permissionName" placeholder="permission Name" name="name" value="{{ $permission->name }}">
                    </div>

                    <div class="col">
                        <select class="form-select rounded-3" id="assignedTo" name="user_id">
                            <option disabled>Select User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" @if($user->id == $permission->user_id) selected @endif>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-outline-secondary rounded-3 mt-3" type="submit">Update permission</button>
                    </div>
                </div>
                <hr>
                <div class="mt-3">
                    <!-- permission List will be displayed here -->
                </div>
            </div>
        </div>
    </form>
</div>
@endsection