<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
    
class EnrollmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if($user->admin){

                $student = DB::table('course_user')->get();
     
                return view('admin/course/enroll',['student' =>$student]);
      
        }else{
            $user = Auth::user();
            $idStudent = Auth::user()->id;
            $student = User::find($idStudent);
 
            return view('user/student/enroll',['student' =>$student]);
        }
    }

    public function List($idC)
    {
        $idStudent = Auth::user()->id;

        $student = User::find($idStudent);

        $course = Course::find($idC);


        //dd($student->courses);


        $student->courses()->attach($idC);

        //$enrol;
       // $enrol->course->attach(2,$id);


        return view('user/student/enrollment',['student' =>$student]);
    }

    public function validate($id){

        $user = User::findOrFail($id);

        if ($user->admin==true){
            \Session::flash('error', 'Error. The user already an administrator!');
            return redirect('/student');


        }else{
            $user->admin = true;
            $user->save();
            \Session::flash('status', 'Success. The user became an administrator! :)');
            return redirect('/student');
        }
    }


}