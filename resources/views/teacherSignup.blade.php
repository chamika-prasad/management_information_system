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

input[type=email], input[type=password],input[type=text],input[type=string]{
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
.card-header{
    text-align:center;
    font-weight:bold;
    font-size:20px;
}
    </style>
<body>
<nav class="navbar navbar-light " style="background-color: #FDEFEF;">
            <div class="left-corner">
                <img src="./images/menu.png" width="35" height="35">
                <span class="navbar-brand mb-0 h1" style="font-weight: bold;">Welcome To The E-Learning of Dhamma school</span>
            </div>
</nav>
      <main class="login-form">
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Register') }}</div> 
              <div class="card-body">
    <form action="/abc/2" method="POST">
    {{ csrf_field() }}
    {{ method_field('POST')}}




    <div class="form-group row">

<label for="index" class="col-md-4 col-form-lable text-md-right">{{ __('index') }}</label>
     <div class="col-md-6">
         <input type="text" name="index" id="index" class="form-control" placeholder="DS_Surname with Initials" required autofocus>
      
          @if($errors->has('index'))
           <span class="text-danger">{{$errors->first('index')}}</span>
           @endif
           <small>Eg: DS_GimhariDGA</small><br>
     </div>
</div> 



<div class="form-group row">

<label for="firstName" class="col-md-4 col-form-lable text-md-right">{{ __('FirstName') }}</label>
    <div class="col-md-6">
        <input type="text" name="firstName" id="firstName" class="form-control" required autofocus>
         @if($errors->has('firstName'))
          <span class="text-danger">{{$errors->first('firstName')}}</span>
          @endif
    </div>
</div>
<div class="form-group row">

   <label for="lastName" class="col-md-4 col-form-lable text-md-right">{{ __('LastName') }}</label>
    <div class="col-md-6">
        <input type="text" name="lastName" id="lastName" class="form-control" required autofocus>
         @if($errors->has('lastName'))
          <span class="text-danger">{{$errors->first('lastName')}}</span>
          @endif
    </div>
</div>
<div class="form-group row">
   <label for="email" class="col-md-4 col-form-lable text-md-right">Email</label>
    <div class="col-md-6">
        <input type="email" name="email" id="email" class="form-control" required autofocus>
         @if($errors->has('email'))
          <span class="text-danger">{{$errors->first('email')}}</span>
          @endif
    </div>
</div>


<div class="form-group row">
   <label for="text" class="col-md-4 col-form-lable text-md-right">Password</label>
    <div class="col-md-6">
        <input type="password" name="password" id="password" class="form-control" required>
         @if($errors->has('password'))
          <span class="text-danger">{{$errors->first('password')}}</span>
          @endif
    </div>
</div>


<div class="form-group row">

   <label for="password_confirmation" class="col-md-4 col-form-lable text-md-right">Confirmation Password</label>
    <div class="col-md-6">
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
         @if($errors->has('password_confirmation'))
          <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
          @endif
    </div>
</div>



<div class="form-group row">
<label for="gender" class="col-md-4 col-form-lable text-md-right">Gender</label>
    <div class="col-md-6">
    <label for="male">Male</label>
        <input type="radio" name="gender" id="male" value="male" class="form-control" required>
        <label for="male">Female</label>
        <input type="radio" name="gender" id="female" value="female" class="form-control" required>
    
         @if($errors->has('gender'))
          <span class="text-danger">{{$errors->first('gender')}}</span>
          @endif
    </div>
</div>



<div class="form-group row">
   <label for="phone1" class="col-md-4 col-form-lable text-md-right">Phone Number</label>
    <div class="col-md-6">
        <input type="string" name="mobileNumber" id="mobileNumber" class="form-control" required>
         @if($errors->has('mobileNumber'))
          <span class="text-danger">{{$errors->first('mobileNumber')}}</span>
          @endif
    </div>
</div>
<div class="form-group row">
   <label for="address" class="col-md-4 col-form-lable text-md-right">Address</label>
    <div class="col-md-6">
        <textarea name="address" id="address" rows="4" class="form-control" required></textarea>
         @if($errors->has('address'))
          <span class="text-danger">{{$errors->first('address')}}</span>
          @endif
    </div>
</div>


                          
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember">Remember me
                                        </label>
                                        
                                    </div>
                                </div>
                            </div> 
                        
                             <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                                </div>
               </div>  
             </div>
         </div>
     </div>
     <footer class="bg-light text-center text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/">Dhammaschool.com</a>
    </div>
    <!-- Copyright -->
  </footer>
</main>

 </body>
</html>