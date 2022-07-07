<?php

session_start(); 

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
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <title>Notices</title>
  </head>
  <body>

      <nav class="navbar navbar-light " style="background-color: #FDEFEF;">
        <span class="navbar-brand mb-0 h1" style="font-weight: bold;">Welcome To The Library Management System</span>

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
              <button class="dropdown-item" type="button"><a href="{{route('my_profile')}}">My profile</a></button>

               
                <button class="dropdown-item" type="button"><a href="{{route('logout')}}">Logout</a></button>
            </div>
          </div>
          <div>&emsp;</div>
          <span class="navbar-brand mb-0 h1" style="font-weight: bold;"><?php echo $_SESSION['firstName']; ?>&ensp;&ensp;&ensp;&ensp;</span>
        </div>
    </nav>
    

    <nav class="navbar navbar-expand-sm " style="background-color: #7C5D5D;">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="{{url('/')}}">
            
        

            <span  style="font-size:30px; vertical-align: middle;  color: white;">&ensp;Home</span> 
          </a>
            
        </li>

        <li>
          <div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{url('/studentDashboard')}}">
            <span  style="font-size:30px; vertical-align: middle;  color: white;">&ensp;Dashboard</span> 
          </a>
        </li>

        <li>
          <div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/studentNotices')}}">
            <span  style="font-size:30px; vertical-align: middle;  color: white;">&ensp;Notices</span> </a>
        </li>

    
      </ul>
    
    </nav>
    <br>
    
    </div>
    <div>
      <br>
<div >
     
            @foreach($notices as $book)           
  <div class=" card text-white bg-secondary mb-3"  style="max-width: 1500px;">
  <div class="row g-0">
    <div class="col-md-4">
      @if($book->image)
            <img src="public/Image/{{ $book->image }}" class="img-fluid rounded-start"/>
        @else
            <img src="public/Image/important-notice.png"class="img-fluid rounded-start" />
        @endif
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h3 class="card-title">Title:{{$book->title}}</h3>
        <br>
        <p class="card-text">Description:{{$book->description}}</p>
        <p class="card-text"><small class="text-muted"></small></p>
        <br>
        @if($book->image)
            <a href="{{ url('public/Image/'.$book->image) }}" class="btn btn-primary mb-4">See Image</a>
        @else
            <a href="{{ url('public/Image/important-notice.png') }}" class="btn btn-primary mb-4">See Image</a>
        @endif
        <div>
                <small >Created at:{{$book->created_at->diffForHumans()}}</small>
                <br>
                <small>Updated at:{{$book->updated_at->diffForHumans()}}</small>
              </div>
      </div>
    </div>
  </div>
</div>

       @endforeach

        </div>
        </div>
    <div class="container mt-2">
      @if(session()->has('message'))
        <div class="alert alert-success">
          {{ session()->get('message') }}
      </div>
      @endif
    </div>  
    <br>
 
    <style>
      .w-5{
        display:none
      }
    </style>
  <div class="d-flex justify-content-center">
    {!! $notices->links() !!}
</div>
 

  </body>
</html>
