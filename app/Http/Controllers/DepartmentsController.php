<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.departments.index')->with('departments', Department::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "department" => "required|unique:departments"
        ]);

        Department::create($request->all());

        session()->flash('success', 'Department was added');

        return redirect(route('departments.index'));
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
    public function edit(Department $department)
    {
        return view('admin.departments.create')->with('department', $department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $department->update([
            'department' => $request->department
        ]);

        session()->flash('success', 'Department was updated');

        return redirect(route('departments.index'));
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

    public function deleteDepartments(Request $request)
    {
        $delid = $request->input('delid');
        Department::whereIn('id', $delid)->delete();

        session()->flash('danger', 'Selected departments were deleted');

        return redirect(route('departments.index'));
    }
}
