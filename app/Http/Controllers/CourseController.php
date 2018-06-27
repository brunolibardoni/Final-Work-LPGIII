<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
    
class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $course = Course::paginate(1);

        return view('course/index' ,['course'=>$course]);
    }

    public function create()
    {
        return view('course/new');

    
    }

    public function store(Request $request) 
    {
        $p = new course;
        $p->course_name = $request->input('course_name');
        $p->menu = $request->input('menu');
        $p->maximum = $request->input('maximum');
        
        if ($p->save()) {
            \Session::flash('status', 'Cidade criado com sucesso.');
            return redirect('/course');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao criar o Cidade.');
            return view('course.new');
        }
    }


}