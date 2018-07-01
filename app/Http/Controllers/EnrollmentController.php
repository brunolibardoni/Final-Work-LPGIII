<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use Illuminate\Http\Request;
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

        $idStudent = Auth::user()->id;

        $student = User::find($idStudent);

 
            return view('user/student/enroll',['student' =>$student]);

        


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

}