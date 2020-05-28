<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\HasApiTokens;
use Auth;

class AuthController extends Controller
{

  public function register(Request $request){
    $rules = [
      'role_id' => 'required|numeric',
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'username' => 'required|string|max:255|unique:users',
      'email' => 'required|string|email|unique:users',
      'password' => 'required|string|min:8'
    ]; 
    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 400);
    }

    $data = $request->all();
    $data['password'] = bcrypt($request->password);
    $user = User::create($data);
    $accessToken = $user->createToken('authToken')->accessToken;
         
    return response()->json(['user'=>$user,'acessToken'=>$accessToken], 201);
  }

  public function login(Request $request){
    $rules = [
      'email' => 'required|email',
      'password' => 'required|string|min:8'
    ]; 
    
    $validator = Validator::make($request->all(), $rules);
    
    if ($validator->fails()) {
      return response()->json($validator->errors(), 400);
    }
    if (!auth()->attempt($request->all())){
        return response(['message' => "Invalid credentials"], 401);
    }

    $accessToken = auth()->user()->createToken('authToken')->accessToken; 
    return response()->json(['user' => auth()->user(), 'acessToken' => $accessToken], 200);     
  }

  public function logout(Request $request){
    if (Auth::check()) {
      Auth::user()->AauthAcessToken()->delete();
      return response()->json(['message' => 'Logout successfull'], 200);
    }
    // dd('here');
    // if (Auth::check()) {
      
    //   $user = Auth::user()->token();
      
    //   $user->revoke();
      
    //   return response()->json([
    //     'message' => 'Logout successfully'
    //   ], 200);
    // }
    // else {
    //   return response()->json([
    //     'message' => 'Unable to Logout'
    //   ], 401);
    // }
  }

    public function username(){
        $loginType  = request()->input('username');
        $this->username = filter_var($loginType, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$this->username=>$loginType]);
        return property_exists($this, 'username') ? $this->username : 'email';
    }

   public function user(Request $request){
     return response()->json($request->user());
   }
}
