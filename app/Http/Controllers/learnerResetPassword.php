<?php

namespace App\Http\Controllers;

use App\Mail\LearnerMail;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class learnerResetPassword extends Controller
{
    function validatePasswordRequest(Request $request){
        
                    //You can add validation login here
                    $learner = DB::table('learners')->where('learner_email', '=', $request->learner_email)->first();

                    //Check if the user exists
                    if ($learner==null) {
                    return back()->with('fail','Learner does not exist');
                    }

                    //Create Password Reset Token
                    DB::table('password_resets')->insert([
                    'email' => $request->learner_email,
                    'token' => Str::Random(60),
                    'created_at' => Carbon::now()
                    ]);

                    //Get the token just created above
                    $tokenData = DB::table('password_resets')
                    ->where('email', $request->learner_email)->first();
                    if ($this->sendResetEmail($request->learner_email, $tokenData->token)) {
                    return back()->with('fail', 'A Network Error occurred. Please try again.');
                    } else {
                    return back()->with('success', 'A reset link has been sent to your email address.');
                    }
    }

        public function sendResetEmail($learner_email, $token){
                        //Retrieve the user from the database
                        $learner = DB::table('learners')->where('learner_email', $learner_email)->select('learner_firstname','learner_lastname', 'learner_email')->first();

                        
                        //Generate, the password reset link. The token generated is embedded in the link
                        $link = 'http://127.0.0.1:8000/reset/' . $token . '/' . $learner->learner_email;

                        $details = [
                            'title' => 'Tutor Point Reset Password Link',
                            'body' => $learner->learner_firstname.' '.$learner->learner_lastname.' Please Click the link to redirect to reset password Page'

                        ];
                        Mail::to($learner_email)->send(new LearnerMail($details,$link));
                        


                        
        }
}
