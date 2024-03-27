<!DOCTYPE html>
<html lang="en">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        .roboto-thin {
  font-family: "Roboto", sans-serif;
  font-weight: 100;
  font-style: normal;
}

.roboto-light {
  font-family: "Roboto", sans-serif;
  font-weight: 300;
  font-style: normal;
}

.roboto-regular {
  font-family: "Roboto", sans-serif;
  font-weight: 400;
  font-style: normal;
}

.roboto-medium {
  font-family: "Roboto", sans-serif;
  font-weight: 500;
  font-style: normal;
}

.roboto-bold {
  font-family: "Roboto", sans-serif;
  font-weight: 700;
  font-style: normal;
}

.roboto-black {
  font-family: "Roboto", sans-serif;
  font-weight: 900;
  font-style: normal;
}

.roboto-thin-italic {
  font-family: "Roboto", sans-serif;
  font-weight: 100;
  font-style: italic;
}

.roboto-light-italic {
  font-family: "Roboto", sans-serif;
  font-weight: 300;
  font-style: italic;
}

.roboto-regular-italic {
  font-family: "Roboto", sans-serif;
  font-weight: 400;
  font-style: italic;
}

.roboto-medium-italic {
  font-family: "Roboto", sans-serif;
  font-weight: 500;
  font-style: italic;
}

.roboto-bold-italic {
  font-family: "Roboto", sans-serif;
  font-weight: 700;
  font-style: italic;
}

.roboto-black-italic {
  font-family: "Roboto", sans-serif;
  font-weight: 900;
  font-style: italic;
}

    </style>

 <header
    @if (Route::has('login'))
    <nav class="flex justify-end pt-4">
        @auth
        <div class="d-flex gap-2 w-100 px-2 align-items-center ">
            <a href="{{ url('/dashboard') }}" class="dashboard-link" style=>
                Dashboard
            </a>
            <form action="{{ route('logout') }}" method="post" class="logout-form">
                @csrf
                <button class="btn  btn-primary" type="submit">Logout</button>
            </form>
        </div>
        @else
        <div class="flex">
                <a href="{{ route('login') }}" class="btn rounded-0 px-3 py-2 mr-4 text-black border border-black transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white" style="text-transform: uppercase; font-weight: bold;">
                    Login
                </a>

                @if (Route::has('register'))
                    <a href="http://127.0.0.1:8000/register" class="btn rounded-0 px-3 py-2 mr-4 text-black border border-black transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white" style="text-transform: uppercase; font-weight: bold;">
                        Register
                    </a>
                @endif
            </div>
        @endauth
    </nav>

    @endif
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
                        <a class="nav-link active text-white rounded-0 border-white" aria-current="page" href="/users">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white rounded-0 border-white" href="/tasks">Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white rounded-0 border-white" href="/new-user">New User</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-4">

        {{-- page content goes here --}}
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
