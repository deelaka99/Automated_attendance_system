<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('admin.student',['students'=>$students,'layout'=>'index']);
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        return view('admin.student',['students'=>$students,'layout'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
             'fname' => 'required|string|max:100',
             'lname' => 'required|string|max:100',
             'regno' => 'required|string|max:10|min:9',
             'speciality' => 'required|string|max:25',
             'email' => 'required|string|email|max:100',
             'pw' => 'required|string|max:10|min:6',
             'cpw' => 'required|string|max:10|min:6',
        ]);
        
        $student = new Student();
        
        $student->f_name = $request->input('fname');
        $student->l_name = $request->input('lname');
        $student->reg_no = $request->input('regno');
        $student->speciality = $request->input('speciality');
        $student->email = $request->input('email');
        $student->password = Hash::make($request->input('pw'));

        //dd($request->all());
        $student->save();
        return view('admin.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student=Student::find($id);
        $students=Student::all();
        return view('admin.student',['students'=>$students,'student'=>$student,'layout'=>'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=Student::find($id);
        $students=Student::all();
        return view('admin.student',['students'=>$students,'student'=>$student,'layout'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'fname' => 'required|string|max:100',
            'lname' => 'required|string|max:100',
            'regno' => 'required|string|max:10|min:9',
            'speciality' => 'required|string|max:25',
            'email' => 'required|string|email|max:100',
            'pw' => 'required|string|max:10|min:6',
            'cpw' => 'required|string|max:10|min:6',
       ]);

        $student=Student::find($id);
        $student->f_name = $request->input('fname');
        $student->l_name = $request->input('lname');
        $student->reg_no = $request->input('regno');
        $student->speciality = $request->input('speciality');
        $student->email = $request->input('email');
        $student->password = Hash::make($request->input('pw'));
        $student->save();
        return view('admin.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=Student::find($id);
        $student->delete();
        return view('admin.home');
    }

    public function updatestatus($id){
        $student=Student::find($id);
        if($student->activate_or_not){
            $student->activate_or_not = false;
        }else{
            $student->activate_or_not = true;
        }
        $student->save();
        return view('admin.home');

    }
}
