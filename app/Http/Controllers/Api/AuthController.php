<?php

namespace App\Http\Controllers\Api;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class AuthController extends Controller
{

    public function register(Request $request){
        $ValidateDate = $request ->validate(['role_id' => ['required', 'numeric'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],]);
            $ValidateDate['password']=bcrypt($request->password);
            
            $user = User::create($ValidateDate);
            $accessToken=$user->createToken('authToken')->accessToken;
            //  return response('user' -> $user);
            return response()->json(['user'=>$user,'acessToken'=>$accessToken]);
            // return array('user'->$user,'accessToken'->$accessToken);
        
    }
    public function login(Request $request){
        $LoginDate = $request ->validate([
            'email' => [ 'max:255','email',"required"],
            'password' => ['required', 'min:8'],]);
        // $uLoginDate = $request ->validate([
        //     'username' => ['required', 'max:255'],
        //     'password' => ['required', 'min:8'],]);
            // dump($LoginDate);
            // dump($uLoginDate);
            // exit();
            if (!auth() ->attempt($LoginDate)){
                return response(['message'=>"Invalid credentials"]);
            }
            $accessToken=auth()->user()->createToken('authToken')->accessToken; 
            return response()->json(['user'=>auth()->user(),'acessToken'=>$accessToken]);
            
    }
    public function logout(Request $request)
    {
      if (Auth::user()) {
        $user = Auth::user()->token();
        $user->revoke();

        return response()->json([
          'success' => true,
          'message' => 'Logout successfully'
      ]);
      }else {
        return response()->json([
          'success' => false,
          'message' => 'Unable to Logout'
        ]);
      }
     }

    public function username(){
        $loginType  = request()->input('username');
        $this->username = filter_var($loginType, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$this->username=>$loginType]);
        return property_exists($this, 'username') ? $this->username : 'email';
    }

   
}
