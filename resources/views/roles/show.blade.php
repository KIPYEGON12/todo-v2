@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Role Details</div>

                <div class="card-body">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $role->name }}</h5>
                            <h5 class="card-title">created by:{{ $role->user->name ?? 'N/A' }}</h5>
                            <p class="card-text">Assigned To: {{ $role->assigned_to }}</p>
                            <p class="card-text">Created at: {{ date('M d, Y', strtotime($role->created_at)) }}</p>
                            <!-- You can customize the date format based on your preference -->
                            <!-- Add more role details as needed -->
                            <hr>
                            <div class="d-flex gap-1 align-items-center">
                                <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm">Back to Roles list</a>
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form method="post" action="{{ route('roles.destroy', $role->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




