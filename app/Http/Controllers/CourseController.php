<?php

namespace App\Http\Controllers;

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
            echo'vc nao é um adm';            
        }
        

        
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