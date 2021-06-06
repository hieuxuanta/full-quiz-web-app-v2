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

    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" />
</head>

<body>
    {{-- report score by level A, B, C --}}

    <div class="container" id="print_pane">
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
                <a href="/panel" id="backHomeBtn">Go back to home</a>

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
        <input type="hidden" name="results" id="results" value="{{ $results }}">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- <a class="btn btn-primary" href="{{ URL::to('download-result') }}">Export to PDF</a> --}}
                <a class="btn btn-light" id="printBtn" href="#" onclick="downloadPDF()" title="Export Result as PDF">
                    <i class="fa fa-download" style="color: #008DFF" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
    {{-- then after all, print quiz result as pdf file --}}
    <script>
        function downloadPDF(){
            let printBtn = document.querySelector('#printBtn');
            let backHomeBtn = document.querySelector('#backHomeBtn');
            document.title = '{{$results->user_profile->full_name}} - {{$results->user_profile->usr_identification_numb}} - Result';
            printBtn.classList.add('display_none');
            backHomeBtn.classList.add('display_none');
            window.print();
            printBtn.classList.remove('display_none');
            backHomeBtn.classList.remove('display_none');
        }
        // function printSelectedPane(divId){
        //     let printContents = document.getElementById(divId).innerHTML;
        //     let originalContents = document.body.innerHTML;

        //     document.body.innerHTML = printContents;
        //     document.title = '{{$results->user_profile->full_name}} - {{$results->user_profile->usr_identification_numb}} - Result';
        //     window.print();
        //     document.body.innerHTML = originalContents;
        // }
        // let results = document.querySelector('#results');
        // localStorage.setItem('results', JSON.stringify(results.value));

        // function setCookie(name, value, days) {
        //     var expires = "";
        //     if (days) {
        //         var date = new Date();
        //         date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        //         expires = "; expires=" + date.toUTCString();
        //     }
        //     document.cookie = name + "=" + (value || "") + expires + "; path=/";
        // }

        // //get your item from the localStorage
        // var resultsCK = JSON.parse(localStorage.getItem('results'));
        // setCookie('cookieSaveResults', resultsCK, 7);

    </script>
</body>
