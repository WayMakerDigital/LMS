<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;

class UserController extends Controller
{
   public function register(Request $request)
   {
   	  //perform validation
      $validator = Validator::make($request->all(), [
        'first_name'=>'required|min:5',
        'last_name'=> 'required|min:5',
         'username'=> 'required',
         'email'=>'required|unique:users|email|max:255',
         'password'=>'required'
]);
      if($validator->fails())
      {
      	return response()->json(['error'=>$validator->errors()], 401);
      }
      $input = $request->all();
      $input['password'] = bcrypt($input['password']);
      $user = User::create($input);
      $success['token'] = $user->createToken('Laravel')->accessToken;
      $success[] = $user;

      return response()->json(['data'=>$success, 'status_code'=>200]);

   }

   public function login(Request $request)
   {
   	//try logging in user
    if(Auth::attempt(['email'=>$request->input('email'), 'password'=> $request->input('password')])){
      $user = Auth::user();
      $success['token'] = $user->createToken('Laravel')->accessToken;
      $success['name'] = $user->first_name;

      return response()->json(['data'=>$success, 'status_code'=>200]);
   }

   return response()->json(['error'=>'unauthorized', 'status_code'=>401]);
    
   }

   public function getUserProfile()
   {  
    $user = Auth::user();
   // $user['token'] = $user->createToken('Laravel')->accessToken;
     
    return response()->json(['data'=>$user, 'status_code'=>200]);
   }
}
 