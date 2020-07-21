<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Level;

use DB;

class LevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.levels.index')->with('levels', Level::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.levels.create');
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
            "level" => "required|unique:levels"
        ]);

        Level::create($request->all());

        // session()->flash('success', 'Level was added');

        return redirect(route('levels.index'));
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
    public function edit(Level $level)
    {
        return view('admin.levels.create')->with('level', $level);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $level->update([
            'level' => $request->level
        ]);

        session()->flash('success', 'Level was updated');

        return redirect(route('levels.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Request $request, Level $level)
    // {
    //     // $ids = $request->ids;
    //     // Level::whereIn('id',explode(",", $ids))->delete();

    //     $level->delete();
    //     // $checked = Request::input('checked',[]);
    //     // foreach ($checked as $id) {
    //     //     Level::where("id", $id)->delete();
    //     // }
    //     // $checked = Request::input('checked', []);
    //     // Level::whereIn("id", $checked)->delete();
    //     // Level::whereIn($checked)->delete();

    //     return redirect(route('levels.index'));
    // }

    public function deleteLevels(Request $request)
    {
        $delid = $request->input('delid');
        Level::whereIn('id', $delid)->delete();

        session()->flash('danger', 'Selected levels were deleted');

        return redirect(route('levels.index'));
    }
}
