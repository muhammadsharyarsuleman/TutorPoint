<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Learner;
use App\Models\Tutor;

class LearnerController extends Controller
{
    public function index()
    {
        return view('signup-learner');
    }



    public function store(Request $request)
    {
        //Validate Requests
        $request->validate([
            'learner_username'=>'required|unique:learners',
            'learner_firstname'=>'required|alpha',
            'learner_lastname'=>'required|alpha',
            'learner_password'=>'required|min:3|max:15',
            'learner_phone_number'=>'required|numeric|digits:11',
            'learner_class'=>'required',
            'learner_age'=>'required|numeric|digits:2',
            'learner_gender'=>'required|alpha',
            'learner_institude'=>'required',
            'learner_address'=>'required',
            'learner_prefer_location'=>'required',
            'learner_parent_phone_number'=>'required|numeric|digits:11',
            'learner_city_name'=>'required|alpha',
            'learner_email'=>'required|email|unique:learners',
            'learner_profile_image'=>'required|mimes:jpg,bmp,png'
        ]);
       
        //initialization
        $learner_username = $request->learner_username;
        $learner_firstname = $request->learner_firstname;
        $learner_lastname = $request->learner_lastname;
        $learner_password = Hash::make($request->learner_password);
        $learner_phone_number = $request->learner_phone_number;
        $learner_class = $request->learner_class;
        $learner_age = $request->learner_age;
        $learner_gender = $request->learner_gender;
        $learner_institude = $request->learner_institude;
        $learner_address = $request->learner_address;
        $learner_prefer_location = $request->learner_prefer_location;
        $learner_parent_phone_number = $request->learner_parent_phone_number;
        $learner_city_name = $request->learner_city_name;
        $learner_email = $request->learner_email;

        
        $image = $request->file('learner_profile_image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $dest=public_path('/learners');
        $image->move($dest,$imageName);
         
        //Inserting data into database
        $learner = new Learner();

        $learner->learner_username = $learner_username;
        $learner->learner_firstname = $learner_firstname;
        $learner->learner_lastname = $learner_lastname;
        $learner->learner_password = $learner_password;
        $learner->learner_phone_number = $learner_phone_number;
        $learner->learner_class = $learner_class;
        $learner->learner_age = $learner_age;
        $learner->learner_gender = $learner_gender;
        $learner->learner_institude= $learner_institude;
        $learner->learner_address= $learner_address;
        $learner->learner_prefer_location=$learner_prefer_location;
        $learner->learner_parent_phone_number=$learner_parent_phone_number;
        $learner->learner_city_name=$learner_city_name;
        $learner->learner_email=$learner_email;
        $learner->learner_profile_image=$imageName;

        $save = $learner->save();
        if($save){
            return redirect('/sign-in')->with('successLearner','You Registered Successfully..... Now Login Learner');
        }else{
            return back()->with('fail','Something went wring, try again late.....');
        }
    }
        function search(){
            $tutors = DB::select('select * from tutors');
           
            $loggedLearnerInfo = Learner::where('learner_id','=', session('loggedLearner'))->first();
            return view('Learner.search',['tutors'=>$tutors,'loggedLearnerInfo'=>$loggedLearnerInfo]);
        }

        
        function setting(){
            $data = ['loggedLearnerInfo'=>Learner::where('learner_id','=', session('loggedLearner'))->first()];
            return view('learner.learnerSetting',$data);
        }
    

        function learnerUpdate(Request $request, $learner_id){

            $response = Learner::where('learner_id','=',$learner_id)->first();
            //Validate Requests
            if($response->learner_email==$request->learner_email){
        $request->validate([
            'learner_firstname'=>'required|alpha',
            'learner_lastname'=>'required|alpha',
            'learner_phone_number'=>'required|numeric|digits:11',
            'learner_class'=>'required',
            'learner_age'=>'required|numeric|digits:2',
            'learner_gender'=>'required|alpha',
            'learner_institude'=>'required',
            'learner_address'=>'required',
            'learner_prefer_location'=>'required',
            'learner_parent_phone_number'=>'required|numeric|digits:11',
            'learner_city_name'=>'required|alpha',
            'learner_email'=>'required|email',
            'learner_profile_image' => 'mimes:jpg,bmp,png'
        ]);
        }else{
            $request->validate([
                'learner_firstname'=>'required|alpha',
                'learner_lastname'=>'required|alpha',
                'learner_phone_number'=>'required|numeric|digits:11',
                'learner_class'=>'required',
                'learner_age'=>'required|numeric|digits:2',
                'learner_gender'=>'required|alpha',
                'learner_institude'=>'required',
                'learner_address'=>'required',
                'learner_prefer_location'=>'required',
                'learner_parent_phone_number'=>'required|numeric|digits:11',
                'learner_city_name'=>'required|alpha',
                'learner_email'=>'required|email|unique:learners',
                'learner_profile_image' => 'mimes:jpg,bmp,png'
            ]);
        }

        //initialization
        $learner_firstname = $request->learner_firstname;
        $learner_lastname = $request->learner_lastname;
        $learner_phone_number = $request->learner_phone_number;
        $learner_class = $request->learner_class;
        $learner_age = $request->learner_age;
        $learner_gender = $request->learner_gender;
        $learner_institude = $request->learner_institude;
        $learner_address = $request->learner_address;
        $learner_prefer_location = $request->learner_prefer_location;
        $learner_parent_phone_number = $request->learner_parent_phone_number;
        $learner_city_name = $request->learner_city_name;
        $learner_email = $request->learner_email;

        if($request->file('learner_profile_image')!=null){

        $image = $request->file('learner_profile_image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $dest=public_path('/learners');
        $image->move($dest,$imageName);

       
        
        $result =  DB::Table('learners')->where('learner_id',$learner_id)->update(
            array(
            'learner_firstname'=>$learner_firstname,
            'learner_lastname' => $learner_lastname,
            'learner_phone_number' => $learner_phone_number,
            'learner_class' => $learner_class,
            'learner_age' => $learner_age,
            'learner_gender' => $learner_gender,
            'learner_institude'=> $learner_institude,
            'learner_address'=> $learner_address,
            'learner_prefer_location'=>$learner_prefer_location,
            'learner_parent_phone_number'=>$learner_parent_phone_number,
            'learner_city_name'=>$learner_city_name,
            'learner_email'=>$learner_email,
            'learner_profile_image'=>$imageName
            )
            );
        }else{
            
        $result =  DB::Table('learners')->where('learner_id',$learner_id)->update(
            array(
            'learner_firstname'=>$learner_firstname,
            'learner_lastname' => $learner_lastname,
            'learner_phone_number' => $learner_phone_number,
            'learner_class' => $learner_class,
            'learner_age' => $learner_age,
            'learner_gender' => $learner_gender,
            'learner_institude'=> $learner_institude,
            'learner_address'=> $learner_address,
            'learner_prefer_location'=>$learner_prefer_location,
            'learner_parent_phone_number'=>$learner_parent_phone_number,
            'learner_city_name'=>$learner_city_name,
            'learner_email'=>$learner_email,
            )
            );

        }
            if($result){
                return back()->with('success','You info update Successfully.....');
            }else{
                return back()->with('fail','Something went wring, try again late.....');
            }
       

        }

                    public function reset($token, $learner_email){
                        $learner = Learner::where('learner_email','=',$learner_email)->first();

                        if($learner==null){
                            echo 'Email Not Exist';
                        }

                        $code=DB::table('password_resets')->where('token','=',$token)->first();


                        if($code != null){
                            return view('reset_password_form')->with(['learner'=>$learner,'code'=>$code]);
                        }else{
                            return redirect('/');
                        }
                    }

                    public function resetPassword(Request $request,$token, $learner_email)
                    {
                                //Validate Requests
                                    $request->validate([
                                        'learner_password'=>'required|min:5|max:12',
                                    ]);

                                

                                $learner_password = $request->learner_password;
                                $learner_id = $request->learner_id;
                                                               

                                $result =  DB::Table('learners')->where('learner_id',$learner_id)->update(
                                    array(
                                    'learner_password' => Hash::make($learner_password)
                                    )
                                    );
                
                                //Delete the token
                                DB::table('password_resets')->where('email', $learner_email)
                                ->delete();
                                if($result){
                                return redirect('sign-in')->with('successLearner','Your password has been reset please login with new password');
                                }else{
                                    return back()->with('fail','Something Went Wrong....');
                                }
                    }
}