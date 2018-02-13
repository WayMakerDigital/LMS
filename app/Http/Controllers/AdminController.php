<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Auth;
use DB;

class AdminController extends Controller
{
   public function getAdminLogin()
   {
   	return view('admin');
   }

   public function createAdmin()
   {
   	return view('createadmin');
   }

   public function AdminAuth(Request $request)
   {
   	    $this->validate($request, [
        'email'=>'required|email',
        'password'=>'required'
   ]);
     $email = $request->email;
     $password = $request->password;
     $remember = $request->remember;

     if(Auth::guard('admin')->attempt(['email'=> $email, 'password'=> $password], $remember)){
       return redirect()->intended('/admin/dashboard');
     }else{
     	return redirect()->back()->with('warning', 'Invalid Email or Password');
     }
   }

  public function registerAdmin(Request $request)
{
  $this->validate($request, [
   'email'=> 'required|unique:users|email|max:255',
   'name'=> 'required|min:6',
   'password'=> 'required|min:6'
]); 

 Admin::create([
      'email'=>$request->email,
      'name'=>$request->name,
      'password'=>bcrypt($request->password)
]);
  return redirect()->back()->with('info', 'Admin account has been created successfully');
}

public function getAdminDashbboard()
{
	$users = DB::table('users')->count();
	$admins = DB::table('admins')->count();

	return view('dashboard.index', compact('users', 'admins'));
}

public function logout()
{
	Auth::logout();

	return redirect('/admin');
}

}
