<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearnerController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\loginTutorController;
use App\Http\Controllers\requestController;
use App\Http\Controllers\ratingController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\learnerResetPassword;
use App\Http\Controllers\tutorResetPassword;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});







//Storing Data to database
Route::post('/signup-learner',[LearnerController::class,'store'])->name('learner.store');
Route::post('/signup-tutor',[TutorController::class,'store'])->name('tutor.store');





//Learner
Route::post('/signin-learner',[loginController::class,'learnerCheck'])->name('learner.check');
Route::get('/learner/logout',[loginController::class,'logoutLearner'])->name('learner.logout');
Route::post('/learner/profile/search/request/{tutor_id}',[requestController::class,'requestStore']);
Route::post('/learner/profile/search/{tutor_id}',[ratingController::class,'ratingStore']);
Route::post('/learner/profile/setting/{learner_id}',[LearnerController::class,'learnerUpdate']);


//tutor
Route::post('/signin-tutor',[loginTutorController::class,'tutorCheck'])->name('tutor.check');
Route::get('/tutor/logout',[loginTutorController::class,'logoutTutor'])->name('tutor.logout');
Route::post('/tutor/profile/{request_id}',[loginTutorController::class,'acceptRequest']);
Route::post('/tutor/profile/setting/{tutor_id}',[TutorController::class,'tutorUpdate']);




Route::group(['middleware'=>['learnerAuthCheck']], function(){
    Route::get('/learner/profile',[loginController::class,'learnerProfile']);
    Route::get('/learner/profile/search',[LearnerController::class,'search']);
    Route::get('/learner/profile/setting',[LearnerController::class,'setting']);
    Route::get('/learner/profile/search/{tutor_id}',[requestController::class,'tutorProfileOther']);
   
});

Route::group(['middleware'=>['tutorAuthCheck']], function(){
    Route::get('/tutor/profile',[loginTutorController::class,'tutorProfile']);
    Route::get('/tutor/profile/Learners',[loginTutorController::class,'learnerList']);
    Route::get('/tutor/profile/setting',[TutorController::class,'setting']);
});

Route::post('/forget-learner',[learnerResetPassword::class,'validatePasswordRequest']);

Route::group(['middleware'=>['loginAuthCheck']], function(){

    Route::get('/forget-learner', function () {
        return view('forget');
    });
    
    Route::get('/forget-tutor', function () {
        return view('tutorForget');
    });

    Route::get('/ ', function () {
        return view('home');
    });

    Route::get('/termAndCondition',[mainController::class,'termAndCondition']);
    Route::get('/signup-tutor',[TutorController::class,'index']);
    Route::get('/signup-learner',[LearnerController::class,'index']);
    Route::get('/sign-in',[loginController::class,'loginLearner']);

});

Route::get('/reset/{token}/{learner_email}',[LearnerController::class,'reset']);
Route::post('/reset/{token}/{learner_email}',[LearnerController::class,'resetPassword']);

Route::post('/forget-tutor',[tutorResetPassword::class,'validateTutorPasswordRequest']);
Route::get('/reset/tutor/{token}/{tutor_email}',[TutorController::class,'reset']);
Route::post('/reset/tutor/{token}/{tutor_email}',[TutorController::class,'resetPassword']);