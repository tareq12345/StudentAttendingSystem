<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Professor;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cover_image' => 'image|nullable|max:1999',
            'gender' => 'required',
            'role_id' => 'nullable',
            'userable_id' => 'nullable'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $request = request();
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
        else {
            $fileImageToStore = 'noimage.jpg';
        }
        
        $professor = new Professor;
        $professor->date_of_birth = '2020-03-8';
        $professor->qualification = 'Phd';
        $professor->save();

        $userable_type = 'App\Professor' ;

        if($request->get('role_id') == ''){
            $role_id = 2;
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'cover_image' => $fileImageToStore,
            'gender' => $request->get('gender'),
            'role_id' => $role_id,
            'userable_id' => $professor->id,
            'userable_type' => $userable_type
        ]);
    }
}
