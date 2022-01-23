<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>{{ $loggedTutorInfo['tutor_firstname'] }} {{ $loggedTutorInfo['tutor_lastname']}}</title>
<!-- add icon link -->
<link rel="icon" href="/assets/img/logo.png" type="image/x-icon"> 
<!-- Main Style Css -->
<link rel="stylesheet" href="/assets/css/Signup.css">


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
      <li><a href="/tutor/profile/setting" >Update Information</a></li>
      <li><a href="/tutor/profile/Learners">Learner List {{$notificationCount2}}</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Hello.. {{ $loggedTutorInfo['tutor_firstname'] }} {{ $loggedTutorInfo['tutor_lastname']}}</a></li>
      <li><a href="{{ route('tutor.logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="page-content2">
		<div class="form-v10-content2">
			<form class="form-detail" enctype="multipart/form-data" action="/tutor/profile/setting/{{$loggedTutorInfo['tutor_id']}}" method="post" id="myform">
		
				<div class="form-left">
					<h2>Update your Information </h2>
					
					@if(Session::get('success'))
					<div class="alert alert-success">
						{{Session::get('success')}}
					</div>
					@endif

					@if(Session::get('fail'))
					<div class="alert alert-danger">
						{{Session::get('fail')}}
					<div>
					@endif

					@csrf

					<div class="form-row">
						<input type="text" name="tutor_username" class="user_name" id="teacher_id" placeholder="Enter User Name*" value="{{ $loggedTutorInfo['tutor_username'] }}" readonly>
						<span class="text-danger">You Cannot Change Your Username @error('learner_username'){{ $message }} @enderror</span>
					</div>

					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="tutor_firstname" id="first_name" class="input-text" placeholder="First Name*" value="{{ $loggedTutorInfo['tutor_firstname'] }}" required>
							<span class="text-danger">@error('tutor_firstname'){{ $message }} @enderror</span>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="tutor_lastname" id="last_name" class="input-text" placeholder="Last Name*" value="{{ $loggedTutorInfo['tutor_lastname'] }}" required>
							<span class="text-danger">@error('tutor_lastname'){{ $message }} @enderror</span>
						</div>
					</div>

					

					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="tutor_phone_number" id="phone_number" class="input-text" placeholder="Phone Number*" value="{{ $loggedTutorInfo['tutor_phone_number'] }}" required>
							<span class="text-danger">@error('tutor_phone_number'){{ $message }} @enderror</span>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="tutor_year_of_experience" class="year_of_experience" id="year_of_experience" placeholder="Year Of Experience*" value="{{ $loggedTutorInfo['tutor_year_of_experience'] }}" required>
							<span class="text-danger">@error('tutor_year_of_experience'){{ $message }} @enderror</span>
						</div>
					</div>

					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="tutor_age" id="age" class="input-text" placeholder="Enter Your Age*" value="{{ $loggedTutorInfo['tutor_age'] }}" required>
							<span class="text-danger">@error('tutor_age'){{ $message }} @enderror</span>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="tutor_gender" id="gender" class="input-gender" placeholder="Gender*" value="{{ $loggedTutorInfo['tutor_gender'] }}" required>
							<span class="text-danger">@error('tutor_gender'){{ $message }} @enderror</span>
						</div>
					</div>

						<div class="form-row">
							<input type="text" name="tutor_designation" class="designation" id="designation" placeholder="Designation*" value="{{ $loggedTutorInfo['tutor_designation'] }}" required>
							<span class="text-danger">@error('tutor_designation'){{ $message }} @enderror</span>
						</div>

						<div class="form-row">
							<input type="text" name="tutor_prefer_location" class="prefer_location" id="prefer_location" placeholder="Prefer Location*" value="{{ $loggedTutorInfo['tutor_prefer_location'] }}" required>
							<span class="text-danger">@error('tutor_prefer_location'){{ $message }} @enderror</span>
						</div>

                        <div class="form-row">
							<input type="text" name="tutor_fees" class="tutor_fees" id="tutor_fees" placeholder="Enter your Tution Fees for One Hour*" value="{{ $loggedTutorInfo['tutor_fees'] }}" required>
							<span class="text-danger">@error('tutor_prefer_location'){{ $message }} @enderror</span>
						</div>
				</div>

				<div class="form-right">
					<h2>More Details</h2>
					
					<div class="form-row">
						<input type="text" name="tutor_subject" class="subject" id="subject" placeholder="Enter your desired subject*" value="{{ $loggedTutorInfo['tutor_subject'] }}" required>
						<span class="text-danger">@error('tutor_subject'){{ $message }} @enderror</span>
					</div>

					<div class="form-row">
						<input type="text" name="tutor_class" class="class" id="class" placeholder="Enter your desired class*" value="{{ $loggedTutorInfo['tutor_class'] }}" required>
						<span class="text-danger">@error('tutor_class'){{ $message }} @enderror</span>
					</div>

					<div class="form-row">
						<input type="text" name="tutor_qualification" class="qualification" id="qualification" placeholder="Enter Your Qualification*" value="{{ $loggedTutorInfo['tutor_qualification'] }}" required>
						<span class="text-danger">@error('tutor_qualification'){{ $message }} @enderror</span>
					</div>
					
					<div class="form-row">
						<input type="text" name="tutor_city_name" class="City" id="city" placeholder="Enter your city Name*" value="{{ $loggedTutorInfo['tutor_city_name'] }}" required>
						<span class="text-danger">@error('tutor_city_name'){{ $message }} @enderror</span>
					</div>

					
					<div class="form-row">
						<input type="text" name="tutor_email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" value="{{ $loggedTutorInfo['tutor_email'] }}" placeholder="Your Email*">
						<span class="text-danger">@error('tutor_email'){{ $message }} @enderror</span>
					</div>

					<div class="form-row">
							<label style="color:white;">Select Profile Image</label>
							<input type="file" name="tutor_profile_image" class="form-control" onchange="previewFile(this)" />
							<span class="text-danger">@error('tutor_profile_image'){{ $message }} @enderror</span>
							<img class="back" id="previewImg" alt="profile image" style="max-width:130px;margin-top:20px;" />		
					</div>

					<div class="form-row-last">
						<input type="submit" name="submit" class="register" value="Save Changes"/>
					</div>

				</div>
			</form>
			
		</div>
	</div>
	
	
	
	<script>
	//image preview
		function previewFile(input){
			var file=$("input[type=file]").get(0).files[0];
			if(file)
			{
				var reader = new FileReader();
				reader.onload=function(){
					$('#previewImg').attr("src",reader.result);
				}
				reader.readAsDataURL(file);
			}
		}
	</script>
   
     




<script>

  function myFunction() {
  document.getElementById("status").value="Accept";
  
}
function myFunction2() {
  document.getElementById("status").value="Reject";
  
}
</script>
<!-- Bootstrap core JavaScript -->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
</html>