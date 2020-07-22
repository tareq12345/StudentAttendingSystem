<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User;
// use App\Student; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class UserController extends Controller 
{
public $successStatus = 200;
/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            // $success['token'] =  $user->createToken('MyApp')->accessToken; 
            if ($this->successStatus == 200){
                $success['message'] = true;
                $success['data'] = $user;
            }
                
            
            return response()->json([$success], $this-> successStatus); 
        } 
        else{ 
            $success['message'] = false;
            $success['data'] = "";
            return response()->json([$success], $this-> successStatus);
        } 
    }

    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json([$user], $this-> successStatus); 
    } 

    public function show($id)
    {
        // return User::find($id);
        $user = User::FindOrFail($id); 
        return response()->json([$user], $this->successStatus); 
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cover_image = $request->cover_image;
        $user->gender = $request->gender;
        $user->save();

        return response()->json([$user], $this->successStatus); 
    }
}