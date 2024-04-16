@extends('layouts.app')

@section("content")
<div>

    <div class="d-flex justify-content-between">
        <h1>All roles</h1>
        <div>
            <a href="{{ url('roles/create') }}" class="btn btn-primary btn-sm">Create a new role</a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role</th>
                    <th>Permission</th>
                    <th>Created By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{  $role->permission->name ?? 'N/A' }}</td>
                    <td>{{ $role->person->name  }}</td>
                    <td class="d-flex gap-1">
                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">Edit</a>

                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-warning">View</a>

                {{-- @dd(route('roles.destroy', $role->id)) --}}
                <form  method="post" action="{{ route('roles.destroy', $role->id) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
            {{-- @dd($roles) --}}

</div>


@endsection
