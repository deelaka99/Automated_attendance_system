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
        @if($layout == 'index')
            <div class="container-fluid">
                <div class="row">
                    <section class="col">
                        <div>
                            <h1 style="text-align:center">Student list</h1>
                        </div>
                        <br>
                        @include('admin/studentlist')
                    </section>
                    <section class="col"></section>
                </div>
            </div>
        @elseif($layout == 'create')
            <div class="container-fluid">
                <div class="row">
                    <div>
                        <h1 style="text-align:center">Student list</h1>
                    </div>
                    <br>
                    <section class="col-md-7 ">
                        @include('admin/studentlist')
                    </section>
                    <section class="col-md-5 ">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 style="text-align: center;">Create a Student</h3>
                                <p style="text-align:center">Enter the details of the new student</p>
                            </div>
                            <div class="panel-body">
                                <div>
                                    @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{$error}}
                                    </div>
                                    @endforeach
                                </div>
                                <form action="{{url('admin/student/store')}}" method="post">
                                {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label>First Name </label>
                                        <input type="text" name="fname" class="form-control" placeholder="Enter your first name">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name </label>
                                        <input type="text" name="lname" class="form-control" placeholder="Enter your last name">
                                    </div>
                                    <div class="form-group">
                                        <label>Registration no </label>
                                        <input type="text" name="regno" class="form-control" placeholder="Enter your registration no">
                                    </div>
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="text" name="email" class="form-control" placeholder="Enter your email adress">
                                    </div>
                                    <div class="form-group">
                                        <label>Speciality </label>
                                        <input type="text" name="speciality" class="form-control" placeholder="Enter your speciality">
                                    </div>
                                    <div class="form-group">
                                        <label>Password </label>
                                        <input type="password" name="pw" class="form-control" placeholder="Enter your new password">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password </label>
                                        <input type="password" name="cpw" class="form-control" placeholder="Enter your new confirm password">
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="Save">
                                    <input type="button" class="btn btn-warning" value="Reset">
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        @elseif($layout == 'show')
        @elseif($layout == 'edit')
            <div class="container-fluid">
                <div class="row">
                        <div>
                            <h1 style="text-align:center">Edit Students</h1>
                        </div>
                        <br>
                    <section class="col-md-7 ">
                        @include('admin/studentlist')
                    </section>
                    <section class="col-md-5 ">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 style="text-align: center;">Edit Student</h3>
                                <p style="text-align:center">Enter the details of the student</p>
                            </div>
                            <div class="panel-body">
                                <div>
                                    @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{$error}}
                                    </div>
                                    @endforeach
                                </div>
                                <form action="{{url('admin/student/update/'.$student->id)}}" method="post">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                        <label>First Name </label>
                                        <input type="text" name="fname" class="form-control" placeholder="Enter your first name">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name </label>
                                        <input type="text" name="lname" class="form-control" placeholder="Enter your last name">
                                    </div>
                                    <div class="form-group">
                                        <label>Registration no </label>
                                        <input type="text" name="regno" class="form-control" placeholder="Enter your registration no">
                                    </div>
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="text" name="email" class="form-control" placeholder="Enter your email adress">
                                    </div>
                                    <div class="form-group">
                                        <label>Speciality </label>
                                        <input type="text" name="speciality" class="form-control" placeholder="Enter your speciality">
                                    </div>
                                    <div class="form-group">
                                        <label>Password </label>
                                        <input type="password" name="pw" class="form-control" placeholder="Enter your new password">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password </label>
                                        <input type="password" name="cpw" class="form-control" placeholder="Enter your new confirm password">
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Update">
                                    <input type="button" class="btn btn-warning" value="Reset">
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        @endif
    </div>      
</div>
@endsection