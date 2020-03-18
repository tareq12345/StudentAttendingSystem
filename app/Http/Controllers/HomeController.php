<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Course;
use App\Professor;
use App\Student;
use App\Admin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::all();
        $professors = Professor::all();
        $students = Student::all();
        $admins = Admin::all();
        if (auth()->user()->role_id == 2) {
            return view('home');
        }
        elseif(auth()->user()->role_id == 1){
            return view('admin.dashboard')->with('courses',$courses)->with('professors',$professors)->with('admins',$admins)->with('students',$students);
        }
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
    }
}
