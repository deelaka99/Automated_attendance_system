<table class="table table-dark">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Register no</th>
                                <th>Speciality</th>
                                <th>Operations</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr style="text-align:center">
                                <td>{{$student->id}}</td>
                                <td>{{$student->f_name}}</td>
                                <td>{{$student->l_name}}</td>
                                <td>{{$student->reg_no}}</td>
                                <td>{{$student->speciality}}</td>
                                <td>
                                    <a href="{{url('admin/student/edit/'.$student->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{url('admin/student/delete/'.$student->id)}}" class="btn btn-sm btn-warning">Delete</a>
                                </td>
                                <td>
                                    @if($student->activate_or_not)
                                        <a href="{{url('admin/student/status/'.$student->id)}}" class="btn btn-sm btn-danger">Deactivate</a>
                                    @else
                                        <a href="{{url('admin/student/status/'.$student->id)}}" class="btn btn-sm btn-success">Activate</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>