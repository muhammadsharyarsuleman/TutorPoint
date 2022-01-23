<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>{{ $loggedLearnerInfo['learner_firstname'] }} {{ $loggedLearnerInfo['learner_lastname']}}</title>
<!-- add icon link -->
<link rel="icon" href="/assets/img/logo.png" type="image/x-icon"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  

<style>


.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 500px;
  margin: auto;
  text-align: center;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}

/* Rating CSS*/
.tutor_ratings .rating_submit {
    padding: 8px 30px;
    display: inline-block;
    background-color: #039be5;
    color: #fff;
    border: none;
    cursor: pointer;
}
.rating_submit_inner {
    display: block;
    direction: rtl;
    unicode-bidi: bidi-override;
    text-align: center;
}
.rating_submit_inner .star {
    display: none;
}
.rating_submit_inner label {
    color: lightgray;
    display: inline-block;
    font-size: 60px;
    margin: 0 -2px;
    transition: transform .15s ease;
    cursor: pointer;
}
.rating_submit_inner label:hover {
    transform: scale(1.35, 1.35);
}
.rating_submit_inner label:hover,
.rating_submit_inner label:hover ~ label {
    color: orange;
}
.rating_submit_inner .star:checked ~ label {
    color: orange;
}
.tutor_ratings .fa {
    color: #ff9800;
}
.tutor_ratings .fa.light {
    color: #d3d3d3;
}

/* Comment Review */
.commentcontainer {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.commentcontainer img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.time-right {
  float: right;
  color: #aaa;
}
</style>
</head>
<body>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <center>
      <ul class="nav navbar-nav">
      <li><img src="/assets/img/logo.png" style="width: 2em; height: 2em; margin:10px;"/></li>
      <li><a class="navbar-brand" href="#"><span style="color:white">TUTOR</span> <span style="color:#0f5298;">POINT</span></a></li>
      </ul> 
      </center>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="/learner/profile">{{ $loggedLearnerInfo['learner_firstname'] }}</a></li>
      <li class=""><a href="/learner/profile/search">Find Tutors</a></li>
      <li><a href="/learner/profile/setting">Update Information</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Hello.. {{ $loggedLearnerInfo['learner_firstname'] }} {{ $loggedLearnerInfo['learner_lastname']}}</a></li>
      <li><a href="{{ route('learner.logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
     <!-- Add icon library -->

     

<div class="card">
        @if(Session::get('successRequest'))
					<div class="alert alert-success">
          {{Session::get('successRequest')}}
					</div>
					@endif

					@if(Session::get('failRequest'))
					<div class="alert alert-danger">
          {{Session::get('failRequest')}}
					</div>
					@endif
  <img src="{{ asset('tutors')}}/{{$tutorOtherInfo->tutor_profile_image}}" alt="" style="width:30%; height:30%; padding:10px; margin-top:10px; border-radius:20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
  <h1>
  @if(isset($tutorOtherInfo))
  
  {{$tutorOtherInfo->tutor_firstname}} {{$tutorOtherInfo->tutor_lastname}}
  @endif
 
  </h1>
  <p class="title"><span class="glyphicon glyphicon-briefcase"></span> {{$tutorOtherInfo->tutor_designation}}</p>
  <p class="title">Tution Fees : {{$tutorOtherInfo->tutor_fees}} Rupees per hour</p>
  <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal" href="">Hire Me</a>
  <a class="btn btn-primary" data-toggle="collapse" data-target="#demo">Details</a>
  <hr>
  <b>
  <div id="demo" class="collapse">
  <p><span class="glyphicon glyphicon-education"></span> {{$tutorOtherInfo->tutor_qualification}}</p>
  <p><span class="glyphicon glyphicon-phone"></span>  {{$tutorOtherInfo->tutor_phone_number}}</p>
  <p><span class="glyphicon glyphicon-envelope"></span> {{$tutorOtherInfo->tutor_email}}</p>
  <p><i class="fa fa-intersex"></i> {{$tutorOtherInfo->tutor_gender}}</p>
  <p>Age : {{$tutorOtherInfo->tutor_age}}</p>
  <p>Prefer Location : {{$tutorOtherInfo->tutor_prefer_location}}</p>
  <p>City : {{$tutorOtherInfo->tutor_city_name}}</p>
  <p>Subject : {{$tutorOtherInfo->tutor_subject}}</p>
  <p>Experience : {{$tutorOtherInfo->tutor_year_of_experience}}</p>
  <p>Level I Can Teach : {{$tutorOtherInfo->tutor_class}}</p>
  </div>
  </b>
  <hr>
  
 
    <div>

        <h1 style="">{{round($tutorRatingAverage,1)}}/5</h1>
        <p><a href="#review">{{$tutorRatingCount}} Learner Ratings (Reviews)</a></p>
    </div>
  
    

<div class="tutor_ratings">
    <form action="/learner/profile/search/{tutor_id}" enctype="multipart/form-data" method="POST">
      @csrf
  <input type="hidden" name="rating_tutor_id" value="{{$tutorOtherInfo->tutor_id}}"/>
  <input type="hidden" name="rating_learner_id" value="{{$loggedLearnerInfo->learner_id}}"/>

                    <div class="rating_submit_inner">
                        <input id="radio1" type="radio" name="rating_value" value="5" class="star"/>
                        <label for="radio1">&#9733;</label>
                        <input id="radio2" type="radio" name="rating_value" value="4" class="star"/>
                        <label for="radio2">&#9733;</label>
                        <input id="radio3" type="radio" name="rating_value" value="3" class="star"/>
                        <label for="radio3">&#9733;</label>
                        <input id="radio4" type="radio" name="rating_value" value="2" class="star"/>
                        <label for="radio4">&#9733;</label>
                        <input id="radio5" type="radio" name="rating_value" value="1" class="star"/>
                        <label for="radio5">&#9733;</label>
                    </div>
                    <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                    </div>
                  
                       <button class="btn btn-success" type="Submit">Submit Review</button>
                    
            </form>
</div>
  
  <hr>
  <!-- Review of Learners -->
  
  @foreach($tutorRating as $rating)
 
  
  <div class="commentcontainer" id="review">
  <img src="{{ asset('learners')}}/{{$rating->learner_profile_image}}" alt="Avatar" style="width:100%;">
  <p>{{$rating->rating_value}}/5 - {{$rating->learner_firstname}} {{$rating->learner_lastname}} Student of {{$rating->learner_institude }}</p>
  <p>{{$rating->Comment}}</p>
  <span class="time-right">{{$rating->created_at}}</span>
  <br>
  </div>
  @endforeach

</div>
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tutor point</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/learner/profile/search/request/{{$tutorOtherInfo->tutor_id}}" enctype="multipart/form-data" method="POST" id="myform">		
        @csrf
      <div class="comment-box text-center">
    
        <input type="number" name="request_tutor_id" style="display:none" value="{{$tutorOtherInfo->tutor_id}}"/>
        <input type="number" name="request_learner_id" style="display:none" value="{{$loggedLearnerInfo->learner_id}}"/>
        <div class="comment-area"> <input type="text" name="message" class="form-control" placeholder="Say Assalam u Alaikum Ustaad" ></div>
        <input type="text" name="status" style="display:none" value="Pending"/>
      </div>
      
      <div class="modal-footer">
      </div>
        <button  class="btn btn-success"  type="Submit"/>Send Request</button>
      </form>
    </div>
  </div>
</div>
<!-- Bootstrap core JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom JavaScript for this theme -->
<script src="/assets/js/scrolling-nav.js"></script>

</body>
</html>