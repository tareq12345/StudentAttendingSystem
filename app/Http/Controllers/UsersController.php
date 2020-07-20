<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\users\Store;

use App\User;
use App\Role;
use App\Professor;
use App\Student;
use App\Admin;

use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users', $users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestArray = $request->all();
        $requestArray['password'] =  Hash::make($requestArray['password']);
        $requestArray['cover_image'] = 'default.png';
        $requestArray['gender'] = 'male';


        if ($requestArray['role_id'] == '1'){
            // create admin
            $admin = new Admin;
            $admin->phone = 2020-03-8;
            $admin->save();
            $requestArray['userable_id'] = $admin->id;
            $requestArray['userable_type'] = 'App\Admin' ;

            $requestArray['userable_id'] = $admin->id;
        }
        
        else if ($requestArray['role_id'] == 2) {
            // create professor
            $professor = new Professor;
            $professor->date_of_birth = '2020-03-8';
            $professor->qualification = 'Phd';
            $professor->save();
            $requestArray['userable_type'] = 'App\Professor' ;
            $requestArray['userable_id'] = $professor->id;
        }
        User::create($requestArray);

        return redirect(route('users.index'));
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
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deleteUsers(Request $request)
    {
        $delid = $request->input('delid');
        User::whereIn('id', $delid)->delete();

        session()->flash('danger', 'Selected users were deleted');

        return redirect(route('users.index'));
    }
}
