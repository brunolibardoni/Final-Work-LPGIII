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
            \Session::flash('status', 'Success.Course was created.');
            return redirect('/course');
        } else {
            \Session::flash('status', 'Error.Course was not created.');
            return view('course.new');
        }
    }

    public function update(Request $request, $id) {
        $course = Course::findOrFail($id);

        $course->course_name = $request->input('course_name');
        $course->menu = $request->input('menu');
        $course->maximum = $request->input('maximum');
        
        if ($course->save()) {
            \Session::flash('success', 'Success.Course has been updated.');
            return redirect('/course');
        } else {
            \Session::flash('erro', 'Error. Error to update the course.');
            return view('admin/course.index', ['course' => $course]);
        }
    }

    public function edit($id) {
        $course = Course::findOrFail($id);


        return view('admin/course/edit', ['course' => $course]);
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        \Session::flash('success', 'Success. The course was removed!');
        return redirect('/course');
    }

}