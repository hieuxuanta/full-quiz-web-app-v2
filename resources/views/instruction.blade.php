@extends('layouts.app')

@section('title', 'BQuiz - An Online Quiz System')
@section('content')
    <main>
        <style>
            .card-body .fa.fa-check-circle-o {
                color: #3D84B8;
                font-size: 18px;
            }

        </style>

        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-center text-muted">
                                    Follow these rules to make the quiz easier !
                                </p>
                                <hr>
                                <p><i class="fa fa-check-circle-o" aria-hidden="true"></i> Register account in home page (ask teacher for class code)</p>
                                <p><i class="fa fa-check-circle-o" aria-hidden="true"></i> Choose your favorite quiz event</p>
                                <p><i class="fa fa-check-circle-o" aria-hidden="true"></i> Do the quiz with bunch of fascinating questions</p>
                                <p><i class="fa fa-check-circle-o" aria-hidden="true"></i> Get the result and download it for free!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 text-left mr-auto d-md-flex flex-column align-items-center">

                        {{-- <p class="lead text-center" style="margin-top: 0rem; font-size: 2rem">
                            Follow these rules to make the quiz easier !
                        </p> --}}
                        <img src="/assets/img/manual-user-manual-logo.png" alt="" class="img-fluid" style="min-width: 100px; width: 300px;">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <h3 class="text-muted">BQuiz</h3>
                    <p class="text-muted">An Online Quiz System built for the Web.</p>
                </div>
                <div class="col-lg-8 col-md-12">
                    <ul class="list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><a href="/instruction">Instruction</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

@endsection
