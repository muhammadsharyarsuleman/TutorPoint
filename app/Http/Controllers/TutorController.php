<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Tutor;


class TutorController extends Controller
{

    public function index()
    {
        return view('signup-tutor');
    }

    function setting(){
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
            $loggedTutorInfo=Tutor::where('tutor_id','=', session('loggedTutor'))->first();

        $loggedTutorInfo = tutor::where('tutor_id','=', session('loggedTutor'))->first();
        return view('tutor.tutorSetting',['learnerRequest'=>$learnerRequest,'loggedTutorInfo'=>$loggedTutorInfo,'notificationCount'=>$notificationCount,'notificationCount2'=>$notificationCount2,'data']);
       
       
    }
    
    public function store(Request $request)
    {
        //validation of Input Fields
        $request->validate([
            'tutor_username'=>'required|unique:tutors',
            'tutor_firstname'=>'required|alpha',
            'tutor_lastname'=>'required|alpha',
            'tutor_password'=>'required|min:3|max:12',
            'tutor_phone_number'=>'required|numeric|digits:11',
            'tutor_year_of_experience'=>'required',
            'tutor_age'=>'required|numeric|digits:2',
            'tutor_gender'=>'required|alpha',
            'tutor_designation'=>'required|alpha',
            'tutor_prefer_location'=>'required',
            'tutor_subject'=>'required|alpha',
            'tutor_class'=>'required',
            'tutor_qualification'=>'required',
            'tutor_city_name'=>'required',
            'tutor_email'=>'required|email|unique:tutors',
            'tutor_profile_image'=>'required|mimes:jpg,bmp,png',
            'tutor_fees'=>'required|numeric'
        ]);

        //initialization
        $tutor_username = $request->tutor_username;
        $tutor_firstname = $request->tutor_firstname;
        $tutor_lastname = $request->tutor_lastname;
        $tutor_password = Hash::make($request->tutor_password);
        $tutor_phone_number = $request->tutor_phone_number;
        $tutor_year_of_experience = $request->tutor_year_of_experience;
        $tutor_age = $request->tutor_age;
        $tutor_gender = $request->tutor_gender;
        $tutor_designation = $request->tutor_designation;
        $tutor_prefer_location = $request->tutor_prefer_location;
        $tutor_subject = $request->tutor_subject;
        $tutor_class = $request->tutor_class;
        $tutor_qualification = $request->tutor_qualification;
        $tutor_city_name = $request->tutor_city_name;
        $tutor_email = $request->tutor_email;
        $tutor_fees = $request->tutor_fees;

        
        $image = $request->file('tutor_profile_image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $dest=public_path('/tutors');
        $image->move($dest,$imageName);
         
       //inserting data into database
        $tutor = new tutor();

        $tutor->tutor_username = $tutor_username;
        $tutor->tutor_firstname = $tutor_firstname;
        $tutor->tutor_lastname = $tutor_lastname;
        $tutor->tutor_password = $tutor_password;
        $tutor->tutor_phone_number = $tutor_phone_number;
        $tutor->tutor_year_of_experience = $tutor_year_of_experience;
        $tutor->tutor_age = $tutor_age;
        $tutor->tutor_gender = $tutor_gender;
        $tutor->tutor_designation = $tutor_designation;
        $tutor->tutor_prefer_location = $tutor_prefer_location;
        $tutor->tutor_subject = $tutor_subject;
        $tutor->tutor_class = $tutor_class;
        $tutor->tutor_qualification = $tutor_qualification;
        $tutor->tutor_city_name = $tutor_city_name;
        $tutor->tutor_email = $tutor_email;
        $tutor->tutor_fees = $tutor_fees;
        $tutor->tutor_profile_image = $imageName;

        $save = $tutor->save();

        if($save){
            return redirect('/sign-in')->with('successTutor','You Registered Successfully..... Now Login Tutor');
        }else{
            return back()->with('fail','Something went wring, try again late.....');
        }
    
    }

    function tutorUpdate(Request $request, $tutor_id)
    {
        $response = Tutor::where('tutor_id','=',$tutor_id)->first();
        //validation of Input Fields
        if($response->tutor_email==$request->tutor_email){
        $request->validate([
            'tutor_firstname'=>'required|alpha',
            'tutor_lastname'=>'required|alpha',
            'tutor_phone_number'=>'required|numeric|digits:11',
            'tutor_year_of_experience'=>'required',
            'tutor_age'=>'required|numeric|digits:2',
            'tutor_gender'=>'required|alpha',
            'tutor_designation'=>'required',
            'tutor_prefer_location'=>'required',
            'tutor_subject'=>'required',
            'tutor_class'=>'required',
            'tutor_qualification'=>'required',
            'tutor_city_name'=>'required|alpha',
            'tutor_email'=>'required|email',
            'tutor_fees'=>'required|numeric',
            'tutor_profile_image'=>'mimes:jpg,bmp,png'
        ]);
        }else{
            $request->validate([
            'tutor_firstname'=>'required|alpha',
            'tutor_lastname'=>'required|alpha',
            'tutor_phone_number'=>'required|numeric|digits:11',
            'tutor_year_of_experience'=>'required',
            'tutor_age'=>'required|numeric|digits:2',
            'tutor_gender'=>'required|alpha',
            'tutor_designation'=>'required',
            'tutor_prefer_location'=>'required',
            'tutor_subject'=>'required',
            'tutor_class'=>'required',
            'tutor_qualification'=>'required',
            'tutor_city_name'=>'required|alpha',
            'tutor_email'=>'required|email|unique:tutors',
            'tutor_fees'=>'required|numeric',
            'tutor_profile_image'=>'mimes:jpg,bmp,png'
            ]);
        }

        //initialization
        
        $tutor_firstname = $request->tutor_firstname;
        $tutor_lastname = $request->tutor_lastname;
        $tutor_phone_number = $request->tutor_phone_number;
        $tutor_year_of_experience = $request->tutor_year_of_experience;
        $tutor_age = $request->tutor_age;
        $tutor_gender = $request->tutor_gender;
        $tutor_designation = $request->tutor_designation;
        $tutor_prefer_location = $request->tutor_prefer_location;
        $tutor_subject = $request->tutor_subject;
        $tutor_class = $request->tutor_class;
        $tutor_qualification = $request->tutor_qualification;
        $tutor_city_name = $request->tutor_city_name;
        $tutor_email = $request->tutor_email;
        $tutor_fees = $request->tutor_fees;

        if($request->file('tutor_profile_image')!=null){
        
        $image = $request->file('tutor_profile_image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $dest=public_path('/tutors');
        $image->move($dest,$imageName);
         
        $result =  DB::Table('tutors')->where('tutor_id',$tutor_id)->update(
            array(
    
                'tutor_firstname' => $tutor_firstname,
                'tutor_lastname' => $tutor_lastname,
                'tutor_phone_number' => $tutor_phone_number,
                'tutor_year_of_experience' => $tutor_year_of_experience,
                'tutor_age' => $tutor_age,
                'tutor_gender' => $tutor_gender,
                'tutor_designation' => $tutor_designation,
                'tutor_prefer_location' => $tutor_prefer_location,
                'tutor_subject' => $tutor_subject,
                'tutor_class' => $tutor_class,
                'tutor_qualification' => $tutor_qualification,
                'tutor_city_name' => $tutor_city_name,
                'tutor_email' => $tutor_email,
                'tutor_fees' => $tutor_fees,
                'tutor_profile_image' => $imageName
            )
            );
        }else{
          
             
            $result =  DB::Table('tutors')->where('tutor_id',$tutor_id)->update(
                array(
        
                    'tutor_firstname' => $tutor_firstname,
                    'tutor_lastname' => $tutor_lastname,
                    'tutor_phone_number' => $tutor_phone_number,
                    'tutor_year_of_experience' => $tutor_year_of_experience,
                    'tutor_age' => $tutor_age,
                    'tutor_gender' => $tutor_gender,
                    'tutor_designation' => $tutor_designation,
                    'tutor_prefer_location' => $tutor_prefer_location,
                    'tutor_subject' => $tutor_subject,
                    'tutor_class' => $tutor_class,
                    'tutor_qualification' => $tutor_qualification,
                    'tutor_city_name' => $tutor_city_name,
                    'tutor_email' => $tutor_email,
                    'tutor_fees' => $tutor_fees,
                    
                )
                );
        }
        if($result){
            return back()->with('success','You Update Your Information Successfully.....');
        }else{
            return back()->with('fail','Something went wring, try again late.....');
        }
    
    }

    public function reset($token, $tutor_email){
        $tutor = Tutor::where('tutor_email','=',$tutor_email)->first();

        if($tutor==null){
            echo 'Email Not Exist';
        }

        $code=DB::table('password_resets')->where('token','=',$token)->first();


        if($code != null){
            return view('tutor_reset_password_form')->with(['tutor'=>$tutor,'code'=>$code]);
        }else{
            return redirect('/');
        }
    }

    public function resetPassword(Request $request,$token, $tutor_email)
    {
                //Validate Requests
                    $request->validate([
                        'tutor_password'=>'required|min:5|max:12',
                    ]);

                

                $tutor_password = $request->tutor_password;
                $tutor_id = $request->tutor_id;
                                               

                $result =  DB::Table('tutors')->where('tutor_id',$tutor_id)->update(
                    array(
                    'tutor_password' => Hash::make($tutor_password)
                    )
                    );

                //Delete the token
                DB::table('password_resets')->where('email', $tutor_email)
                ->delete();
                if($result){
                return redirect('sign-in')->with('successTutor','Your password has been reset please login with new password');
                }else{
                    return back()->with('fail','Something Went Wrong....');
                }
    }
}
