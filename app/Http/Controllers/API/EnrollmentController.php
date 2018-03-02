<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Enrollment;
use Validator;
use App\User;
use App\Subscription;
use Auth;
use Carbon\Carbon;
//use App\Http\Resources\Enrollment as EnrollmentResource;
use App\Http\Controllers\Controller;
 

class EnrollmentController extends Controller
{
    public function viewEnrollment($id)
    {
      
            $enrollments = Enrollment::where('id', $id)->get(['id','subscription_id', 'course_id', 'stripe_id','ends_at']);
            return response()->json(['data'=>$enrollments, 'status_code'=>200]);
    }

    
    public function enroll(Request $request)
    {
        $validator = Validator::make($request->all(), [
             'subscription_id'=>'required|numeric',
             'course_id'=> 'nullable|numeric',
             'stripe_id'=>'required',
             'ends_at' => 'nullable|date',
        ]);
        if($validator->fails())
        {
              return response()->json(['error'=>$validator->errors()], 400);
        }
    $token = $request->stripeToken; 
    // Get the sunscription name with the subscription ID
    $subID = $request->input('subscription_id');
    $subscription = Subscription::find($subID);
    $title = $subscription->title;
    //Get the ID of the user
    $user_id = Auth::id();
    $user = User::find($user_id);

    $email= $user->email;
    $current = Carbon::now();
    $ends_at = $current->addDays(30);
    $input = $request->all();
    $enrollment = Enrollment::create($input);
    $id = $enrollment->id;
    $enrollment = Enrollment::where('id', $id)->update(['ends_at' =>$ends_at]);
    try{
        $user->newSubscription($title, $title)->create($token,[
                'email' => $email,]);
        
        $success[] = $enrollment;
        return response()->json(['data'=>$success, 'status_code'=>201]);
    }catch(Exception $ex){
        return response()->json(['data'=> $ex->getMessage(), 'status_code'=>401]);
    } 
    }
}