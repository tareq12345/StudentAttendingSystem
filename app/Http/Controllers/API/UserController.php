<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User;
use Illuminate\Support\Facades\Hash;
// use App\Student; 
use Illuminate\Support\Facades\Auth; 
use Response;
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
                
            
            return Response::json($success, 200);
        } 
        else{ 
            $success['message'] = false;
            $success['data'] = ['scalar'=>'البريد الالكتروني او كلمة السر غير صحيحة'];
            return Response::json($success, 200);
        } 
    }

    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json([$user], $this-> successStatus); 
    } 

    public function show(Request $request)
    {
        // return User::find($id);
        $id = $request->input("userid");
        $user = User::Find($id); 
        if ($user){
            $success['message'] = true;
            $success['data'] = $user;
            $userable = $user['userable'];
            $success['data']['date_of_birth'] = $user['userable']->date_of_birth;
            return Response::json($success, 200);
        }
        else{
            $success['message'] = false;
            $success['data'] = ['scalar'=>'المستخدم غير موجود'];
            return Response::json($success, 200);
        } 
    }

    public function update(Request $request)
    {
        
        $user = User::find($request->get("userid"));
        if($user){
            $user->name = $request->name;
            $user->email = $request->email;
            $userable = $user['userable'];
            $userable->date_of_birth = $request->get('date_of_birth');
            $userable->save();
            $user->save();
            $success['message'] = true;
            $success['data'] = $user;
            return Response::json($success, 200);
        }
        else{
            $success['message'] = false;
            $success['data'] = ['scalar'=>'المستخدم غير موجود'];
            return Response::json($success, 200);
        }
    }

    public function changePassword(Request $request){
        $user = User::find($request->get("userid"));
        if($user){
            // $success["data"] = $user;
            // return response()->json([$success], $this->successStatus); 
            if(Hash::check($request->input('old_password'), $user->password)){
                $user->password = Hash::make($request->input('new_password'));
                $user->save();
                $success['message'] = true;
                $success['data'] = ['scalar'=>'تم تغير كلمة السر'];
                return Response::json($success, 200);
            }
            else{
                $success['message'] = false;
                $success['data'] = ['scalar'=>'كلمة السر غير صحيحة'];
                return Response::json($success, 200);
            }
        }
        else{
            $success['message'] = false;
            $success['data'] = ['scalar'=>'المستخدم غير موجود'];
            return Response::json($success, 200);
        }
    }
}