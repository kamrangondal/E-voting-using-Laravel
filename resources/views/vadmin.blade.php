@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as admin!') }}
                    <br><br>
                    <div class="d-grid gap-0.1">
                    <a href="http://localhost/e-voting/public/election/election" class="btn btn-outline-primary btn-lg btn-block" role="button" aria-pressed="true">Add/View Elections</a>
                    <br><br>
                    <a href="http://localhost/e-voting/public/position/position" class="btn btn-outline-primary btn-lg btn-block" role="button" aria-pressed="true">Add Position in existing election</a>
                    <br><br>
                    <a href="http://localhost/e-voting/public/nominee/nominee" class="btn btn-outline-primary btn-lg btn-block" role="button" aria-pressed="true">Add Nominee in existing election</a>
                    <br><br>
                    <a href="http://localhost/e-voting/public/mailer" class="btn btn-outline-primary btn-lg btn-block" role="button" aria-pressed="true">Send Email</a>
                    <br><br>
                    <a href="http://localhost/e-voting/public/result1" class="btn btn-outline-primary btn-lg btn-block" role="button" aria-pressed="true">Display Result</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
