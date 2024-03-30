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
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            Total Users
                            <div class="row">
                                {{ $users }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div style="border: 1px solid #111111; padding: 10px;">
                                <h5 class="card-title text-center" style="font-weight: bold; text-align: center;">Total Tasks</h5>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <p>Today's Tasks:</p>
                                    <p>{{ $today_tasks }}</p>
                                </div>
                                <div class="col">
                                    <p>Total Tasks:</p>
                                    <p>{{ $total_tasks }}</p>
                                </div>

                                <div class="col">
                                    <p>My Tasks:</p>
                                    <p>{{ $user_tasks_count }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div style="border: 1px solid #111111; padding: 10px;">
                    <h5 class="card-title text-center" style="font-weight: bold; text-align: center;"> 5 tasks</h5>
                            </div>
                            <div id="top-five-tasks-header"></div>
                            <div id="top-five-tasks"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getTopFiveTasks() {
            const tasksUrl = @json(url('top-five')); // Replace with your tasks URL

            const url = @json(url(''))

            fetch(tasksUrl)
                .then(response => response.json())
                .then(data => {
                    //setting table headers
                    const headers=`<div class="row mt-3">
                             <div class="col">
                               <p> <b>ID</b></p>
                            </div>
                            <div class="col">
                                <p><b>Task Name</b></p>
                            </div>
                            <div class="col">
                                <b>Assigned To</b>
                            </div>
                            <div class="col">
                                <b>Created at</b>
                            </div>
                            <div class="col">
                            <b>Action</b>
                            </div>
                        </div> `

                    document.getElementById('top-five-tasks-header').innerHTML = headers;

                    let topFiveTasksHTML = '';
                    data.forEach(task => {
                        topFiveTasksHTML += `<div class="row mt-3">
                            <div class="col">
                                <p>${task.id}</p>
                            </div>
                            <div class="col">
                                <p>${task.name}</p>
                            </div>
                            <div class="col">
                                <p>${task.user?.name || 'delvin problem'}</p>
                            </div>
                            <div class="col">
                                <p>${task.created_at}</p>
                            </div>
                            <div class="col">
                                <p><a href="${url}/tasks/${task.id}" class="btn btn-primary">Action</a></p>
                            </div>
                        </div>`;
                    });
                    document.getElementById('top-five-tasks').innerHTML = topFiveTasksHTML;
                })
                .catch(error => {
                    console.error('Error fetching tasks:', error);
                });
        }

        getTopFiveTasks();
    </script>
@endsection
