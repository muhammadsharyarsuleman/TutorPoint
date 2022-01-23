<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\Learner;
use App\Models\learnerRequest;

class loginTutorController extends Controller
{
    
    //Tutor Methods
    public function tutorCheck(Request $request){
        $request->validate([
            'tutor_username'=>'required',
            'tutor_password'=>'required|min:5|max:12'
        ]);

        $tutorInfo = tutor::where('tutor_username','=',$request->tutor_username)->first();

        if(!$tutorInfo){
            return back()->with('failTutor','we do not recongize your username');
        }else{
            //checkpassword
            if(Hash::check($request->tutor_password, $tutorInfo->tutor_password)){
                $request->session()->put('loggedTutor',$tutorInfo->tutor_id);
                return redirect('tutor/profile');

            }else{
                return back()->with('failTutor','Incorrect Password');
            }
        }
        

    }

    function tutorProfile(){

        $status="pending";
        $status2="Accept";
        
        $learnerRequest = DB::table('learner_requests')
            ->leftJoin('learners', 'learner_requests.request_learner_id', '=', 'learners.learner_id')
            ->where('request_tutor_id','=', session('loggedTutor'))
            ->where('status','=',$status)
            ->select('learners.*','learner_requests.*')
            ->get();

            $notificationCount = DB::table('learner_requests')
            ->where('request_tutor_id','=',session('loggedTutor'))
            ->where('status','=',$status)
            ->count();

            $notificationCount2 = DB::table('learner_requests')
            ->where('request_tutor_id','=',session('loggedTutor'))
            ->where('status','=',$status2)
            ->count();

        $loggedTutorInfo = tutor::where('tutor_id','=', session('loggedTutor'))->first();
        return view('tutor.tutor-profile',['learnerRequest'=>$learnerRequest,'loggedTutorInfo'=>$loggedTutorInfo,'notificationCount'=>$notificationCount,'notificationCount2'=>$notificationCount2]);
        }

        function learnerList(){
            $status="Accept";
            $learnerRequest = DB::table('learner_requests')
            ->leftJoin('learners', 'learner_requests.request_learner_id', '=', 'learners.learner_id')
            ->where('request_tutor_id','=', session('loggedTutor'))
            ->where('status','=',$status)
            ->select('learners.*','learner_requests.*')
            ->get();
           
            $loggedTutorInfo = tutor::where('tutor_id','=', session('loggedTutor'))->first();
            return view('tutor.studentList',['learnerRequest'=>$learnerRequest,'loggedTutorInfo'=>$loggedTutorInfo]);
        }

        public function acceptRequest(Request $request, $request_id){
               
                $result =  DB::Table('learner_requests')->where('request_id',$request_id)->update(
                    array(
                    'request_learner_id' => $request->request_learner_id,
                    'request_tutor_id' =>  $request->request_tutor_id,
                    'reply_message' => $request->replyMessage,
                    'status' => $request->status
                    )
                    );
                return back();
                
            
        }

    function logoutTutor(){
        if(session()->has('loggedTutor')){
            session()->pull('loggedTutor');
            return redirect('/sign-in');
        }
    }
}
