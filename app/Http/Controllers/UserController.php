<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Professor;
use App\Student;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Wlecome to Student Attending System Project.";
        return view('professor.professor')->with('title',$title);
        
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
        
        // return view('professor.courses')->with('courses',$userable['courses']);
            return view('admin.create_students');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cover_image' => 'image|nullable|max:1999',
            'gender' => 'required',
            'adress' => 'required',
        ]);

        // Create student
        $student = new Student;
        $student->date_of_birth = $request->input('date_of_birth');
        $student->adress = $request->input('adress');;
        $student->level_id = '1';
        $student->department_id = '1';
        $student->save();
        
        $role_id = 3;
        $userable_type = 'App\Student' ;
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($data['password']),
            'cover_image' => $fileImageToStore,
            'gender' => $request->get('gender'),
            'role_id' => $role_id,
            'userable_id' => $student->id,
            'userable_type' => $userable_type
        ]);

       
        return redirect('/home')->with('success','Student Created');
        // return $request->input('course_dat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.profile')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.profile')->with('user',$user);
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
        $user_id = auth()->user()->id;
        if (auth()->user()->role_id != 2 && auth()->user()->role_id != 1) {
            return response()->view('errors.403');
        }
        // find data
        $user = User::find($id);
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email',
            //'password'  => 'confirmed',
            'cover_image' => 'image|nullable|max:1999',
            'gender' => 'required',
            'qualification' => 'nullable',
            'phone' => 'nullable'
        ]);

        // professor haandle
        if ($user->role_id == 2) {
            $userable = $user['userable'];
            $userable->qualification = $request->get('qualification');
            $userable->save();
        }

        // admin handle
        if (auth()->user()->role_id == 1 && $user->role->role_name == 'Admin') {
            $userable = $user['userable'];
            $userable->phone = $request->get('phone');
            $userable->save();
        }

        // File handle
        if($request->hasFile('cover_image')){
            // Get file name with extenstion
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // get just filename
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            // get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileImageToStore = $filename.'_'.time().'.'.$extension;
            // upload image
            $path = $request->file('cover_image')->storeAs('public/cover_image',$fileImageToStore);
        }

        $user->name     = $request->get('name');
        $user->email    = $request->get('email');
        $user->gender   = $request->get('gender');

        // if($request->get('password') !== ''){
        //     $user->password = $request->get('password');
        // }

        if($request->hasFile('cover_image')){
            $user->cover_image = $fileImageToStore;
        }
        
        $user->save();

        return redirect('/home')->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
