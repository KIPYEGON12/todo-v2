<!DOCTYPE html>
<html lang="en">

<header>
</header>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO APP</title>
    <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark border rounded-0 border-dark solid sticky-top mt-3" role="navigation">
        <div class="container">
            <a class="navbar-brand text-white" href="/"><span class="fas fa-tasks me-1"> </span>ToDo APP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white rounded-0 border-white" aria-current="page"
                            href="/users">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white rounded-0 border-white" href="/tasks">Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white rounded-0 border-white" href="/new-user">New User</a>
                    </li>
                    <div class="d-flex">
                            <li class="nav-item">
                        <a class="nav-link text-white rounded-0 border-white">
                            @if (Route::has('login'))
                                @auth
                                    <div class="d-flex">
                                        <a href="{{ url('/dashboard') }}"
                                            class="nav-link text-white rounded-0 border-white">
                                            Dashboard
                                        </a>
                                        <form action="{{ route('logout') }}" method="post" class="logout-form">
                                            @csrf
                                            <button class="nav-link text-white rounded-0 border-white"
                                                type="submit">Logout</button>
                                        </form>
                                    </div>
                                @else
                                    <div class="d-flex">
                                        <a href="{{ route('login') }}"
                                            class="nav-link text-white rounded-0 border-white">Login</a>
                                        @if (Route::has('register'))
                                            <a href="http://126.0.0.1:8000/register"
                                                class="nav-link text-white rounded-0 border-white">Register</a>
                                        @endif
                                    </div>
                                @endauth
                            @endif
                        </a>
                    </li>



                    </div>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                <div class="card rounded-3 shadow">
                    <div class="card-body py-3">
                        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="/dashboard">
                                    <span class="fw-bold" style="font-size: 1.2rem;">Dashboard</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/assigned-tasks">
                                    <span class="fw-bold" style="font-size: 1.2rem;">Assigned Tasks</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/completed-tasks">
                                    <span class="fw-bold" style="font-size: 1.2rem;">Completed Tasks</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/settings">
                                    <span class="fw-bold" style="font-size: 1.2rem;">Settings</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer text-center py-2">
                        <a class="btn btn-link btn-sm" href="/profile">View Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="alert alert-success rounded-3 shadow-sm" role="alert">
                    Task assigned successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <h4>Assign a Task</h4>
                <div class="col">
                    <style>
                        .custom-input {
                            border-top-left-radius: 0.25rem;
                            border-top-right-radius: 0.25rem;
                            border-bottom-left-radius: 0.25rem;
                            border-bottom-right-radius: 0.25rem;
                            border: 1px solid #ced4da;
                            (0, 0, 0, 0.125);
                        }
                    </style>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control rounded-3" id="taskName" placeholder="Task Name">
                    </div>
                    <style>
                        .custom-select {
                            border-top-left-radius: 0.25rem;
                            border-top-right-radius: 0.25rem;
                            border-bottom-left-radius: 0.25rem;
                            border-bottom-right-radius: 0.25rem;
                            border: 1px solid #000305;
                            (0, 0, 0, 0.125);
                        }
                    </style>
                    <div class="col">
                        <select class="form-select rounded-3" id="assignedTo">
                            <option selected disabled>Select User</option>
                            <option value="user1">User 1</option>
                            <option value="user2">User 2</option>
                            <option value="user3">User 3</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-outline-secondary rounded-3 mt-3" type="button">Assign
                            Task</button>
                    </div>
                </div>
                <hr>
                <div class="mt-3">
                    <!-- Task List will be displayed here -->
                </div>
            </div>
            <div class="col-3">
                <div class="card border rounded-0">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="mb-0">Search Users</h5>
                    </div>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input placeholder="Search users..." class="form-control rounded-0 mb-3" type="text"
                                id="searchUsers">
                            <button class="btn btn-dark rounded-3 w-100">Search</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-3">
                    <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                        <li class="nav-item">
                            <a class="nav-link text-dark rounded-bottom border border-dark" href="/users/create">
                                <span>Create User</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-bottom border border-dark" href="/users">
                                <span>Manage Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-bottom border border-dark" href="/tasks/create">
                                <span>Create Task</span>
                            </a>
                        </li>
                        <li class="nav-item rounded-bottom border border-dark">
                            <a class="nav-link" href="/tasks">
                                <span>Manage Tasks</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
