<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>{{ $loggedLearnerInfo['learner_firstname'] }} {{ $loggedLearnerInfo['learner_lastname']}}</title>
<!-- add icon link -->
<link rel="icon" href="/assets/img/logo.png" type="image/x-icon"> 

		

        
      
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- Main Style Css -->
<link rel="stylesheet" href="/assets/css/Signup.css"> 
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<style>
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
      <li class=""><a href="/learner/profile">{{ $loggedLearnerInfo['learner_firstname'] }} </a></li>
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

     <div class="page-content2">
		<div class="form-v10-content2">
			<form class="form-detail"  enctype="multipart/form-data" action="/learner/profile/setting/{{$loggedLearnerInfo['learner_id']}}" method="post" id="myform">
				
				<div class="form-left">
					<h2>Learner Update Your Info </h2>

					@if(Session::get('success'))
					<div class="alert alert-success">
						{{Session::get('success')}}
					</div>
					@endif

					@if(Session::get('fail'))
					<div class="alert alert-danger">
						{{Session::get('fail')}}
					</div>
					@endif

					@csrf
					<input type="hidden" name="learner_id" value="{{$loggedLearnerInfo['learner_id']}}" readonly/>
					<div class="form-row">
						<input type="text" name="learner_username" class="user_name" id="input-text" placeholder="Enter User Name*" value="{{$loggedLearnerInfo['learner_username']}}" readonly>
						<span class="text-danger">You Cannot Change Your Username @error('learner_username'){{ $message }} @enderror</span>
					</div>
					
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="learner_firstname" id="first_name" class="input-text" placeholder="First Name*" value="{{$loggedLearnerInfo['learner_firstname']}}" required>
							<span class="text-danger">@error('learner_firstname'){{ $message }} @enderror</span>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="learner_lastname" id="last_name" class="input-text" placeholder="Last Name*" value="{{$loggedLearnerInfo['learner_lastname']}}" required>
							<span class="text-danger">@error('learner_lastname'){{ $message }} @enderror</span>
						</div>	
					</div>

					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="learner_phone_number" id="phone_number" class="input-text" placeholder="Phone Number*" value="{{$loggedLearnerInfo['learner_phone_number']}}" required>
							<span class="text-danger">@error('learner_phone_number'){{ $message }} @enderror</span>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="learner_class" class="class" id="input-text" placeholder="Enter Your Class*" value="{{$loggedLearnerInfo['learner_class']}}" required>
							<span class="text-danger">@error('learner_class'){{ $message }} @enderror</span>
						</div>
					</div>

					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="learner_age" id="age" class="input-text" placeholder="Enter Your Age*" value="{{$loggedLearnerInfo['learner_age']}}" required>
							<span class="text-danger">@error('learner_age'){{ $message }} @enderror</span>
						</div>
						<div class="form-row form-row-2">
                        	<input type="text" name="learner_gender" id="gender" placeholder="Gender*" value="{{$loggedLearnerInfo['learner_gender']}}" required>
							<span class="text-danger">@error('learner_gender'){{ $message }} @enderror</span>
						</div>
					</div>

						<div class="form-row">
							<input type="text" name="learner_institude" class="institude" id="institude" placeholder="Institude*" value="{{$loggedLearnerInfo['learner_institude']}}" required>
							<span class="text-danger">@error('learner_institude'){{ $message }} @enderror</span>
						</div>

						<div class="form-row">
							<input type="text" name="learner_address" class="address" id="address" placeholder="Enter your house Address*" value="{{$loggedLearnerInfo['learner_address']}}" required>
							<span class="text-danger">@error('learner_address'){{ $message }} @enderror</span>
						</div>
				</div>

				<div class="form-right">

					<h2>More Details</h2>

					<div class="form-row">
						<input type="text" name="learner_prefer_location" class="address" id="Prefer Location" placeholder="Prefer Location*" title="Enter your town name" value="{{$loggedLearnerInfo['learner_prefer_location']}}" required>
						<span class="text-danger">@error('learner_prefer_location'){{ $message }} @enderror</span>
					</div>

					<div class="form-row">
						<input type="text" name="learner_parent_phone_number" class="parent_number" id="parent_number" required pattern="{0,9}" placeholder="Parent Phone Number*" value="{{$loggedLearnerInfo['learner_parent_phone_number']}}" required>
						<span class="text-danger">@error('learner_parent_phone_number'){{ $message }} @enderror</span>
					</div>
					
					<div class="form-row">
						<input type="text" name="learner_city_name" class="city_name" id="city_name" placeholder="City Name*" value="{{$loggedLearnerInfo['learner_city_name']}}" required>
						<span class="text-danger">@error('learner_city_name'){{ $message }} @enderror</span>
					</div>

					<div class="form-row">
						<input type="text" name="learner_email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{0,9}" value="{{$loggedLearnerInfo['learner_email']}}" placeholder="Your Email*">
						<span class="text-danger">@error('learner_email'){{ $message }} @enderror</span>
					</div>
					
					<div class="form-row">
							<label style="color:white;">Select Profile Image</label>
							<input type="file" name="learner_profile_image" class="form-control" onchange="previewFile(this)" value="{{$loggedLearnerInfo['learner_profile_image']}}" />
							<span class="text-danger">@error('learner_profile_image'){{ $message }} @enderror</span>
							<img class="back" id="previewImg" alt="profile image*" style="max-width:130px;margin-top:20px;" />		
					</div>

					
					<div class="form-row-last">
						<input type="submit" name="submit" class="register" value="Save Changes">
					</div>
                    
				</div>
			</form>
		</div>
	</div>

	
	<script>
	//validation of password	
		var password = document.getElementById("password"), confirm_password = document.getElementById("confirm_password");
		
		function validatePassword(){
			if(password.value != confirm_password.value) {
				confirm_password.setCustomValidity("Passwords Don't Match");
			} else {
				confirm_password.setCustomValidity('');
			}
		}

		password.onchange = validatePassword;
		confirm_password.onkeyup = validatePassword;
	</script>
	
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
	
	<!-- Bootstrap core JavaScript -->
	<script src="/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>



</body>
</html>