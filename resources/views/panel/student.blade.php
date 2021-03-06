@extends('layouts.app')
@section('title', 'Quiz - BQuiz')
@section('content')
<style>
    main{
        padding-top: 2.5rem;
    }

    .quiz-event {
        margin: 0 0 1.75rem;
    }
</style>
<main>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#pending" role="tab" aria-controls="v-pills-home"
                            aria-expanded="true">Pending Quiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#upcoming" role="tab" aria-controls="v-pills-profile"
                            aria-expanded="true">Upcoming Quiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#settings" role="tab" aria-controls="v-pills-settings"
                            aria-expanded="true">Settings</a>
                    </li>
                </ul>
            </nav>

            <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
                <div class="tab-content col" id="v-pills-tabContent">
                    <div class="tab-pane fade show active mb-md-5" id="pending" role="tabpanel" aria-labelledby="quiz-events">
                        <h2 class="mb-4">Pending Quizzes</h2>

                        <div class="row mb-2">
                            <!-- Example of a quiz event entry -->
                            @foreach ($pending_quiz as $pq)
                            <div class="col-6 quiz-event">
                                {{-- TODO: if done the quiz, gray out the course, remove btn Start, move to FINISHED QUIZ --}}

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $pq->quiz_event_name }}</h4>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $pq->subject_desc }}</h6>
                                        <a href="/take/{{ $pq->quiz_event_id }}" class="btn btn-outline-primary">Start</a>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade mb-md-5" id="upcoming" role="tabpanel" aria-labelledby="manage-class">
                        <h2 class="mb-4">Upcoming Quizzes</h2>
                        <div class="row mb-2">
                            <!-- Example of a quiz event entry -->
                            <div class="col-6 quiz-event">
                                @foreach ($upcoming_quiz as $uq)
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $uq->quiz_event_name }}</h4>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $uq->classe->subject->subject_desc }}</h6>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
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
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#changePassword">
                                                <i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;&nbsp;Change password
                                            </button>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-md-flex">
                                        <div class="pr-md-3">
                                            <strong>Join another class</strong>
                                            <p>This will allow you to join an existing class in order to take that class' quizzes.</p>
                                        </div>
                                        <div class="my-md-auto" style="margin-left: auto">
                                            <button class="btn btn-secondary" data-toggle="modal" data-target="#joinClass" style="float: right">
                                                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;Join another class
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
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePassword" aria-hidden="true">
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
<!-- Change password modal -->
<div class="modal fade" id="joinClass" tabindex="-1" role="dialog" aria-labelledby="joinClass" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Join class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Class Code</label>
                    <input id="class_code" type="text" class="form-control">
                    <div class="invalid-feedback">
                        Either this is an invalid class code or you have already joined.
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="joinClass()">Join Class</button>
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
    function changePassword(){
        var oldPass = $('#pwd').val();
        var newPass = $('#pwd_new').val();
        var update_type = 0;

         $.ajax({
            url: '/account/' + {{Auth::id()}},
            type: 'PUT', //type is any HTTP method
            data: {
                update_type, oldPass, newPass
            }, //Data as js object
            success: function () {
                $('#changePassword').modal('hide')
                $('#changePasswordSuccess').modal('show')
                $('#pwd').removeClass('is-invalid');
            },
            error: function(data){
                $('#pwd').addClass('is-invalid');
            }
        });
    }
    function joinClass(){
        var class_code = $('#class_code').val();
         $.ajax({
            url: '/join',
            type: 'POST', //type is any HTTP method
            data: {
                class_code
            }, //Data as js object
            success: function () {
                $('#class_code').removeClass('is-invalid');
                window.location.reload(true);
            },
            error: function(){
                $('#class_code').addClass('is-invalid');
            }
        });
    }
</script>
@endsection
