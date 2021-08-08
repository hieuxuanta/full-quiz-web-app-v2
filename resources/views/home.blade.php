@extends('layouts.app')

@section('title', 'BQuiz - An Online Quiz System')
@section('content')
    <main>
        <style>
            p.home-lead {
                font-size: 26px;
            }

            h1.home-title {
                font-size: 72px;
            }
            .logo {
                background-image: url('/assets/img/ThCorporation-since1999-transparent.png');
                background-position: center;
                background-size: cover;
                height: 400px;
                width: 400px;
            }
        </style>

        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 text-left mr-auto d-md-flex flex-column align-items-center">
                        <img src="/assets/img/ThCorporation-since1999-transparent.png" alt="" class="img-fluid">
                        <p class="lead text-center" style="margin-top: 0rem; font-size: 2rem">
                            An Online Quiz System built for the Web.
                        </p>
                    </div>
                    @if (Auth::guest())
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-center text-muted">
                                    Already have an account and just want to join a class?
                                    <a href="login">Click here</a> to join!
                                </p>
                                <hr>
                                <form method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <div class="form">
                                            <input name="n_full" id="n_full" type="text" placeholder="Full name (required)" class="form-control mb-2 {{ $errors->has('n_full') ? 'is-invalid' : '' }}" value="{{ old('n_full') }}">
                                            <div class="invalid-feedback">
                                                {{ $errors->first('n_full') }}
                                            </div>
                                            <input name="n_ext" id="n_ext" type="text" placeholder="Mr / Ms" class="form-control my-2" value="{{ old('n_ext') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input name="usr" id="usr" type="text" class="form-control {{ $errors->has('usr') ? 'is-invalid' : '' }}" value="{{ old('usr') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('usr') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input name="password" id="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                        <small class="form-text text-muted">At least 8 characters</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password_confirmation" required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Class Code</label>
                                        <input name="class_code" id="class_code" type="text" class="form-control {{ $errors->has('class_code') ? 'is-invalid' : '' }}" value="{{ old('class_code') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('class_code') }}
                                        </div>
                                        <small class="form-text text-muted">Ask your teacher for the code</small>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-block">Register</button>
                                        <small class="form-text text-muted text-center">By clicking "Register", you agree to our terms of service and privacy policy.</small>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
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
