@extends('layouts.app')

@section("content")
<div>

    <div class="d-flex justify-content-between">
        <h1>All permissions</h1>
        <div>
            <a href="{{ url('permissions/create') }}" class="btn btn-primary btn-sm">Create a new permission</a>
        </div>
    </div>

    {{-- @dd($permissions) --}}
    @foreach ($permissions as $permission)

    <div class="permission">
        <h2>{{ $permission->name }}</h2>
        <h2 class="card-title">
            <span>Created by:{{ $permission->user->name }}</span>
            <span class=text-success>(#{{ $permission->user_id }})</span>
        </h2>
        <div class="d-flex gap-1">

            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary">Edit</a>

            <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning">View</a>

            <form  method="post" action="{{ route('permissions.destroy', $permission->id) }}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>

    </div>
    @endforeach
</div>

@endsection
