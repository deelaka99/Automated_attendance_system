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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 style="text-align: center;">Student Management</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-8 col-md-offset-2">
                    <div class="d-flex align-items-center ">
                        <a href="{{url('admin/student/index')}}" class="btn btn-primary">View Student list</a>
                        <a href="{{url('admin/student/create')}}" class="btn btn-warning">Create a student account</a>
                        <a href="{{url('admin/student/addqrcode')}}" class="btn btn-danger">Create a QR code</a>
                        <a href="{{url('admin/student/attendance')}}" class="btn btn-success">View attendance</a>
                    </div>
                </div>
            </div>
        </div>
    </div>      
</div>
@endsection
