<?php

namespace App\Http\Controllers;

use App\Course;
use App\Level;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.courses.index')->with('courses', Course::all())->with('departments', Department::all())->with('levels',Level::all());;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        // $request->validate([
        //     "name" => "required|unique:courses",
        //     "level_id" => "required:courses",
        //     "department_id" => "required:courses",
        //     "qrcode" => "required|unique:courses",
        //     "coursedate" => "required:courses"
        // ]);

        Course::create([
            "course_name" => $request->name,
            "level_id" => $request->levelID,
            "department_id" => $request->departmentID
        ]);

        session()->flash('success', 'Course was added');

        return redirect(route('courses.index'));
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
    public function edit(Course $course)
    {
        return view('admin.courses.create')->with('course', $course)->with('departments', Department::all())->with('levels',Level::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $course->update([
            "course_name" => $request->course_name,
            "level_id" => $request->levelID,
            "department_id" => $request->departmentID

         ]);

         session()->flash('success', 'Course was updated');

         return redirect(route('course.index'));
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

    public function deleteCourses(Request $request)
    {
        $delid = [$request->input('delid')];
        Course::whereIn('id', $delid)->delete();

        session()->flash('danger', 'Selected courses were deleted');

        return redirect(route('course.index'));
    }

    public function attendance($course_name)
    {
        // if course name equal the course name in the database
        // put the student attendance with student id and level and all the pther shit
    }

}
