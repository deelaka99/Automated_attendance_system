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
                    <h1>Insert Students</h1>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="card">
                            @foreach($errors->all() as $error)
                                <div class="alert-danger" role="alert">
                                    {{$error}}
                                </div>
                            @endforeach
                            <form action="/storeStudents" method="post" class="form">
                            {!! csrf_field() !!}
                                <input type="text" name="fname" class="form-control" placeholder="Enter the First Name">
                                <br>
                                <input type="text" name="lname" class="form-control" placeholder="Enter the Last Name">
                                <br> 
                                <input type="text" name="regno" class="form-control" placeholder="Enter the Registration no">
                                <br> 
                                <input type="text" name="speciality" class="form-control" placeholder="Enter the speciality">
                                <br> 
                            
                                <input type="submit" value="Save" class="btn btn-primary">
                                <input type="button" value="Clear" class="btn btn-warning">
                            </form>
                            <br><br><br>

                            <table class="table table-dark table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Reg.No</th>
                                    <th>Speciality</th>
                                    <th>Operations</th>
                                </tr>
                                
                                @foreach($students as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->f_name}}</td>
                                    <td>{{$student->l_name}}</td>
                                    <td>{{$student->reg_no}}</td>
                                    <td>{{$student->speciality}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
