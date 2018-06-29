<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
    
class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $student = User::paginate(3);

        if ($user->admin) {
            return view('admin/student/index' ,['student'=>$student]);

        }else if (($user->admin)==0){
            
            $course = Course::paginate(1);

            \Session::flash('status', 'You do not have permission to access Student');
            return view('user/student/index' ,['course'=>$course]);
        }
    }

    public function updateAdmin($id)
    {
        $user = User::findOrFail($id);

        $student = User::paginate(3);


        $user->admin = false;
        $user->save();

        \Session::flash('status', 'Success. The user became an administrator!');
        return view('admin/student/index' ,['student'=>$student]);

        

    }

}