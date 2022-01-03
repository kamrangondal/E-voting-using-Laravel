@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard (Update Election Page)') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as admin!') }}
                    <br>
                    <a href="http://localhost/e-voting/public/vadmin" class="btn btn-outline-primary btn-lg" role="button" aria-pressed="true">Move to main Admin Panel</a>
                    <a href="http://localhost/e-voting/public/election/read-election" class="btn btn-outline-primary btn-lg " role="button" aria-pressed="true">Read the On-Going Elections</a>
                    <br>
                    <form action="{{route('saveUpdatedData.election',$elections->id)}}" method="post">
                    @csrf
                        <br>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <input type="integer" class="form-control" id="status" name="status" aria-describedby="emailHelp" value="{{$elections->status}}">
                            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                        <div class="form-group">
                            <label for="start">Start Time:</label>
                            <input type="datetime-local" class="form-control" id="start" name="start" value="{{$elections->start}}">
                        </div>
                        <div class="form-group">
                            <label for="end">End Time:</label>
                            <input type="datetime-local" class="form-control" id="end"  name="end" value="{{$elections->end}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Name of Election:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$elections->name}}">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
