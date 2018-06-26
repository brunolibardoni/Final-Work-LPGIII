<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
    
class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::paginate(3);

        return view('student/index' ,['student'=>$user]);
    }


}