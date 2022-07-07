<?php

session_start(); 
// $_SESSION['firstName'] = $user->firstName;
// // $currentusername = $_SESSION['username'];
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
    <title>My Profile</title>
</head>

<body>
@include('layouts.Navbar')
<div class="container" style="height:auto;min-height: 100vh">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div>

            <div class="card text-body bg-info mb-3 mt-2">
                <div class="card-header font-weight-bold text-white">
                    <h2><b>My Profile</b></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                        <!-- <form action="{{ url('my_profile_update') }}" method="POST" enctype="multipart/form-data"> -->
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
   <!-- @foreach($user as $user) -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">First Name :  <?php echo $_SESSION['firstName']; ?></label>
                                            <!-- <input type="text" name="firstName" class="form-control @error('firstName') is-invalid @enderror" value="{{ Auth::user()->firstName??'None' }}" required> -->
                                            @error('firstName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Last Name : <?php echo $_SESSION['lastName'];?></label>
                                            <!-- <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" value="{{ Auth::user()->lastName??'None' }}" required> -->
                                            @error('lastName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Contact Number <?php echo $_SESSION['mobileNumber'];?></label>
                                            <!-- <input type="text" name="mobileNumber" class="form-control @error('mobileNumber') is-invalid @enderror" value="{{ Auth::user()->mobileNumber??'None' }}" required> -->
                                            @error('mobileNumber')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Address : <?php echo $_SESSION['address'];?></label>
                                            <!-- <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ Auth::user()->address??'None' }}" required> -->
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">E-mail Address :<?php echo $_SESSION['email'];?></label>
                                            <!-- <input type="text" class="form-control" readonly value="{{ Auth::user()->email??'None' }}"> -->
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Current Role : <?php echo $_SESSION['usertype'];?></label>
                                            <!-- <input type="text" class="form-control" readonly value="{{ Auth::user()->usertype??'None' }}"> -->
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">User ID :  <?php echo $_SESSION['id'];?></label>
                                            <!-- <input type="text" class="form-control" readonly value="{{ Auth::user()->id??'None' }}"> -->
                                        </div>
                                    </div>

 <!-- @endforeach                                   -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Profile </label>
                                            <button type="submit" class="btn btn-primary">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @include('home_page.footer')
</div>


