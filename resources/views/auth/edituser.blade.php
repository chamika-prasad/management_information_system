<?php
session_start()

?>
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

    input[type=email], input[type=password] {
   width: 100%;
   font-size: 15px;
   padding: 15px;
   margin: 5px 0 22px 0;
   display: inline-block;
   border: none;
   background: #f1f1f1;
}
label{
   font-size: 15px;
}
input[type=email]:focus, input[type=password]:focus {
   background-color: #ddd;
   outline: none;
}
.container {
   padding: 16px;
}
.card{
    border-style: dotted;
  border-width: 2px;
  border-color:black;
}
    </style>
<body>
<nav class="navbar navbar-light " style="background-color: #FDEFEF;">
            <div class="left-corner">
                <img src="./images/menu.png" width="35" height="35">
                <span class="navbar-brand mb-0 h1" style="font-weight: bold;">Welcome To The E-Learning of Dhamma school</span>
            </div>
            <div class="d-flex align-items-center">
              <div class="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="rounded-circle dropdown-toggle"
                        id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        height="40"
                        alt="Black and White Portrait of a Man"
                        loading="lazy" viewBox="0 0 16 16" style="vertical-align: middle;">
                          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                <div class="dropdown-menu " aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button"><a href="{{route('my_profile')}}">My Profile</a></button>
                  <button class="dropdown-item" type="button"><a href="{{route('registered-user')}}">User Settings</a></button>
                  <button class="dropdown-item" type="button"><a href="{{route('logout')}}">Logout</a></button>
                </div>
              </div>
              <div>&emsp;</div>
              <span class="navbar-brand mb-0 h1" style="font-weight: bold;"><?php echo $_SESSION['usertype'];?></span>
            </div>
</nav>
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
<div class="container" style="height:auto;min-height: 100vh">


    <div class="card text-body bg-info mb-3 mt-2">
        <div class="card-header font-weight-bold text-white">
            <h2><b>Registered Users-Edit role</b></h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <h4>Current Role: {{ $user_roles->usertype }}</h4>
                    

                            <form action="{{ url('role-update/'.$user_roles->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    @method('GET')
                                    <div class="form-group">
                                        <input type="text" class="form-control" readonly value="{{ $user_roles->firstName }}{{$user_roles->lastName}}">
                                        
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" readonly value="{{ $user_roles->email }}">
                                    </div>

                                    <div class="form-group">
                                        <select name="roles" class="form-control">
                                            <option value="Admin" <?php if($user_roles->usertype == 'admin') echo 'selected';?>>Admin</option>
                                            <option value="Parent" <?php if($user_roles->usertype == 'parent') echo 'selected';?>>Parent</option>
                                            <option value="Teacher" <?php if($user_roles->usertype == 'teacher') echo 'selected';?>>Teacher</option>
                                            <option value="Student" <?php if($user_roles->usertype == 'student') echo 'selected';?>>Student</option>
                                            
                                        </select>
                                    </div>

                                    <!-- <div class="form-group">
                                        <select name="isban" class="form-control">
                                            <option value="0" <?php if($user_roles->isban == '0') echo 'selected';?>>Not Banned</option>
                                            <option value="1" <?php if($user_roles->isban == '1') echo 'selected';?>>Banned</option>
                                        </select>
                                    </div> -->

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>

                            </form>

                </div>
            </div>
        </div>
    </div>
</div>