@extends('layouts.app')

@section("content")
<div>

    <div class="d-flex justify-content-between">
        <h1>All roles</h1>
        <div>
            <a href="{{ url('roles/create') }}" class="btn btn-primary btn-sm">Create a new role</a>
        </div>
    </div>

    {{-- @dd($roles) --}}
    @foreach ($roles as $role)

    <div class="role">
        <h2>{{ $role->name }}</h2>
        <h2 class="card-title">
            <span>Created by:{{ $role->user->name }}</span>
            <span class=text-success>(#{{ $role->user_id }})</span>
        </h2>
        <div class="d-flex gap-1">

            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">Edit</a>

            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-warning">View</a>

            <form  method="post" action="{{ route('roles.destroy', $role->id) }}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>

    </div>
    @endforeach
</div>

@endsection
