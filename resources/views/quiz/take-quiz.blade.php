<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $quiz->quiz_event_name }} - BQuiz</title>

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bquiz.css') }}" rel="stylesheet">
</head>
<style>
    .sidebar {
        position: fixed;
        top: 0px;
    }

</style>

<body>
    <div id="app">
        @php $questionNum = 1; @endphp
        <div class="container-fluid">
            <div class="row">
                <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item disabled">
                            <a class="nav-link disabled" style="font-size: 2rem; text-align: center">BQuiz</a>
                        </li>
                        {{-- Timer goes here --}}
                        <li class="nav-item d-md-flex justify-content-md-center align-items-md-center mb-md-3"
                            style="min-height: 40px;">
                            <img id="bq_timer_icon" class="display_none" src="/assets/img/clock-running-stick-man.gif"
                                alt="timer-img" style="width: 40px">
                            <p id="bq_timer_container" class="text-md-center my-md-0 ml-md-1"
                                style="font-size: 1.5rem;"></p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="v-pills-welcome-tab" data-toggle="pill" href="#welcome"
                                role="tab" aria-controls="v-pills-welcome" aria-expanded="true">Welcome</a>
                        </li>
                        @foreach ($quiz_content as $qc)
                            <li class="nav-item">
                                <a class="nav-link disabled" id="v-pills-q{{ $questionNum }}-tab" data-toggle="pill"
                                    href="#q{{ $questionNum }}" role="tab"
                                    aria-controls="v-pills-q{{ $questionNum }}" aria-expanded="true">
                                    Question {{ $questionNum++ }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    @php $questionNum = 1; @endphp
                </nav>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
                    <form class="tab-content col" id="v-pills-tabContent" action="/take" method="POST">
                        {{ csrf_field() }}
                        <div class="tab-pane fade show active" id="welcome" role="tabpanel" aria-labelledby="welcome">
                            <h1>Welcome!</h1>
                            <p>Please verify that you are using your <b>OWN</b> account. If not, logout then login using
                                your
                                own credentials.</p>
                            <p></p>
                            <p>Quiz: <b>{{ $quiz->quiz_event_name }}</b></p>
                            <p>Name: <b>
                                    {{ $user_profile->ext_name }}.&nbsp;
                                    {{ $user_profile->full_name }}
                                </b></p>
                            <p>
                                Identification number:
                                <b>
                                    {{ $user_profile->usr_identification_numb }}
                                </b>
                            </p>
                            <p>Course and Section: <b>{{ $quiz->classe->course_sec }}</b></p>
                            <button type="button" id="enablequizbtn" class="btn btn-primary" onclick="enableQuiz()">Yes,
                                this is correct</button>
                            <a href="/panel" id="disablequizbtn" class="btn btn-dark">
                                No, turn back!
                            </a>
                            <button type="button" class="btn btn-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </button>

                        </div>

                        @foreach ($quiz_content as $qc)
                            <div class="tab-pane fade" id="q{{ $questionNum }}" role="tabpanel"
                                aria-labelledby="q{{ $questionNum }}">
                                <input type="hidden" name="question_id[{{ $questionNum }}]"
                                    value="{{ $qc->question_id }}">
                                @if ($qc->question_type == 1)
                                    <h1>Question #{{ $questionNum }}</h1><span
                                        class="badge badge-info">Identification</span>
                                    <hr>
                                    <span style="font-size: 1.5rem"><span style="font-size: 1.5rem">{{ $qc->question_name }}</span>&nbsp;({{$qc->points}} points)</span>
                                    <div class="form-group">
                                        <textarea class="form-control" name="answer[{{ $questionNum }}]" rows="3"
                                            placeholder="Input answer here..."></textarea>
                                    </div>

                                @elseif($qc->question_type == 2)
                                    <h1>Question #{{ $questionNum }}</h1><span class="badge badge-info">Multiple
                                        Choice</span>
                                    <hr>
                                    <span style="font-size: 1.5rem"><span style="font-size: 1.5rem">{{ $qc->question_name }}</span>&nbsp;({{$qc->points}} points)</span>
                                    @php
                                        $choices = explode(';', $qc->choices);
                                        $choicenum = 1;
                                    @endphp
                                    @foreach ($choices as $choice)
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label for="mc_c{{ $choicenum }}" class="form-check-label">
                                                    <input class="form-check-input" type="radio"
                                                        name="answer[{{ $questionNum }}]"
                                                        id="mc_c{{ $choicenum }}" value="{{ $choicenum++ }}">
                                                    {{ $choice }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach

                                @elseif($qc->question_type == 3)
                                    <h1>Question #{{ $questionNum }}</h1><span class="badge badge-info">True or
                                        False</span>
                                    <hr>
                                    <span style="font-size: 1.5rem"><span style="font-size: 1.5rem">{{ $qc->question_name }}</span>&nbsp;({{$qc->points}} points)</span>
                                    <div class="form-group">
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio"
                                                    name="answer[{{ $questionNum }}]" value="1">
                                                True
                                            </label>
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio"
                                                    name="answer[{{ $questionNum }}]" value="0">
                                                False
                                            </label>
                                        </div>
                                    </div>
                                @endif
                                <hr>
                                <div class="form-group">
                                    @if ($questionNum > 1)
                                        <button type="button" class="btn btn-primary"
                                            onclick="MoveQuestion({{ $questionNum - 1 }})">Previous</button>
                                    @endif
                                    @if ($questionNum < count($quiz_content))
                                        <button type="button" class="btn btn-primary"
                                            onclick="MoveQuestion({{ ++$questionNum }})">Next</button>
                                    @else
                                        <button type="button" id="submitBtn" class="btn btn-primary" data-toggle="modal"
                                            data-target="#submitModal">Submit</button>
                                        {{-- Submit modal --}}
                                        <div class="modal fade" id="submitModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" data-backdrop="static"
                                            data-keyboard="false" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Bquiz
                                                            notification</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        You still have time, are you sure to end the quiz now?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="submit" id="okSubmitBtn"
                                                            class="btn btn-primary">OK</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        <input type="hidden" name="quiz_event_id" id="qid" value="{{ $quiz->quiz_event_id }}">
                    </form>


                    <script>
                        // Selectors
                        const bqTimerContainer = document.querySelector('#bq_timer_container');
                        const bqTimerIcon = document.querySelector('#bq_timer_icon');
                        let enableQuizBtn = document.querySelector('#enablequizbtn');
                        let submitBtn = document.querySelector('#submitBtn');
                        let okSubmitBtn = document.querySelector('#okSubmitBtn');
                        let quizEventId = document.querySelector('#qid');

                        let quiz_count = @php echo(count($quiz_content)) @endphp;
                        let time_per_ques = 5; //minutes
                        let total_time = quiz_count * time_per_ques;
                        let total_time_in_second = total_time * 60;

                        enableQuizBtn.addEventListener('click', function() {
                            localStorage.setItem('bid', quizEventId.value);
                            //define a function to set cookies
                            function setCookie(name, value, days) {
                                var expires = "";
                                if (days) {
                                    var date = new Date();
                                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                                    expires = "; expires=" + date.toUTCString();
                                }
                                document.cookie = name + "=" + (value || "") + expires + "; path=/";
                            }

                            //get item from the localStorage
                            var bid = localStorage.getItem('bid');
                            setCookie('cookieSaveId', bid, 7);

                            // Update question pane
                            $(".disabled").removeClass("disabled");
                            $("#v-pills-welcome-tab").addClass("disabled");
                            $('.nav-item a[href="#q1"]').tab('show');

                            // Update countdown timer and icon
                            setTimeout(() => {
                                bqTimerIcon.classList.remove('display_none');
                            }, 1000);

                            let handleCountdown = setInterval(function() {
                                let minutes = Math.floor(total_time_in_second / 60);
                                let seconds = total_time_in_second % 60;

                                seconds = seconds < 10 ? '0' + seconds : seconds;

                                bqTimerContainer.textContent = `${minutes}:${seconds}`;
                                total_time_in_second--;
                                total_time_in_second = total_time_in_second < 0 ? 0 :
                                    total_time_in_second;

                                if (total_time_in_second == 0) {
                                    clearInterval(handleCountdown);
                                    @php $questionNum = count($quiz_content) @endphp;
                                    alert("Time is over! Your result will be shown in a minute...");
                                    okSubmitBtn.click();
                                }
                            }, 1000);
                        });

                    </script>
                </main>
            </div>
        </div>
    </div>



    <script src="{{ asset('assets/js/jquery-3.2.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bquiz.js') }}"></script>
</body>


</html>
