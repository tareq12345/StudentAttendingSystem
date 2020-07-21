<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDoList;

class ToDosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = ToDoList::orderBy('created_at','desc')->paginate(10);
        return view('todos.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // VALIDATE
        $this->validate($request,[
            'title' => 'required'
        ]);
        // SAVE DATA IN NEW TODO OBJECT
        $todo = new ToDoList;
        $todo->name = $request->input('title');
        $todo->user_id = auth()->user()->id;
        $todo->status_id = 2;
        $todo->save();
        return redirect('/home')->with('success','Post Created');
        // SAVE
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
        $todo = ToDOList::find($id);
        return view('todos.edit')->with('post',$todo);
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
        $todo = ToDoList::find($id);
        $this->validate($request,[
            'title' => 'required',
            'status' => 'required'
        ]);
        $todo->name = $request->input('title');
        $todo->status_id = $request->input('status');
        $todo->save();
        return redirect('/home')->with('success','Edited Post Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = ToDoList::find($id);
        $todo->delete();
        return redirect('/home')->with('success','Post Removed');
    }
}
