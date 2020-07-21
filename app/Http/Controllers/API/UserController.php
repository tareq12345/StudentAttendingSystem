<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
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
}