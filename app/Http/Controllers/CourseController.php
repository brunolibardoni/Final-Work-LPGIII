<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
    
class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $course = Course::paginate(1);
        

        if ($user->admin) {
            return view('admin/course/index' ,['course'=>$course]);
        }else{
            return view('user/student/index' ,['course'=>$course]);
        }
        

        
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

    public function store(Request $request) 
    {
        $p = new course;
        $p->course_name = $request->input('course_name');
        $p->menu = $request->input('menu');
        $p->maximum = $request->input('maximum');
        
        if ($p->save()) {
            \Session::flash('status', 'Curso criado com sucesso.');
            return redirect('/course');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao criar o Curso.');
            return view('course.new');
        }
    }


}