<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Session;
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
         'password'=>'required|min:5',
         'confirm_password'=> 'required|same:password'
]);
      if($validator->fails())
      {
      	return response()->json(['error'=>$validator->errors()], 400);
      }
      $input = $request->all();
      $input['password'] = bcrypt($input['password']);
      $user = User::create($input);
      $success['token'] = $user->createToken('Laravel')->accessToken;
      $success[] = $user;

      return response()->json(['data'=>$success, 'status_code'=>201]);

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

   public function editUserProfile(Request $request)
   {  
   $user_details = Auth::user();
   $user_id = $user_details->id;

    $validator = Validator::make($request->all(), [
    'first_name'=>'required|min:5',
    'last_name'=> 'required|min:5',
    'username'=> 'required',
]);
      if($validator->fails())
      {
      	return response()->json(['error'=>$validator->errors(), 'status_code'=>400]);
      }

       $input = $request->all();
       $user = User::where('id', $user_id)->update($input);
       $user_records = Auth::user();
    
      return response()->json(['data'=>$user_records, 'status_code'=>200]);
   }

   protected function guard()
   {
   	return Auth::guard('api');
   }

   public function logout(Request $request)
   {
    if(!$this->guard()->check()){
    return response()->json(['status_message'=>'No active user session was found', 'status_code'=>404]);
    }
    $request->user('api')->token()->revoke();

    Auth::guard()->logout();

    Session::flush();

    Session::regenerate();
    
    return response()->json(['status_message'=>'User was logged out', 'status_code'=>200]);
    }

    public function changeUserPassword(Request $request)
    {
     
     $user_details = Auth::user();
     $user_id = $user_details->id;

    $validator = Validator::make($request->all(), [
    'password'=>'required|min:5',
    'confirm_password'=> 'required|same:password',
]);
      if($validator->fails())
      {
      	return response()->json(['error'=>$validator->errors()], 400);
      }

       $input = $request->all();
       $user = User::where('id', $user_id)->update($input);

      return response()->json(['status_message'=>'Password updated successfully', 'status_code'=>200]);

    }



   }
 