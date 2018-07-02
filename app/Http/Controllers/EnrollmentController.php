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
                
                $users = User::with('courses')->orderBy('student_name')->get();
                return view('admin/course/enroll',['users' =>$users]);                       
        }else{
            $user = Auth::user();
            $idStudent = Auth::user()->id;
            $student = User::find($idStudent);
 
            return view('user/student/enroll',['student' =>$student]);
        }
    }

    public function list($idC)
    {
        $idStudent = Auth::user()->id;

        $student = User::find($idStudent);

        $course = Course::find($idC);


        if($student->courses->contains($course)){
            \Session::flash('erro', 'You are already enrolled in this course!');

            return redirect('/course');
        }else{
            \Session::flash('success', 'Registration made. You must wait the administrator acept your enrollment. ');
            $student->courses()->attach($idC);

            return redirect('/course');
        }
    }

    public function authorized($idU,$idC){
        
        $course = Course::find($idC);

        $user = User::find($idU)->courses()->updateExistingPivot($idC,['authorized' => 1]);
        \Session::flash('success', 'The student enrollment was approved!');

        return redirect('/enroll');
    }

    public function list2($id)
    {
        $student = User::find($id);

        $course = Course::paginate(1);

        return view('admin/student/enrollStudent',['students' =>$student], ['course' =>$course]);
    }

    public function list3($idStudent,$idC)
    {
        $student = User::find($idStudent);
        $course = Course::find($idC);

        if($student->courses->contains($course)){
            \Session::flash('erro', 'You are already enrolled in this course!');

            return redirect('/user');
        }else{
            \Session::flash('success', 'Registration made.');
            $student->courses()->attach($idC);

            $user = User::find($idStudent)->courses()->updateExistingPivot($idC,['authorized' => 1]);
            return redirect('/user');
        }


        return view('/home');
    }

    public function destroy ($idStudent,$idC){
        
        $student = User::find($idStudent);
        $course = Course::find($idC);

        $student->courses()->detach($idC);

        \Session::flash('success', 'The enrollment has been deleted. ');

        return redirect('/user');


    }


}