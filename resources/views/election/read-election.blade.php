@extends('layouts.app')

@section('content')
<?php $gg = 0; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard (Read Election Page)') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as admin!') }}
                    <br>
                    <a href="http://localhost/e-voting/public/vadmin" class="btn btn-outline-primary btn-lg" role="button" aria-pressed="true">Move to main Admin Panel</a>
                    <a href="http://localhost/e-voting/public/election/election" class="btn btn-outline-primary btn-lg " role="button" aria-pressed="true">Create Elections</a>
                    <br><br>
                    
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Status</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Time</th>
                            <th scope="col">Name of Election</th>
                            <th scope="col">Delete/Update</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($elections ?? '' as $election)
                            <tr>
                            <th scope="row"><?php $gg = $gg+1; ?><?php echo $gg; ?></th>
                            <td>{{$election->status}}</td>
                            <td>{{$election->start}}</td>
                            <td>{{$election->end}}</td>
                            <td>{{$election->name}}</td>
                            <td>
                                <a href="{{URL::to('election/update-election', $election->id)}}" title="Edit -> {{$election->name}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"> Update </a>
                                <a href="{{URL::to('election/delete-election', $election->id)}}" onclick="return confirm ('Are you sure to delete the election {{$election->name}} having ID {{$election->id}}?')" title="Delete -> {{$election->name}}"  class="btn btn-primary btn-sm" role="button" aria-pressed="true">DELETE</a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection