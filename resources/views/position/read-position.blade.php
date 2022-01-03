@extends('layouts.app')

@section('content')
<?php $gg = 0; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard (Read Position Page)') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as admin!') }}
                    <br>
                    <a href="http://localhost/e-voting/public/vadmin" class="btn btn-outline-primary btn-lg" role="button" aria-pressed="true">Move to main Admin Panel</a>
                    <a href="http://localhost/e-voting/public/position/position" class="btn btn-outline-primary btn-lg " role="button" aria-pressed="true">Create Position</a>
                    <br><br>
                    
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name of Postion</th>
                            <th scope="col">Name of Election</th>
                            <th scope="col">Delete/Update</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($positions ?? '' as $position)
                            <tr>
                            <th scope="row"><?php $gg = $gg+1; ?><?php echo $gg; ?></th>
                            <td>{{$position->name}}</td>
                            <td>{{$position->election->name}}</td>
                            <td>
                                <a href="{{URL::to('position/update-position', $position->id)}}" title="Edit -> {{$position->name}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"> Update </a>
                                <a href="{{URL::to('position/delete-position', $position->id)}}" onclick="return confirm ('Are you sure to delete the position {{$position->name}} having ID {{$position->id}}?')" title="Delete -> {{$position->name}}"  class="btn btn-primary btn-sm" role="button" aria-pressed="true">DELETE</a>
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