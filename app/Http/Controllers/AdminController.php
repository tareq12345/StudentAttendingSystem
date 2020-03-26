<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Student;
use App\Professor;
use App\Course;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function admins()
    {
        if (auth()->user()->role_id != 1) {
            return response()->view('errors.403');
        }
        $admin = Admin::all();
        // return view('professor.courses')->with('courses',$userable['courses']);
            return view('admin.admins')->with('admins',$admin);

    }

    public function professors()
    {
        if (auth()->user()->role_id != 1) {
            return response()->view('errors.403');
        }
        $professor = Professor::all();
        // return view('professor.courses')->with('courses',$userable['courses']);
            return view('admin.professors')->with('professors',$professor);

    }

    public function courses()
    {
        if (auth()->user()->role_id != 1) {
            return response()->view('errors.403');
        }
        $course = Course::all();
        // return view('professor.courses')->with('courses',$userable['courses']);
            return view('admin.courses')->with('courses',$course);

    }


    public function index()
    {
        if (auth()->user()->role_id != 1) {
            return response()->view('errors.403');
        }
        $user = Student::all();
        // return view('professor.courses')->with('courses',$userable['courses']);
            return view('admin.students')->with('students',$user);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role_id != 1) {
            return response()->view('errors.403');
        }
        $user = Professor::all();
        // return view('professor.courses')->with('courses',$userable['courses']);
            return view('admin.create_courses');

    }

    // public function createStudent()
    // {
    //     if (auth()->user()->role_id != 1) {
    //         return response()->view('errors.403');
    //     }
    //     $user = Professor::all();
    //     // return view('professor.courses')->with('courses',$userable['courses']);
    //         return view('admin.create_students');

    // }


    public function createProfessor()
    {
        if (auth()->user()->role_id != 1) {
            return response()->view('errors.403');
        }
        $user = Professor::all();
        // return view('professor.courses')->with('courses',$userable['courses']);
            return view('admin.create_professors');

    }

    public function createAdmin()
    {
        if (auth()->user()->role_id != 1) {
            return response()->view('errors.403');
        }
        $user = Professor::all();
        // return view('professor.courses')->with('courses',$userable['courses']);
            return view('admin.create_admins');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'course_name' => 'required',
            'course_level' => 'required',
            'course_dept' => 'required',
        ]);

        // Create course
        $course = new Course;
        $course->course_name = $request->input('course_name');
        $course->level_id = $request->input('course_level');
        $course->department_id = $request->input('course_dept');
        $course->save();
        return redirect('/courses')->with('success','Course Created');
        // return $request->input('course_dat');
    }

    //  /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function storeStudent(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'cover_image' => 'image|nullable|max:1999',
    //         'gender' => 'required',
    //         'adress' => 'required',
    //     ]);

    //     // Create student
    //     $student = new Student;
    //     $student->date_of_birth = $request->input('date_of_birth');
    //     $student->adress = $request->input('adress');;
    //     $student->level_id = '1';
    //     $student->department_id = '1';
    //     $student->save();
        
    //     $role_id = 3;
    //     $userable_type = 'App\Student' ;
    //     User::create([
    //         'name' => $request['name'],
    //         'email' => $request['email'],
    //         'password' => Hash::make($data['password']),
    //         'cover_image' => $fileImageToStore,
    //         'gender' => $request->get('gender'),
    //         'role_id' => $role_id,
    //         'userable_id' => $student->id,
    //         'userable_type' => $userable_type
    //     ]);

       
    //     return redirect('/home')->with('success','Student Created');
    //     // return $request->input('course_dat');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($courseId)
    {
        //
    }

    public function assignCourse(Request $request,$course_id){
        $this->validate($request, [
            'student_email' => 'nullable|string|email|max:255|',
            'professor_email' => ['nullable', 'string', 'email', 'max:255', ],
        ]);

        if($request->get('student_email') == '' && $request->get('professor_email') == ''){
            $course = Course::all();
            return redirect('/courses')->with('courses',$course);
        }

        elseif($request->get('student_email') != '' && $request->get('professor_email') == ''){
            // assign course to student.
            
            $user = User::where('email', '=', $request->get('student_email'))->first();
            if(!$user || $user->role_id != 3) {
                // handle the case if no user is found
                return redirect('/courses')->with('courses',$course)->with('error','Student not found');
              }
            $userable = $user['userable'];
            $userable->courses()->attach($course_id);  
            $course = Course::all();
            return redirect('/courses')->with('courses',$course)->with('success','Course Assigned');
        }
        elseif($request->get('professor_email') != '' && $request->get('student_email') == ''){
            // assign course to professor
            $user = User::where('email', '=', $request->get('professor_email'))->first();
            if(!$user || $user->role_id != 2) {
                // handle the case if no user is found
                return redirect('/courses')->with('courses',$course)->with('error','Professot not found');
              }
            $userable = $user['userable'];
            $userable->courses()->attach($course_id); 
            $course = Course::all();
            return redirect('/courses')->with('courses',$course)->with('success','Course Assigned'); 
        }
        else{
            // assign course to student and professor
            
            $student = User::where('email', '=', $request->get('student_email'))->first();
            $professor = User::where('email', '=', $request->get('professor_email'))->first();

            if(!$student || $student->role_id != 3) {
                // handle the case if no user is found
                return redirect('/courses')->with('courses',$course)->with('error','Student not found');
              }
            if(!$professor || $professor->role_id != 2) {
                // handle the case if no user is found
                return redirect('/courses')->with('courses',$course)->with('error','Peofessor not found');
              }
            $userable = $student['userable'];
            $userable->courses()->attach($course_id);  

            $userable = $professor['userable'];
            $userable->courses()->attach($course_id);  

            $course = Course::all();
            return view('admin.courses')->with('courses',$course)->with('success','Course Assigned');
        }
    }
}
