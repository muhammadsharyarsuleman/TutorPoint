<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Log In</title>
        <!-- add icon link -->
        <link rel="icon" href="/assets/img/logo.png" type="image/x-icon"> 
        <!-- Bootstrap core CSS -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        

        <link rel="stylesheet" href="assets/css/Sign-In.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <style>
        .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #0f5298;
}

input:focus + .slider {
  box-shadow: 0 0 1px #0f5298;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}
.p{
    font-weight:bold;
}

.toggle{
    
    color:white;
    padding-left:10px;
    padding-top:8px;
    border-radius:10px;
    margin:5px;
    
    /*text-align:center;*/
    font-size:20px;
    box-shadow: 0px 4px 8px 4px rgba(0, 0, 0, 0.2);
}
         
        </style>
    </head>
    <body onload="myFunction2()">
        
    <div class="container login-container">
            <div class="row">
            <div class="container login-container">
            <div class="toggle" id="togg" style="background-color:#0f5298;, color:white;">
            <span class="p" style="padding-left:10px;">TUTOR</span>
            <label class="switch">
            <input type="checkbox" id="myCheck" onClick="myFunction()">
            <span class="slider"></span>
            </label>
            <span class="p">LEARNER</span>
            </div>
            <div class="row">
            <!--Tutor Form-->
                <div class="col-md-6 login-form-1" id="Tutor" style="display:block">
                    <h3 style="color:#0f5298;">Tutor Login</h3>
                    <form action="{{route('tutor.check')}}" method="POST">
                    @if(Session::get('successTutor'))
                        <div class="alert alert-success">
                            {{ Session::get('successTutor') }}
                        </div>
                    @endif
                    @if(Session::get('failTutor'))
                        <div class="alert alert-danger">
                            {{ Session::get('failTutor') }}
                        </div>
                    @endif
                        @csrf
                        <div class="form-group">
                            <input type="text" name="tutor_username" class="form-control" placeholder=" Enter Username *" value="" />
                            <span class="text-danger">@error('tutor_username'){{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <input type="password" name="tutor_password" class="form-control" placeholder="Enter Password *" value="" />
                            <span class="text-danger">@error('tutor_password'){{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Tutor Login" />
                        </div>
                        <div class="form-group">
                            <a href="/forget-tutor" class="ForgetPwd">Forget Password?</a>
                        </div>
                        <div class="text">Don't have an account?
							<a href="/signup-tutor" class="register-link">Register here</a>
                        </div>
                       
                    </form>
                </div>
                <!-- Learner Message -->
                <div class="col-md-6 login-form-1" id="Tutor2" style="display:none">
                <center><img src="/assets/img/logo.jpg" style="width: 30%; box-shadow: 10px 10px 5px #2565AE"  ><br><br>
                   <H1 style="color:#0f5298;">HI LEARNER</H1></center>
                </div>
                <!-- Learner Form -->
                <div class="col-md-6 login-form-2" id="Learner" style="display:none">
                    <h3>Learner Login</h3>
                    <form action="{{route('learner.check')}}" method="POST">
                    @if(Session::get('successLearner'))
                    <script>
                    var triggered=true;
                    </script>
                        <div class="alert alert-success">
                            {{ Session::get('successLearner') }}
                        </div>
                    @endif
                    @if(Session::get('failLearner'))
                    <script>
                    var triggered=true;
                    </script>
                        <div class="alert alert-danger">
                            {{ Session::get('failLearner') }}
                        </div>
                    @endif
                    @csrf
                        <div class="form-group">
                            <input type="text" name="learner_username" class="form-control" placeholder="Enter Username *" value="" required/>
                            <span class="text-danger">@error('learner_username'){{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <input type="password" name="learner_password" class="form-control" placeholder="Enter Password *" value="" required/>
                            <span class="text-danger">@error('learner_password'){{ $message }} <script>
                    var triggered=true;
                    </script> @enderror</span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Learner Login" />
                        </div>
                        <div class="form-group">

                            <a href="/forget-learner" class="ForgetPwd" value="Login">Forget Password? </a>
                        </div>
                        <div class="text-white">Don't have an account?
							<a href="/signup-learner" class="register-link text-white"> Register here</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 login-form-2" id="Learner2" style="display:block">
                <center><img src="/assets/img/logo.jpg" style="width: 30%; box-shadow: 10px 10px 5px #2565AE"  ><br><br>
                   <H1 style="color:white;">HI TUTOR</H1></center>
                </div>
            </div>
        </div>

        <script>
        function myFunction2(){
            var checkBox = document.getElementById("myCheck");
            // Get the output text
            var tutor = document.getElementById("Tutor");
            var tutor2 = document.getElementById("Tutor2");
            var learner = document.getElementById("Learner");
            var learner2 = document.getElementById("Learner2");
            var togg = document.getElementById("togg");
            if(triggered){
                checkBox.checked=true;  
                tutor.style.display = "none";
                tutor2.style.display ="block";
                learner.style.display="block";
                learner2.style.display="none";
                togg.style.backgroundColor="white";
                togg.style.color="#0f5298"
            }else{
                tutor.style.display = "block";
                tutor2.style.display ="none";
                learner.style.display="none";
                learner2.style.display="block";
                togg.style.backgroundColor="#0f5298";
                togg.style.color="white";
            }
        }
        function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var tutor = document.getElementById("Tutor");
  var tutor2 = document.getElementById("Tutor2");
  var learner = document.getElementById("Learner");
  var learner2 = document.getElementById("Learner2");
  var togg = document.getElementById("togg");
  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    tutor.style.display = "none";
    tutor2.style.display ="block";
    learner.style.display="block";
    learner2.style.display="none";
    togg.style.backgroundColor="white";
    togg.style.color="#0f5298"
  } else {
    tutor.style.display = "block";
    tutor2.style.display ="none";
    learner.style.display="none";
    learner2.style.display="block";
    togg.style.backgroundColor="#0f5298";
    togg.style.color="white";
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
