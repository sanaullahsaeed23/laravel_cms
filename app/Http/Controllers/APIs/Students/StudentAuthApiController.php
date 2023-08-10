<?php

namespace App\Http\Controllers\APIs\Students;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use Illuminate\Http\Request;
use App\Models\students;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use Carbon\Carbon;

class StudentAuthApiController extends Controller
{
    // Login
    public function login(Request $request)
    {
        // Validate the email and password
        $request->validate([
            'rollNumber' => 'required',
            'password' => 'required',

        ]);
        // Find user email in database and pick the object of that user
        $user = students::where('rollNumber', $request->rollNumber)->first();  //request()->email is email that we recieve from user during login

        // Check if user email is not present or password not match
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'Given Credentials are not correct',
                'status' => 'failed',
            ], 401);
        }


        // if user email is correct, and password matches using student guard then
        if (Auth::guard('student')->attempt(['rollNumber' => $request->rollNumber, 'password' => $request->password])) {
            // Student Details
            $studentDetails = Auth::guard('student')->user();
            // Token Generation
            $token = $studentDetails->createToken('StudentToken', ['student'])->plainTextToken;
            // simply ignore createToken error.
            // ['student'] => means that for which guard(s) the token will be generated

            // display in api console
            return response([
                'token' => $token,
                'Student Details' => $studentDetails,
                'message' => 'Login Successfull',
                'status' => 'success'
            ], 200);
        }
    }

    // Student Data
    public function studentDetails()
    {
        $student = Auth::user();
        if ($student != null) { // if user is authenticated
            $stdDeatils = students::where('id', $student['id'])->with('student_class:id,name')->get();
        }
        return response([
            'Student Details' => $stdDeatils,
            // 'Student Details' => $student
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return response([
            'message' => 'User Logout Successfully !! Token Deleted!!'
        ], 200);
    }

    public function send_reset_password_otp(Request $request)
    {
        // Validate the email and password
        $request->validate([
            'email' => 'required|email',
        ]);
        $email = $request->email;
        // Find user email in database and pick the object of that user
        $user = students::where('email', $request->email)->first();  //request()->email is email that we recieve from user during login
        if (!$user) {
            return response([
                'message' => 'Student Email does not exist. Register your email Account.',
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
        Mail::send('reset_password', ['otpCode' => $otpCode], function (Message $message) use ($email) {
            $message->subject('Reset Your Password');
            $message->to($email);
        });


        // // Response
        return response([
            'message' => 'Password Reset link sent to your email.. Check your inbox.',
            'status' => 'success',
        ], 200);
    }

    public function reset_password_with_otp_verification(Request $request)
    {

        // Validate the email and password
        $request->validate([
            'email' => 'required|email',
            'otp_code' => 'required',
            'new_password' => 'required|confirmed|min:6'
        ]);


        //    Find user email in database and pick the object of that user
        $user = students::where('email', $request->email)->first();  //request()->email is email that we recieve from user during login
        if (!$user) {
            return response([
                'message' => 'Student Email does not exist. Register your email Account.',
                'status' => 'failed'
            ], 404);
        }

        // Delete the token older than 3 minute
        $formatted = Carbon::now()->subMinutes(3)->toDateTimeString(); //3 min subtract from current time in string format 
        /// todo: Delete otp older than 3 minutes not working, condition is not working it's dleting every new otp also


        //  $otpTime = Sturdents::where('email', '=', $request->email)->where('otp_created_at', '<=', $formatted);
        //  if($otpTime){
        //           $otpTime->update([
        //               'otp_code' => null,
        //               'otp_created_at' => null,
        //           ]);
        //           return response([
        //               'message' => 'OTP Expired... Please Generate New one...',
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

    /**
     * Edit the student profile picture
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function eidtProfile(Request $request)
    {
        // todo: just change the profile picture of student in edit profile
    }


    /**
     * Change Student Passwrod while is logged in
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function changePassoword(Request $request)
    {
        // Validate the old Password and password
        $request->validate([
            'email' => 'required|email', //todo: change this to rollNumber
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:6'
        ]);


        //    Find user email in database and pick the object of that user
        $user = students::where('email', $request->email)->first();  //request()->email is email that we recieve from user during login
        if (!$user) {
            return response([
                'message' => 'Student Email does not exist. Ask Admin to Register your account',
                'status' => 'failed'
            ], 404);
        }


        // Validate the old password
        if (!Hash::check($request->old_password, $user->password)) {
            return response([
                'message' => 'Invalid Old Password',
                'status' => 'failed'
            ], 422);
        }

        $user->password = Hash::make($request->new_password);
        $user->code = "Changed";
        $user->save();
        // // Also add $fillable in PasswordReset Model

        // Revoke all of the user's tokens to force them to log in with their new password
        $user->tokens()->delete();

        // todo: logout here to force student again to login

        // // Response
        return response([
            'message' => 'Password changed successfully.',
            'status' => 'success',
        ], 200);
    }

    public function teachersList(Request $request)
    {
        $request->validate([
            'classId' => 'required',
            'year' => 'required|integer|between:1901,3055'
        ]);

        try {
            $teachersList = AssignSubject::where('class_id', $request->classId)
            ->whereYear('year', $request->year)
            ->select('id', 'class_id', 'subject_id', 'teacher_id')
            ->with('subject_teacher:id,name')
            ->with('school_subject:id,name')
            ->with('student_class:id,name')
            ->get();
        } catch (\Exception $e) {
            Log::error('Database error: ' . $e->getMessage());
            return response([
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        }

        // // Response
        return response([
            'Teachers List' => $teachersList
        ], 200);
    }
}
