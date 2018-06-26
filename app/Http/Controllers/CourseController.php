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


}