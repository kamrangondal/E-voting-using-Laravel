@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard (Create Nominee Page)') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as admin!') }}
                    <br>
                    <a href="http://localhost/e-voting/public/vadmin" class="btn btn-outline-primary btn-lg" role="button" aria-pressed="true">Move to main Admin Panel</a>
                    <a href="http://localhost/e-voting/public/nominee/read-nominee" class="btn btn-outline-primary btn-lg " role="button" aria-pressed="true">Read the nominee data</a>
                    <br>
                    <form action="{{route('saveUpdatedData.nominee',$nominees->id)}}" method="post">
                    @csrf
                        <br>
                        <div class="form-group">
                            <label for="name">Name of Nominee:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$nominees->name}}">
                        </div>

                        <div class="form-group">
                            <label for="election">Election name: &nbsp;</label>
                            <select id="dropdown" name="election" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"> 
                                @foreach($elections as $election)
                                <option value="{{$election->id}}"> 
                                {{$election->name}} 
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="position">Position name: &nbsp;</label>
                            <select id="dropdown" name="position" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"> 
                                @foreach($positions as $position)
                                <option value="{{$position->id}}"> 
                                {{$position->name}} 
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
