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

        $course = Course::paginate(1);


        $student = User::find(1);
        
        return view('user/student/enrollment' ,['student'=>$student]);


    }

    public function create()
    {
        $user = Auth::user();

        $course = Course::paginate(1);

        if ($user->admin){
            return view('admin/course/new',['course' =>$course]);
        }else if (($user->admin)==0){
            $course = Course::paginate(1);

            \Session::flash('status', 'You do not have permission to access New Course');

            return view('user/student/index',['course' =>$course]);
        }
    }
}