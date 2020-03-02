<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        // return view('pages.index',compact('title'));
        return view('professor.professor')->with('title',$title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::find($id);
        return view('users.profile')->with('user',$user);;
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
        // find data
        $user = User::find($id);
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email',
            'password'  => 'confirmed',
            'cover_image' => 'image|nullable|max:1999'
        ]);

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
        if($request->get('password') !== ''){
            $user->password = $request->get('password');
        }

        if($request->hasFile('cover_image')){
            $user->cover_image = $fileImageToStore;
        }
        
        $user->save();

        return redirect('/home')->with('success','Updated Profile Successfully');
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
