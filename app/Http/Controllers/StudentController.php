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

    public function updateUser($id)
    {
        $user = User::findOrFail($id);

        $student = User::paginate(3);

        if ($user->admin == false){
            \Session::flash('error', 'Error. The user already an User!');
            return redirect('/student');


        }else{
            $user->admin = false;
            $user->save();
            \Session::flash('status', 'Success. The administrator became an User! :(');
            return redirect('/student');
        }
    }

    public function destroy($id)
    {
        $student = User::findOrFail($id);

        if($student->admin == true){
            \Session::flash('error', 'Error. You can not remove an administrator!');
            return redirect('/student');       
         }else{ 

        $student->delete();

        \Session::flash('status', 'Success. The student was removed!');
        return redirect('/student');
        }
    }
}