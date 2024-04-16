@extends('layouts.app')

@section('content')
    <div>

        <div class="d-flex justify-content-between">
            <h1>All permissions</h1>
            <div>
                <a href="{{ url('permissions/create') }}" class="btn btn-primary btn-sm">Create a new permission</a>
            </div>
        </div>

        {{-- @dd($permissions) --}}
        <div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Permission</th>
                            <th>Created By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{  $permission->user->name ?? 'N/A' }}</td>
                            <td class="d-flex gap-1">
                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary">Edit</a>

                        <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning">View</a>

                        {{-- @dd(route('permissions.destroy', $permission->id)) --}}
                        <form  method="post" action="{{ route('permissions.destroy', $permission->id) }}">
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
        </div>
    @endsection
