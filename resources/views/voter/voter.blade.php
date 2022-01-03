@extends('layouts.app')

@section('content')
<?php $g1=1; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard (Voting Page)') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as User!') }}
                    <br>
                    <a href="#" class="btn btn-outline-primary btn-lg" role="button" aria-pressed="true">Developed by Usama Amir</a>
                    
                    <br>
                    <form action="{{route('voter.store')}}" method="post">
                    @csrf
                        <br>
                        <div class="form-group">
                            <label for="name">Name of Voter:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="special_id">Enter your Unique ID:</label>
                            <input type="text" class="form-control" id="special_id" name="special_id" placeholder="Enter your ID">
                        </div>

                        <div class="form-group">
                            <label for="vote_counter">Vote Counter: </label>
                            <input type="text" class="form-control" id="vote_counter" name="vote_counter" value="<?php echo $g1; ?>" readonly>
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

                        <div class="form-group">
                            <label for="nominee">Nominee name: &nbsp;</label>
                            <select id="dropdown" name="nominee" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"> 
                                @foreach($nominees as $nominee)
                                <option value="{{$nominee->id}}"> 
                                {{$nominee->name}} 
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
