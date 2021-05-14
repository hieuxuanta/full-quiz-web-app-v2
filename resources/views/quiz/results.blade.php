<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Results</title>

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bquiz.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/jquery-3.2.0.min.js') }}"></script>
</head>

<body>
    {{-- report score by level A, B, C --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Quiz Report</h1>
                <h5 class="text-center">for {{ $results->quiz_event->quiz_event_name }}</h5>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <p>
                    Student name:
                    <b>
                        {{ $results->user_profile->ext_name }}.&nbsp;
                        {{ $results->user_profile->full_name }}
                        {{-- {{ $results->user_profile->given_name }}

                        {{$results->user_profile->middle_name }} --}}
                    </b>
                </p>
                <p>
                    Student identification number:
                    <b>
                        {{ $results->user_profile->usr_identification_numb }}
                    </b>
                </p>
                <br>
                <p>
                    The above mentioned student got a rating of
                    <b>
                        @php
                            $ave = $results->score / $sum;
                            echo number_format($ave, 2) * 100 . '%';
                        @endphp
                    </b> ({{ $results->score }}/{{ $sum }} pts).
                </p>
                <p>
                    <b>RANK:
                        {{ $results->rank }}
                        @if ($results->rank == 'A' || $results->rank == 'B')
                            (Pass)
                        @else
                            (Fail)
                        @endif
                    </b>
                </p>
                <p>
                    This is a computer generated report.
                </p>
                <a href="/panel">Go back to home</a>

            </div>
            <br>
            <div class="col-md-4">
                @switch($results->rank)
                    @case("A")
                        <img src="/assets/img/grade-A.jpg" alt="grade-A" style="width:230px">
                    @break

                    @case("B")
                    <img src="/assets/img/grade-B.jpg" alt="grade-B" style="width:230px">
                    @break

                    @case("C")
                    <img src="/assets/img/grade-C.jpg" alt="grade-C" style="width:230px">
                    @break

                    @default
                    <img src="/assets/img/grade-D.jpg" alt="grade-D" style="width:230px">
                @endswitch

            </div>
        </div>


    </div>
    {{-- TODO: then after all, print quiz result as pdf file --}}
</body>
