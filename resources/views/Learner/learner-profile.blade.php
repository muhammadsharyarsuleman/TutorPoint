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
</style>
</head>
<body>
<nav class="navbar navbar-inverse" >
  <div class="container-fluid">
    <div class="navbar-header">
      <center>
      <ul class="nav navbar-nav">
      <li><img src="/assets/img/logo.png" style="width: 2em; height: 2em; margin:10px;"/></li>
      <li><a class="navbar-brand" href="#" ><span style="color:white">TUTOR</span><span style="color:#0f5298;">POINT</span></a></li>
      </ul> 
      </center>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="/learner/profile">{{ $loggedLearnerInfo['learner_firstname'] }} </a></li>
      <li class=""><a href="/learner/profile/search">Find Tutors</a></li>
      <li><a href="/learner/profile/setting">Update Information</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-bell"></i>{{$notificationCount}} <span class="caret"></span></a>
        <ul class="dropdown-menu">
        @foreach($tutorRequest as $tutor)
        <li><a href="">{{$tutor->tutor_firstname}}  Reply you : {{$tutor->reply_message}} Response {{{$tutor->status}}}ed </a>
        @endforeach
        
        </li>
        </ul>
    </li>

      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Hello.. {{ $loggedLearnerInfo['learner_firstname'] }} {{ $loggedLearnerInfo['learner_lastname']}}</a></li>
      <li><a href="{{ route('learner.logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
     <!-- Add icon library -->

<div class="card">
  <img src="{{ asset('learners')}}/{{ $loggedLearnerInfo['learner_profile_image'] }}" alt="{{$loggedLearnerInfo['learner_lastname']}}" style="width:30%; height:30%; padding:10px; margin-top:10px; border-radius:20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
  <h1>{{ $loggedLearnerInfo['learner_firstname'] }} {{ $loggedLearnerInfo['learner_lastname']}}</h1>
  <p class="title">{{ $loggedLearnerInfo['learner_class'] }}</p>
  <hr>
  <p>{{ $loggedLearnerInfo['learner_institude'] }}</p>
  <p>{{ $loggedLearnerInfo['learner_phone_number'] }}</p>
  <p>{{ $loggedLearnerInfo['learner_address'] }}</p>
  <br>
  
</div>

<!-- Bootstrap core JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
</html>