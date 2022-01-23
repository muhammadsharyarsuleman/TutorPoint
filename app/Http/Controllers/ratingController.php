<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\Learner;
use App\Models\tutorRating;


class ratingController extends Controller
{
    public function ratingStore(Request $request)
    {
        
             //initialization
        $rating_tutor_id = $request->rating_tutor_id;
        $rating_learner_id = $request->rating_learner_id;
        $comment = $request->comment;
        $rating_value = $request->rating_value;

        if(DB::table('tutor_ratings')->where('rating_tutor_id','=',$rating_tutor_id)->where('rating_learner_id','=',$rating_learner_id)->doesntExist()){
        //Inserting data into database
        $tutorRating = new tutorRating();

        $tutorRating->rating_tutor_id = $rating_tutor_id;
        $tutorRating->rating_learner_id = $rating_learner_id;
        $tutorRating->Comment=$comment;
        $tutorRating->rating_value=$rating_value;
      
        $save = $tutorRating->save();

        return back()->with('successRequest','Your rating has been submit....!');
        }else{
        return back()->with('failRequest','you already have been submit yout Rating....!');

        }

        
    }

   
        
       
    

}
