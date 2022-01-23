<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Student List</title>
<!-- add icon link -->
<link rel="icon" href="/assets/img/logo.png" type="image/x-icon"> 


<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  

<style>




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

/* Style the search box */
#mySearch {
  width: 100%;
  font-size: 18px;
  padding: 11px;
  border: 1px solid #ddd;
}
/* Style the navigation menu */
#myMenu {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

/* Style the navigation links */
#myMenu li a {
  padding: 12px;
  text-decoration: none;
  color: black;
  display: block
}

#myMenu li a:hover {
  background-color: #eee;
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
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Hire Requests<span class="caret"></span></a>
        <ul class="dropdown-menu">
        </ul>
      </li>
      <li><a href="/tutor/profile/setting">Update Information</a></li>
      <li><a href="/tutor/profile/Learners">Learner List</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Hello.. {{ $loggedTutorInfo['tutor_firstname'] }} {{ $loggedTutorInfo['tutor_lastname']}}</a></li>
      <li><a href="{{ route('tutor.logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search your learner..." title="Type in a category">
<ul id="myMenu">
@if(isset($learnerRequest))
@foreach($learnerRequest as $learner)
  <li><a href="#">{{$learner->learner_firstname}} from {{$learner->learner_city_name}}</a></li>
@endforeach
@endif

</ul>


<script>
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i;
  input = document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myMenu");
  li = ul.getElementsByTagName("li");

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>




<!-- Bootstrap core JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
</html>