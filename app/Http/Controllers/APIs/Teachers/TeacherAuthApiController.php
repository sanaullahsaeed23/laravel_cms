<?php

namespace App\Http\Controllers\APIs\Teachers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Function_;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use Carbon\Carbon;


class TeacherAuthApiController extends Controller
{
     // Login
     public function login(Request $request){
        // Validate the email and password
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);
        // Find user email in database and pick the object of that user
        $user = teacher::where('email', $request->email)->first();
        // $user1= User::where('usertype','teacher')->get(); //request()->email is email that we recieve from user during login
        
        // Check if user email is not present or password not match
        if(!$user || !Hash::check($request->password, $user->password)){
            return response([
                'message' => 'Given Credentials are not correct',
                'status' => 'failed',
            ], 401);
        }


            // if user email is correct, and password matches using teacher guard then
        if(Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password])){
            // Teacher Details
            $teacherDetails = Auth::guard('teacher')->user();
            // Token Generation
            $token = $teacherDetails->createToken('TeacherToken',['teacher'])->plainTextToken;
            // simply ignore createToken error.

            // display in api console
            return response([
                'token' => $token,
                'Teacher Details' => $teacherDetails,
                'message' => 'Login Successfull',
                'status' => 'success'
            ], 200);
        }
        
    }

    // Teacher Data
    public function teacherDetails(){
        $teacher = Auth::user();
        return response([
            'Teacher Details' => $teacher
        ]);
    }

    public function logout(){
        auth()->user()->tokens->each(function($token, $key){
            $token->delete();
        });
        return response([
            'message' => 'User Logout Successfully !! Token Deleted!!'
        ], 200);
    }

    public function send_reset_password_otp(Request $request){
        // Validate the email and password
        $request->validate([
           'email' => 'required|email',
       ]);
       $email = $request->email;
       // Find user email in database and pick the object of that user
       $user = teacher::where('email', $request->email)->first();  //request()->email is email that we recieve from user during login
       if(!$user){
          return response([
               'message' => 'User Email does not exist. Register your account.',
               'status' => 'failed'
           ], 404);
       }
           // Generate a rondom token that will be sent with email
           $otpCode = rand(1000, 9999); // Str is used to generate random number

            $user->otp_code = $otpCode;
            $user->otp_created_at = Carbon::now();
            $user->save();
           // // Also add $fillable in PasswordReset Model

           // // Sending email with password reset view
           // reset_password below is the view in views folder that will sent in email temeplate
           Mail::send('reset_password', ['otpCode'=> $otpCode], function(Message $message) use ($email){
               $message->subject('Reset Your Password');
               $message->to($email);
           });


           // // Response
           return response([
               'message' => 'OTP Code sent to your Email Address.. Check your inbox.',
               'time' => Carbon::now()->toDateTimeString(),
               'OTP' => $otpCode,
               'status' => 'success',
           ], 200);
    }

    public function reset_password_with_otp_verification(Request $request){

        // Validate the email and password
        $request->validate([
           'email' => 'required|email',
           'otp_code' => 'required',
           'new_password' => 'required|confirmed|min:6'
       ]);


      //    Find user email in database and pick the object of that user
      $user = teacher::where('email', $request->email)->first();  //request()->email is email that we recieve from user during login
      if(!$user){
         return response([
              'message' => 'User Email does not exist. Register your account.',
              'status' => 'failed'
          ], 404);
            } 

         // Delete the token older than 3 minute
         $formatted = Carbon::now()->subMinutes(3)->toDateTimeString(); //3 min subtract from current time in string format 
        $outdatedOtp = teacher::where('email', '=', $request->email)->where('otp_created_at', '<=', $formatted);
        /// todo: Delete otp older than 3 minutes not working, condition is not working it's dleting every new otp also

        //  if(Teacher::where('email', '=', $request->email)->where('otp_created_at', '<=', $formatted) != '{}'){
        //           $user->update([
        //               'otp_code' => null,
        //               'otp_created_at' => null,
        //           ]);
        //           return response([
        //               'message' => 'OTP Expired... Please Generate New one...',
        //               'formatted time' => $formatted,
        //               'outdated' => $outdatedOtp,
        //               'status' => 'failed'
        //           ], 404);
        //       }

      // Validate the OTP code
      if ($user->otp_code != $request->otp_code) {
        return response([
            'message' => 'Invalid/Wrong OTP Code...',
            'status' => 'failed'
        ], 422);
        }
           
            $user->password = Hash::make($request->new_password);
            $user->otp_code = null;
            $user->otp_created_at = null;
            $user->save();
           // // Also add $fillable in PasswordReset Model

            // Revoke all of the user's tokens to force them to log in with their new password
            $user->tokens()->delete();

           // // Response
           return response([
               'message' => 'Password reset successfully.',
               'status' => 'success',
           ], 200);
    }
}
