<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TUTOR POINT</title>
         <!-- add icon link -->
        <link rel="icon" href="/assets/img/logo.png" type="image/x-icon"> 
        <!-- Bootstrap core CSS -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="assets/css/scrolling-nav.css" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            
            .button {
      text-align: Center;
      border-radius: 10px;
      background-color: #0f5298;
      transition-duration: 0.4s;
}

.button:hover {
  background-color: #2565AE;
  color: white;
}

li{
  padding: 5px;
}


/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

.container {
  padding: 16px;
}


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: white; /* Fallback color */
   /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: white;
  margin: 8% auto 10% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }

}

/* Button for Sign Up */
.button-Signup {
  display: inline-block;
  border-radius: 4px;
  background-color: #0f5298;;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 18px;
  padding: 20px;
  width: 98%;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
 
}

.button-Signup span {
  cursor: pointer;
  display: block;
  position: relative;
  transition: 0.5s;
}

.button-Signup span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button-Signup:hover span {
  padding-right: 25px;
}

.button-Signup:hover span:after {
  opacity: 1;
  right: 0;
}
/* End */


        </style>
    
</head>
    <body id="page-top">
    <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <img src="/assets/img/logo.png" style="width: 5%; height: 5%; align-content: left; margin-right: 10px;">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><strong>TUTORS <span style="color:#0f5298;">POINT</span></strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive" style="font-size:20px;">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#managementTeam">Management Team</a>
          </li>
          <li class="nav-item">
            <a  Class="nav-link button" href="/sign-in">Sign In</a>
          </li>
          <li class="nav-item">
            <a onclick="document.getElementById('id01').style.display='block'" class="nav-link button">Sign Up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class=" text-white" style="background-color: #0f5298;">
    <center><img src="/assets/img/logo.jpg" style="width: 15%; box-shadow: 10px 10px 5px #2565AE"  ></center>
    <div class="container text-center" style="background-color: #0f5298;">
      <h1>Welcome to Tutors Point</h1>
      <p class="lead">Quality Educational Service Provider</p>
    </div>

<!--<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>-->

<div id="id01" class="modal">
    <div id="id01" class="modal-content animate" >
  
        <div class="imgcontainer">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
           <img src="assets/img/logo.png" style="width:10%; height: 10%; box-shadow: 10px 10px 5px #2565AE;">
         </div>
  
             <a href="/signup-tutor"><button class="button-Signup"><span>Sign Up as Tutor</span></button></a>
             <a href="/signup-learner"><button class="button-Signup"><span>Sign Up as Learner</span></button></a>

    </div>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>About this page</h2>
          <p class="lead">We are providing Quality Educational Services to Our Students All Around the Country with Our Best Faculty Staff 
          Who are Providing Best Education to the Students.</p>
          <ul>
            <li>Tutor Servies</li>
            <li>With in your home town</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Services we offer</h2>
          <p class="lead">Simple Hiring Process</p>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Contact us</h2>
          <p class="lead">Contact : +92 311 2326525</p>
          <p class="lead">Email : mohammadsharyarsuleman@gmail.com</p>
        </div>
      </div>
    </div>
  </section>

  <section id="managementTeam">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Management Team</h2>
          
               <!--Grid row-->
    <div class="row text-center">

                <!--Grid column-->
                <div class="col-md-6 mb-4">

                  <h5 class="my-5 h5">Mr. Muhammad Sharyar</h5>
                  <h6 class="my-5 h6">CEO & Founder</h6>

                  <img class="rounded-circle z-depth-2" style="width:10em; height:10em" src="/assets/img/Sharyar.jpg"
                    data-holder-rendered="true">

                </div>
                <!--Grid column-->
              

                <!--Grid column-->
                <div class="col-md-6 mb-4">

                <h5 class="my-5 h5">Mr. Faizullah Mughal</h5>
                <h6 class="my-5 h6">Chief Operating Officer</h6>

                  <img class="rounded-circle z-depth-2"  style="width:10em; height:10em" src="/assets/img/Faiz.jpg"
                    data-holder-rendered="true">

                </div>
                <!--Grid column-->

                </div>
                <!--Grid row-->

        </div>
      </div>
    </div>
  </section>

@include('footer')


 <!-- Bootstrap core JavaScript -->
 <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="assets/js/scrolling-nav.js"></script>
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  
</body>
    
</html>
