<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Learner;
use App\Models\Tutor;
use App\Models\learnerRequest;

class requestController extends Controller
{
    public function tutorProfileOther($tutor_id){

        $tutorRating = DB::table('tutor_ratings')
        ->leftJoin('learners', 'tutor_ratings.rating_learner_id', '=', 'learners.learner_id')
        ->where('rating_tutor_id','=', $tutor_id)
        ->select('learners.*','tutor_ratings.*')
        ->get();

        $tutorRatingCount = DB::table('tutor_ratings')
        ->where('rating_tutor_id','=',$tutor_id)
        ->count();

        $tutorRatingAverage = DB::table('tutor_ratings')
        ->where('rating_tutor_id','=',$tutor_id)
        ->avg('rating_value');


        $tutorOtherInfo = DB::table('tutors')->where('tutor_id','=',$tutor_id)->first();
        $loggedLearnerInfo = Learner::where('learner_id','=', session('loggedLearner'))->first();
        return view('Learner.tutor-profile-other',['tutorOtherInfo'=>$tutorOtherInfo,'loggedLearnerInfo'=>$loggedLearnerInfo,'tutorRating'=>$tutorRating,'tutorRatingCount'=>$tutorRatingCount,'tutorRatingAverage'=>$tutorRatingAverage]);

    }
    
    public function requestStore(Request $request)
    {
        
             //initialization
        $request_tutor_id = $request->request_tutor_id;
        $request_learner_id = $request->request_learner_id;
        $message = $request->message;
        $status = $request->status;

        if(DB::table('learner_requests')->where('request_tutor_id','=',$request_tutor_id)->where('request_learner_id','=',$request_learner_id)->doesntExist()){
        //Inserting data into database
        $learnerRequest = new learnerRequest();

        $learnerRequest->request_tutor_id = $request_tutor_id;
        $learnerRequest->request_learner_id = $request_learner_id;
        $learnerRequest->message=$message;
        $learnerRequest->status=$status;
      
        $save = $learnerRequest->save();
        return back()->with('successRequest','Your Request has been sent....!');
        }else{
        return back()->with('failRequest','Maybe you already been sent your request or May you are a Learner of this Tutor....!');

        }
    }
}
