<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reset Password</title>
        <!-- add icon link -->
        <link rel="icon" href="/assets/img/logo.png" type="image/x-icon"> 
        <!-- Bootstrap core CSS -->
        <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="/assets/css/Sign-In.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
           
        </style>
    </head>
    <body>
    <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Reset Your Password</h3>
                    <h4>{{$tutor->tutor_email}}</h4>
                    <form action="/reset/tutor/{{$code->token}}/{{$tutor->tutor_email}}" method="post">
                    @csrf
                    @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                        </div>
                    @endif

                    @if(Session::get('success'))
                    <span class="alert alert-success">
                        {{Session::get('success')}}
                        </span>
                    @endif
                    @csrf
                        <input type="hidden" name="tutor_id" value="{{$tutor->tutor_id}}" readonly>
                        <div class="form-group">
                            <input type="password" class="form-control" name="tutor_password" placeholder="Enter Your new password*"  required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="tutor_confirm_password" placeholder="Enter Your Confirm password*"  required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Reset Password" />
                        </div>

                    </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>HELP SERVICES</h3>
                    <form>
                        <div class="col-md-11 login-form-1">
                            <a href="#" class="text-white"> Contact # +92-311-2326525 & TutorPoint.HelpLine@gmail.com <br> Contact # +92-315-3733295 & TutorPoint.Forget@gmail.com    
                        </div>
                        <footer class="my-5 pt-5 text-muted text-center text-small">
                            <p class="text-white">&copy; 2020-2021 TUTOR POINT</p>  
                        </footer>
                       
                    </form>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript -->
         <script src="assets/vendor/jquery/jquery.min.js"></script>
         <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

         <!-- Plugin JavaScript -->
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    </body>
</html>
