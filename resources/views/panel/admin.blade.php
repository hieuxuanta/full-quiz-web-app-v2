@extends('layouts.app')
@section('title', 'Administrator\'s Dashboard - BQuiz')
@section('content')
    <style>
        main {
            padding-top: 2.5rem;
        }
        #classes .card .card-body h3 {
            position: absolute;
            bottom: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #classes .card-body h6 {
            margin: 0 0 50px;
        }

        #classes .card-body h4 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.3;
        }

    </style>
    <main>
        <div class="container-fluid">
            <div class="row">
                <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" id="v-pills-dashboard" data-toggle="pill" href="#dashboard"
                                role="tab" aria-controls="v-pills-dashboard" aria-expanded="true">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $classes->count() == 0 ? 'disabled' : '' }}" id="v-pills-home-tab"
                                data-toggle="pill" href="#quiz-events" role="tab" aria-controls="v-pills-home"
                                aria-expanded="true">Quiz Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $classes->count() == 0 ? 'disabled' : '' }} " id="v-pills-class-tab"
                                data-toggle="pill" href="#classes" role="tab" aria-controls="v-pills-class"
                                aria-expanded="true">Classes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#settings" role="tab"
                                aria-controls="v-pills-settings" aria-expanded="true">Settings</a>
                        </li>
                    </ul>
                </nav>

                <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
                    <div class="tab-content container" id="v-pills-tabContent">
                        <div class="tab-pane fade show active mb-md-5" id="dashboard" role="tabpanel" aria-labelledby="dashboard">
                            <h2 class="align-left">Dashboard</h2>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 pb-3">
                                    <div class="card text-white bg-primary">
                                        <div class="card-body">
                                            <h1 class="align-left display-4">{{ $classes->count() }}</h1>
                                            <p class="lead align-left">Classes</p>
                                        </div>
                                        <a id="shortcut_view_classes" class="card-footer text-white clearfix small z-1 align-left"
                                            href="">View classes</a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-12 pb-3">
                                    <div class="card text-white bg-secondary">
                                        <div class="card-body">
                                            <h1 class="align-left display-4">{{ $subjects->count() }}</h1>
                                            <p class="lead align-left">Subjects</p>
                                        </div>
                                        <a class="card-footer text-white clearfix small z-1 align-left"
                                            href="/subjects">View subjects</a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-12 pb-3">
                                    <div class="card text-white bg-success">
                                        <div class="card-body">
                                            <h1 class="align-left display-4">{{ $teachers }}</h1>
                                            <p class="lead align-left">Teachers</p>
                                        </div>
                                        <a class="card-footer text-white clearfix small z-1 align-left"
                                            href="/teachers">View teachers</a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-12 pb-3">
                                    <div class="card text-white bg-info">
                                        <div class="card-body">
                                            <h1 class="align-left display-4">{{ $students }}</h1>
                                            <p class="lead align-left">Students</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade mb-md-5" id="quiz-events" role="tabpanel" aria-labelledby="quiz-events">
                            <h2 class="text-left mb-4">Quiz Events</h2>
                            <div class="col-10">
                                <h4>Current Quizzes</h4>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Topic</th>
                                            <th>Subject</th>
                                            <th>Class</th>
                                            <th>Active</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quiz_events as $qe)
                                            <tr id="quiz_entry{{ $qe->quiz_event_id }}">
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td><a
                                                        href="/quiz/{{ $qe->quiz_event_id }}">{{ $qe->quiz_event_name }}</a>
                                                </td>
                                                <td>{{ $qe->classe->subject->subject_desc }}</td>
                                                <td>{{ $qe->classe->course_sec }}</td>
                                                @if ($qe->quiz_event_status == 1)
                                                    <td>
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </td>
                                                @else
                                                    <td></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if (count($finished_quiz_events) >= 1)
                                <div class="col-10">
                                    <h4>Past Quizzes</h4>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Topic</th>
                                                <th>Subject</th>
                                                <th>Class</th>
                                                <th>Active</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($finished_quiz_events as $qe)
                                                <tr>
                                                    <td><a
                                                            href="/quiz/{{ $qe->quiz_event_id }}">{{ $qe->quiz_event_name }}</a>
                                                    </td>
                                                    <td>{{ $qe->classe->subject->subject_desc }}</td>
                                                    <td>{{ $qe->classe->course_sec }}</td>
                                                    @if ($qe->quiz_event_status == 1)
                                                        <td>
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>

                        <div class="tab-pane fade mb-md-5" id="classes" role="tabpanel" aria-labelledby="classes">
                            {{-- TODO: UI class like teacher --}}
                            <!-- Manage Class -->
                            <h2 class="mb-4">Classes</h2>
                            <div class="row">
                                <!-- Class entry -->
                                @foreach ($classes as $classe)
                                    <div class="col-xl-3 col-sm-6" style="min-height: 230px; margin: 0 0 1.75rem;">
                                        <div class="card" style="height: 100%">
                                            <div class="card-body">
                                                <h4 class="card-title">{{ $classe->subject->subject_code }}:
                                                    {{ $classe->subject->subject_desc }}</h4>
                                                <h6 class="card-subtitle text-muted">{{ $classe->course_sec }}</h6>
                                                <h3 class="text-center">{{ $classe->class_id }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane fade mb-md-5" id="settings" role="tabpanel" aria-labelledby="settings">
                            <h2 class="mb-4">Advanced Settings</h2>
                            <div class="card" style="max-width: 40rem;">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-md-flex">
                                        <div class="pr-md-3">
                                            <strong>Manage subjects</strong>
                                            <p>This will allow you to manage subjects to serve as basis for the classes.</p>
                                        </div>
                                        <div class="my-md-auto" style="margin-left: auto">
                                            <a class="btn btn-primary" href="/subjects">
                                                <i class="fa fa-cog" aria-hidden="true"></i>&nbsp;&nbsp;Manage subjects
                                            </a>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-md-flex">
                                        <div class="pr-md-3">
                                            <strong>Manage teachers</strong>
                                            <p>This will allow you to manage teachers to use this system.</p>
                                        </div>
                                        <div class="my-md-auto" style="margin-left: auto">
                                            <a class="btn btn-primary" href="/teachers">
                                                <i class="fa fa-cog" aria-hidden="true"></i>&nbsp;&nbsp;Manage teachers
                                            </a>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-md-flex">
                                        <div class="pr-md-3">
                                            <strong>Change password</strong>
                                            <p>This will allow you to change your password.</p>
                                        </div>
                                        <div class="my-md-auto" style="margin-left: auto">
                                            <button class="btn btn-secondary" data-toggle="modal" data-target="#changePassword">
                                                <i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;&nbsp;Change password
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </main>
            </div>
        </div>
    </main>
    <!-- Change password modal -->
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePassword"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Current password</label>
                        <input id="pwd" type="password" class="form-control">
                        <div class="invalid-feedback">
                            Input your correct password.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">New password</label>
                        <input id="pwd_new" type="password" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="changePassword()">Change password</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Change password Success Modal -->
    <div class="modal fade" id="changePasswordSuccess" tabindex="-1" role="dialog" aria-labelledby="changePasswordSuccess"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Success!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Password changed successfully!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // selectors
        const vPillsClassTab = document.querySelector('#v-pills-class-tab');
        const shortcutViewClasses = document.querySelector('#shortcut_view_classes');

        shortcutViewClasses.addEventListener('click', (event) => {
            event.preventDefault();
            vPillsClassTab.click();
        })

        function changePassword() {
            var oldPass = $('#pwd').val();
            var newPass = $('#pwd_new').val();
            var update_type = 0;

            $.ajax({
                url: '/account/' + {{ Auth::id() }},
                type: 'PUT', //type is any HTTP method
                data: {
                    update_type,
                    oldPass,
                    newPass
                }, //Data as js object
                success: function() {
                    $('#changePassword').modal('hide')
                    $('#changePasswordSuccess').modal('show')
                },
                error: function(data) {
                    $('#pwd').addClass('is-invalid');
                }
            });
        }

    </script>

@endsection
