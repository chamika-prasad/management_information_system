<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Free_Learning_Application</title>
</head>
<style>

input[type=email], input[type=password]{
   width: 100%;
   font-size: 15px;
   padding: 15px;
   margin: 5px 0 22px 0;
   display: inline-block;
   border:2px solid black;
   background: #f1f1f1;
}
label{
   font-size: 15px;
   font-weight:bold;
}
input[type=email]:focus, input[type=password]:focus {
   background-color: #ddd;
   outline: none;
}
.container {
   padding: 16px;
}
.card{
    border-style: ridge;
  border-width: 7px;
  border-color: black;  
}
    </style>
</body>
<nav class="navbar navbar-light " style="background-color: #FDEFEF;">
            <div class="left-corner">
                <img src="./images/menu.png" width="35" height="35">
                <span class="navbar-brand mb-0 h1" style="font-weight: bold;">Welcome To The E-Learning of Dhamma school</span>
            </div>
</nav>
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form action="/def" method="post">
                        {{ csrf_field() }}
                            {{ method_field('POST')}}
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" id="email" class="form-control" required autofocus>
                                    @if($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    @if($errors->has('password'))
                                     <span class="text-danger">{{$errors->first('password')}}</span>
                                    @endif 
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <a href="/forgot_password">Reset Password</a>
                                        </label>
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="color:black;">
                                    Login
                                </button>
                            </div>
                            @if (Session::has('success'))
                        <div class="alert alert-success">
                          <ul>
                           <li>{!! \Session::get('success') !!}</li>
                          </ul>
                        </div>
                            @endif
                            @if (\Session::has('error'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{!! \Session::get('error') !!}</li>
                                    </ul>
                                </div>
                            @endif
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br>
    @include('home_page.footer')
</main>

</body>
</html>