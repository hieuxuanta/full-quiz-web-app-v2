@extends('layouts.app')
@section('title', 'Quiz Dashboard - BQuiz')
@section('content')
    <style>
        main {
            padding-top: 2.5rem;
        }

        #my-classes .card .card-body h3 {
            position: absolute;
            bottom: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #my-classes .card-body h6 {
            margin: 0 0 50px;
        }

        #my-classes .card-body h4 {
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
                            <a class="nav-link {{ $subjects->count() == 0 ? 'disabled' : '' }} " id="v-pills-class-tab"
                                data-toggle="pill" href="#my-classes" role="tab" aria-controls="v-pills-class"
                                aria-expanded="true">My Classes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#settings" role="tab"
                                aria-controls="v-pills-settings" aria-expanded="true">Settings</a>
                        </li>
                    </ul>
                </nav>

                <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
                    <div class="tab-content container" id="v-pills-tabContent">
                        <div class="tab-pane fade show active mb-md-5" id="dashboard" role="tabpanel"
                            aria-labelledby="dashboard">
                            <h2 class="align-left">Dashboard</h2>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 pb-3">
                                    <div class="card text-white bg-primary">
                                        <div class="card-body">
                                            <h1 class="align-left display-4">{{ $quiz_events->count() }}</h1>
                                            <p class="lead align-left">Quizzes on queue</p>
                                        </div>
                                        <a title="view-quizz" class="card-footer text-white clearfix small z-1 align-left"
                                            href="">View quizzes</a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-12 pb-3">
                                    <div class="card text-white bg-secondary">
                                        <div class="card-body">
                                            <h1 class="align-left display-4">{{ $finished_quiz_events->count() }}</h1>
                                            <p class="lead align-left">Quizzes finished</p>
                                        </div>
                                        <a title="view-quizz" class="card-footer text-white clearfix small z-1 align-left"
                                            href="">View quizzes</a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-12 pb-3">
                                    <div class="card text-white bg-info">
                                        <div class="card-body">
                                            <h1 class="align-left display-4">{{ $classes->count() }}</h1>
                                            <p class="lead align-left">Classes</p>
                                        </div>
                                        <a id="shortcut_view_classes"
                                            class="card-footer text-white clearfix small z-1 align-left" href="">View
                                            classes</a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-12 pb-3">
                                    <div class="card text-white bg-success">
                                        <div class="card-body">
                                            <h1 class="align-left display-4">{{ $subjects->count() }}</h1>
                                            <p class="lead align-left">Subjects</p>
                                        </div>
                                        <a class="card-footer text-white clearfix small z-1 align-left"
                                            href="/subjects">View subjects</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade {{ $classes->count() == 0 ? '' : '' }} mb-md-5" id="quiz-events"
                            role="tabpanel" aria-labelledby="quiz-events">
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
                                                {{-- icon for upcoming quiz events, otherwise no icon appears --}}
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
                                                <th>#</th>
                                                <th>Topic</th>
                                                <th>Subject</th>
                                                <th>Class</th>
                                                <th>Active</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($finished_quiz_events as $qe)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td><a
                                                            href="/quiz/{{ $qe->quiz_event_id }}">{{ $qe->quiz_event_name }}</a>
                                                    </td>
                                                    <td>{{ $qe->classe->subject->subject_desc }}</td>
                                                    <td>{{ $qe->classe->course_sec }}</td>
                                                    {{-- icon for finished quiz events --}}
                                                    @if ($qe->quiz_event_status == 2)
                                                        <td>
                                                            <i class="fa fa-ban" aria-hidden="true"></i>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#NewQuizEventModal">New quiz event</button> --}}
                            <a class="btn btn-primary" href="/quiz/create">
                                <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add new
                            </a>
                        </div>

                        <div class="tab-pane fade {{ $classes->count() == 0 ? '' : '' }} mb-md-5" id="my-classes"
                            role="tabpanel" aria-labelledby="my-classes">
                            <!-- Manage Class -->
                            <!-- Fetch instructor's subjects -->
                            <h2 class="mb-4">My Classes</h2>
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
                                            <a href="/class/{{ $classe->class_id }}" class="card-footer text-center">View
                                                Class</a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#NewClassModal">
                                <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add new
                            </button>

                        </div>

                        <div class="tab-pane fade mb-md-5" id="settings" role="tabpanel" aria-labelledby="settings">
                            <h2 class="mb-4">Advanced Settings</h2>
                            <div class="card" style="width: 40rem;">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-md-flex">
                                        <div class="pr-md-3">
                                            <strong>Change password</strong>
                                            <p>This will allow you to change your password.</p>
                                        </div>
                                        <div class="my-md-auto" style="margin-left: auto">
                                            <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#changePassword">
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

    <!-- New Quiz Modal -->
    <div class="modal fade" id="NewQuizEventModal" tabindex="-1" role="dialog" aria-labelledby="NewQuizEventModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content form" action="/new/quiz" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalTitle">New Quiz Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Quiz Name</label>
                        <input name="quiz_name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Class</label>
                        <select name="class_id" id="class_id" class="form-control">
                            @foreach ($classes as $classe)
                                <option value="{{ $classe->class_id }}">{{ $classe->subject->subject_desc }}
                                    ({{ $classe->course_sec }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Questions</label>
                        <input name="questions" type="number" min="1" class="form-control">
                    </div>
                    <!-- TODO: Time limit -->
                    <div class="form-group">
                        <label for="">Questionnaire to use</label>
                        <select name="questionnaire" id="questionnaire" class="form-control">
                            <option value="1">Create new questionnaire</option>
                            <option value="2">Use existing questionnaire</option>
                        </select>
                    </div>
                    <input type="hidden" name="valid" value="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </form>
        </div>
    </div>

    <!-- New Class Modal -->
    <div class="modal fade" id="NewClassModal" tabindex="-1" role="dialog" aria-labelledby="NewClassModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content form" action="/class" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalTitle">New Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Class Name</label>&nbsp;<small class="text-muted"><i>(Class name must be at least 3
                                characters long)</i></small>
                        <input name="course_sec" type="text" class="form-control" minlength="3" maxlength="50"
                            placeholder="Type in class name..." autofocus>
                    </div>
                    {{-- <div class="form-group">
                        <label for="">Class Code</label>
                        <input name="class_id" type="text" class="form-control">
                    </div> --}}
                    <div class="form-group">
                        <label for="">Subject</label>
                        <select name="sub_id" id="" class="form-control">
                            @foreach ($subjects as $s)
                                <option value="{{ $s->subject_id }}">{{ $s->subject_code }}: {{ $s->subject_desc }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button id="addClass_btn" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

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
        const vPillsHomeTab = document.querySelector('#v-pills-home-tab');
        const shortcutViewClasses = document.querySelector('#shortcut_view_classes');
        const viewQuizBtns = document.querySelectorAll("a[title='view-quizz']");

        shortcutViewClasses.addEventListener('click', (event) => {
            event.preventDefault();
            vPillsClassTab.click();
        })
        viewQuizBtns.forEach((vquizBtn, index) => {
            vquizBtn.addEventListener('click', (event) => {
                event.preventDefault();
                vPillsHomeTab.click();
            })
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

        function goToQuizPanel() {
            $('.nav-item a[href="#quiz-events"]').tab('show');
        }
    </script>

@endsection
