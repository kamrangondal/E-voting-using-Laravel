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
                    <br>
                    <a href="http://localhost/e-voting/public/vadmin" class="btn btn-outline-primary btn-lg" role="button" aria-pressed="true">Move to main Admin Panel</a>
                    <br><br>
                    <h3 style="text-align: center">Mailer</h3>
                    

                    <form action="{{ route('send.email') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <br>
                        <div class="form-group">
                            <label for="email">To (Receipt Email):</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" required>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" required>
                        </div>

                        <div class="form-group">
                            <label for="content1">Content: </label>
                            <textarea class="form-control" id="content1" name="content1" rows="3" required></textarea>
                        </div><br>

                        <div class="form-group">
                            <label for="attachment">file input</label>
                            <input type="file" class="form-control-file" id="attachment" name="attachment">
                        </div><br>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
