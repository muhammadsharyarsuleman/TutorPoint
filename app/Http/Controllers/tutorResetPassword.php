<?php

namespace App\Http\Controllers;

use App\Mail\TutorMail;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class tutorResetPassword extends Controller
{
    function validateTutorPasswordRequest(Request $request){
        
        //You can add validation login here
        $tutor = DB::table('tutors')->where('tutor_email', '=', $request->tutor_email)->first();

        //Check if the user exists
        if ($tutor==null) {
        return back()->with('fail','tutor email does not exist');
        }

        //Create Password Reset Token
        DB::table('password_resets')->insert([
        'email' => $request->tutor_email,
        'token' => Str::Random(20),
        'created_at' => Carbon::now()
        ]);

        //Get the token just created above
        $tokenData = DB::table('password_resets')
        ->where('email', $request->tutor_email)->first();
        if ($this->sendTutorResetEmail($request->tutor_email, $tokenData->token)) {
        return back()->with('success', 'A reset link has been sent to your email address.');
        } else {
        return back()->with('fail', 'A Network Error occurred. Please try again.');
        }
}

public function sendTutorResetEmail($tutor_email, $token){
            //Retrieve the user from the database
            $tutor = DB::table('tutors')->where('tutor_email', $tutor_email)->select('tutor_firstname','tutor_lastname', 'tutor_email')->first();

            
            //Generate, the password reset link. The token generated is embedded in the link
            $tutorLink = 'http://127.0.0.1:8000/reset/tutor/' . $token . '/' . $tutor->tutor_email;

            $tutorDetails = [
                'title' => 'Tutor Point Reset Password Link',
                'body' => $tutor->tutor_firstname.' '.$tutor->tutor_lastname.' Please Click the link to redirect to reset password Page'

            ];
            Mail::to($tutor_email)->send(new TutorMail($tutorDetails,$tutorLink));
            


            
}
}
