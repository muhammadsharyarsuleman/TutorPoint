<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Learner;

class loginController extends Controller
{
    public function loginLearner()
    {
        return view('sign-in');
    }



        //Learner Methods
    public function learnerCheck(Request $request){
        $request->validate([
            'learner_username'=>'required',
            'learner_password'=>'required|min:3|max:12'
        ]);

        $learnerInfo = learner::where('learner_username','=',$request->learner_username)->first();

        if(!$learnerInfo){
            return back()->with('failLearner','we do not recongize your username');
        }else{
            //checkpassword
            if(Hash::check($request->learner_password, $learnerInfo->learner_password)){
                $request->session()->put('loggedLearner',$learnerInfo->learner_id);
                return redirect('learner/profile');

            }else{
                return back()->with('failLearner','Incorrect Password');
            }
        }
        

    }

    function learnerProfile(){

        $status="pending";
        $tutorRequest = DB::table('learner_requests')
            ->leftJoin('tutors', 'learner_requests.request_tutor_id', '=', 'tutors.tutor_id')
            ->where('request_learner_id','=', session('loggedLearner'))
            ->where('status','!=',$status)
            ->select('tutors.*','learner_requests.*')
            ->get();
            
            $notificationCount = DB::table('learner_requests')
            ->where('request_learner_id','=',session('loggedLearner'))
            ->where('status','!=',$status)
            ->count();

        $loggedLearnerInfo=Learner::where('learner_id','=', session('loggedLearner'))->first();
        return view('learner.learner-profile',['loggedLearnerInfo'=>$loggedLearnerInfo,'tutorRequest'=>$tutorRequest,'notificationCount'=>$notificationCount]);
        }

    function logoutLearner(){
        if(session()->has('loggedLearner')){
            session()->pull('loggedLearner');
            return redirect('/sign-in');
        }
    }
}
