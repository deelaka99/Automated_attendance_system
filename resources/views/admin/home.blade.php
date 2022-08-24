@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as admin!
                </div>
            </div>
        </div>
    </div>
    <div class="row" >
            <div class="container">
                <div class="text-center">
                    <h1>Daily Tasks</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="task" class="form-control" placeholder="Enter the task">
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
