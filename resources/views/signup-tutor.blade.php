<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sign-up Teacher</title>
		<!-- add icon link -->
        <link rel="icon" href="/assets/img/logo.png" type="image/x-icon"> 
		<!-- Bootstrap core CSS -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Main Style Css -->
       <link rel="stylesheet" href="assets/css/Signup.css">

        <!-- Styles -->
        <style>
            
        </style>
    </head>
    <body class="form-v10">
	<div class="page-content">
		<div class="form-v10-content">
			<form class="form-detail" enctype="multipart/form-data" action="{{route('tutor.store')}}" method="post" id="myform">
		
				<div class="form-left">
					<h2>Tutor Register </h2>
					
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
						<input type="text" name="tutor_username" class="user_name" id="teacher_id" placeholder="Enter User Name*" value="{{ old('tutor_username') }}" required>
						<span class="text-danger">@error('tutor_username'){{ $message }} @enderror</span>
					</div>

					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="tutor_firstname" id="first_name" class="input-text" placeholder="First Name*" required>
							<span class="text-danger">@error('tutor_firstname'){{ $message }} @enderror</span>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="tutor_lastname" id="last_name" class="input-text" placeholder="Last Name*" required>
							<span class="text-danger">@error('tutor_lastname'){{ $message }} @enderror</span>
						</div>
					</div>

					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="password" name="tutor_password" id="password" class="input-text" placeholder=" Enter Password*" required>
							<span class="text-danger">@error('tutor_password'){{ $message }} @enderror</span>
						</div>
						<div class="form-row form-row-2">
							<input type="password" name="tutor_confirm_password" id="confirm_password" class="input-text" placeholder="Confirm Password*" required>
							<span class="text-danger">@error('tutor_confirm_password'){{ $message }} @enderror</span>
						</div>
					</div>

					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="tutor_phone_number" id="phone_number" class="input-text" placeholder="Phone Number*" required>
							<span class="text-danger">@error('tutor_phone_number'){{ $message }} @enderror</span>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="tutor_year_of_experience" class="year_of_experience" id="year_of_experience" placeholder="Year Of Experience*" required>
							<span class="text-danger">@error('tutor_year_of_experience'){{ $message }} @enderror</span>
						</div>
					</div>

					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="tutor_age" id="age" class="input-text" placeholder="Enter Your Age*" required>
							<span class="text-danger">@error('tutor_age'){{ $message }} @enderror</span>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="tutor_gender" id="gender" class="input-gender" placeholder="Gender*" required>
							<span class="text-danger">@error('tutor_gender'){{ $message }} @enderror</span>
						</div>
					</div>

						<div class="form-row">
							<input type="text" name="tutor_designation" class="designation" id="designation" placeholder="Designation*" required>
							<span class="text-danger">@error('tutor_designation'){{ $message }} @enderror</span>
						</div>

						<div class="form-row">
							<input type="text" name="tutor_prefer_location" class="prefer_location" id="prefer_location" placeholder="Prefer Location*" required>
							<span class="text-danger">@error('tutor_prefer_location'){{ $message }} @enderror</span>
						</div>

						<div class="form-row">
							<input type="number" name="tutor_fees" class="tutor_fees" id="tutor_fees" placeholder="Enter your Tution Fees for One Hour*"  required>
							<span class="text-danger">@error('tutor_prefer_location'){{ $message }} @enderror</span>
						</div>
				</div>

				<div class="form-right">
					<h2>More Details</h2>
					
					<div class="form-row">
						<input type="text" name="tutor_subject" class="subject" id="subject" placeholder="Enter your desired subject*" required>
						<span class="text-danger">@error('tutor_subject'){{ $message }} @enderror</span>
					</div>

					<div class="form-row">
						<input type="text" name="tutor_class" class="class" id="class" placeholder="Enter your desired class*" required>
						<span class="text-danger">@error('tutor_class'){{ $message }} @enderror</span>
					</div>

					<div class="form-row">
						<input type="text" name="tutor_qualification" class="qualification" id="qualification" placeholder="Enter Your Qualification*" required>
						<span class="text-danger">@error('tutor_qualification'){{ $message }} @enderror</span>
					</div>
					
					<div class="form-row">
						<input type="text" name="tutor_city_name" class="City" id="city" placeholder="Enter your city Name*" required>
						<span class="text-danger">@error('tutor_city_name'){{ $message }} @enderror</span>
					</div>

					
					<div class="form-row">
						<input type="text" name="tutor_email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email*">
						<span class="text-danger">@error('tutor_email'){{ $message }} @enderror</span>
					</div>

					<div class="form-row">
							<label style="color:white;">Select Profile Image</label>
							<input type="file" name="tutor_profile_image" class="form-control" onchange="previewFile(this)" />
							<span class="text-danger">@error('tutor_profile_image'){{ $message }} @enderror</span>
							<img class="back" id="previewImg" alt="profile image" style="max-width:130px;margin-top:20px;" />		
					</div>

					<div class="form-checkbox">
						<label class="container"><p>I do accept the <a href="/termAndCondition" class="text">Terms and Conditions</a> of your site.</p>
						  	<input type="checkbox" name="checkbox">
						  	<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-row-last">
						
						<input type="submit" name="submit" class="register" value="Signup As Tutor"/>
						<span style="color:white">Already have an account?</span>
							<a href="/sign-in" class="register-link">Login Here</a>
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
	<script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
        
    </body>
</html>
