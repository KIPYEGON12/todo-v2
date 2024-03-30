@extends('layouts.app')

@section('content')
    <div>

        <div class="d-flex justify-content-between">
            <h1>All users</h1>
            <div>
                <a href="{{ url('users/create') }}" class="btn btn-primary btn-sm">Create a new user</a>
            </div>
        </div>

        {{-- @dd($users) --}}
        <div class="container mt-4">
            <h2>User Table</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>Admin</td>
                            <td>
                                <button class="btn btn-primary btn-sm">Edit</button>
                                <button class="btn btn-danger btn-sm">Delete</button>
                                <button class="btn btn-warning btn-sm">View</button>

                            </td>
                        </tr>
                        <!-- Add more rows for additional users -->
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- <div class="user">
        <h2>{{ $user->name }}</h2>
        <p>{{ $user->id}}</p>
        <div class="d-flex">

            <form  method="post" action="{{ route('users.destroy', $user->id) }}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            &nbsp;
             <form  method="post" action="{{ route('users.edit', $user->id) }}">
                @csrf
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>

            <a href="{{ route('users.show', $user->id) }}" class="btn btn-link">View</a>
        </div> --}}

    </div>
    </div>
@endsection
