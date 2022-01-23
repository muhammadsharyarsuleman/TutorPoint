<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>{{ $loggedTutorInfo['tutor_firstname'] }} {{ $loggedTutorInfo['tutor_lastname']}}</title>
<!-- add icon link -->
<link rel="icon" href="/assets/img/logo.png" type="image/x-icon"> 


<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

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


</style>
</head>
<body>
<nav class="navbar navbar-inverse" >
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
      <li class=""><a href="/tutor/profile">{{ $loggedTutorInfo['tutor_firstname'] }} </a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Hire Requests {{$notificationCount}}<span class="caret"></span></a>
        <ul class="dropdown-menu">
        @if(isset($learnerRequest))
        @foreach($learnerRequest as $learner)
        
        <li><a href="">{{$learner->learner_firstname}} {{$learner->learner_lastname}}  Request you :   {{ $learner->message }}</a>
        <form action="/tutor/profile/{{$learner->request_id}}" enctype="multipart/form-data" method="POST" id="myform">
        @csrf
        <input type="number" name="request_tutor_id" style="display:none" value="{{ $loggedTutorInfo['tutor_id'] }}"/>
        <input type="number" name="request_learner_id" style="display:none" value="{{$learner->learner_id}}"/>
        
        <label>Reply :</label><br>
        <input type="text" placeholder="Reply or not to Learner then press Accept or Reject Button" name="replyMessage" style="width:100%;">
      
        <div style="display:block">
        <button class="btn btn-success" style="width:50%" name="status" value="Accept">Accept</button>
        <button class="btn btn-danger" style="width:50%"  name="status" value="Reject">Reject</button>
        </div>
        <hr>
        </li>
        </form>

        @endforeach
        @endif
        </ul>
      </li>
      <li><a href="/tutor/profile/setting">Update Information</a></li>
      <li><a href="/tutor/profile/Learners">Learner List {{$notificationCount2}}</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Hello.. {{ $loggedTutorInfo['tutor_firstname'] }} {{ $loggedTutorInfo['tutor_lastname']}}</a></li>
      <li><a href="{{ route('tutor.logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
     

   
     
     <!-- Add icon library -->

<div class="card">
  <img src="{{ asset('tutors')}}/{{ $loggedTutorInfo['tutor_profile_image'] }}" alt="{{$loggedTutorInfo['tutor_lastname']}}" style="width:30%; height:30%; padding:10px; margin-top:10px; border-radius:20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
  <h1>{{ $loggedTutorInfo['tutor_firstname'] }} {{ $loggedTutorInfo['tutor_lastname']}}</h1>
  <p class="title"><span class="glyphicon glyphicon-briefcase"></span> {{ $loggedTutorInfo['tutor_designation'] }}</p>
  <hr>
  <b>

  <p><span class="glyphicon glyphicon-education"></span> {{ $loggedTutorInfo['tutor_qualification'] }}</p>
  <p><span class="glyphicon glyphicon-phone"></span>  {{ $loggedTutorInfo['tutor_phone_number'] }}</p>
  <p><span class="glyphicon glyphicon-envelope"></span> {{ $loggedTutorInfo['tutor_email'] }}</p>
  <p><i class="fa fa-intersex"></i> {{ $loggedTutorInfo['tutor_gender'] }}</p>
  <p>Age : {{ $loggedTutorInfo['tutor_age'] }}</p>
  <p>Prefer Location : {{ $loggedTutorInfo['tutor_prefer_location'] }}</p>
  <p>City : {{ $loggedTutorInfo['tutor_city_name'] }}</p>
  <p>Subject : {{ $loggedTutorInfo['tutor_subject'] }}</p>
  <p>Experience : {{ $loggedTutorInfo['tutor_year_of_experience'] }}</p>
  <p>Level I Can Teach : {{ $loggedTutorInfo['tutor_class'] }}</p>
  <br>
  </b>
  
</div>


<script>

  function myFunction() {
  document.getElementById("status").value="Accept";
  
}
function myFunction2() {
  document.getElementById("status").value="Reject";
  
}
</script>

<!-- Bootstrap core JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
</html>