@extends('layouts.app')

@section('content')
<?php $gg = 0; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard (Read Nominee Page)') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as admin!') }}
                    <br>
                    <a href="http://localhost/e-voting/public/vadmin" class="btn btn-outline-primary btn-lg" role="button" aria-pressed="true">Move to main Admin Panel</a>
                    <a href="http://localhost/e-voting/public/nominee/nominee" class="btn btn-outline-primary btn-lg " role="button" aria-pressed="true">Create Nominee</a>
                    <br><br>
                    
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name of Nominee</th>
                            <th scope="col">Name of Election</th>
                            <th scope="col">Name of Position</th>
                            <th scope="col">Delete/Update</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($nominees ?? '' as $nominee)
                            <tr>
                            <th scope="row"><?php $gg = $gg+1; ?><?php echo $gg; ?></th>
                            <td>{{$nominee->name}}</td>
                            <td>{{$nominee->election->name}}</td>
                            <td>{{$nominee->position->name}}</td>
                            <td>
                                <a href="{{URL::to('nominee/update-nominee', $nominee->id)}}" title="Edit -> {{$nominee->name}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"> Update </a>
                                <a href="{{URL::to('nominee/delete-nominee', $nominee->id)}}" onclick="return confirm ('Are you sure to delete the nominee {{$nominee->name}} having ID {{$nominee->id}}?')" title="Delete -> {{$nominee->name}}"  class="btn btn-primary btn-sm" role="button" aria-pressed="true">DELETE</a>
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