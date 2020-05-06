<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "test";
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
        $student->adress = $request->input('adress');
        $student->level_id = '1';
        $student->department_id = '1';
        $student->save();
        return $student->adress;
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
    }

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
    public function destroy($id)
    {
        //
    }
}
