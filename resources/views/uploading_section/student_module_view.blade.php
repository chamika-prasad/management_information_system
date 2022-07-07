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
    <title>student_module_view</title>
</head>
<body>
    @include('layouts.StudentNavbar')
    @include('layouts.Navbar_student')

    
    <!----------------------one week all materials to the class------------------------------>


    <!-- 1st row -->

    @foreach ($lasts as $last)

    <p class="font-weight-light" style="font-size:20px; padding-left: 120px; padding-top: 20px">grade {{$gradename}} / {{$subjectname}} </p>
    <div class="container-fluid" style="width: 85%; padding-bottom: 20px">
        
        <div class="card" style="border-color:black; background-color:#98998f">
            <p class="font-weight-light" style="font-size:20px; padding: 20px; ">{{$date1}}</p>
            <div class="col-sm-12" style="padding-bottom:5px" id="upload_bar">
                <div class="card" style="background-color:#5C5F3A;  ">
                    <div class="card-body" style="color:white; height: 65px">
                        <div class="row">
                            <div class="col-4">
                                <p class="align-baseline">Zoom link for login class</p>                       
                            </div>
                            <div class="col-8">
                                <button type="button" class="btn btn-primary" style="width: 50%">
                                    <a
                                     style="text-decoration: none; color:rgb(214, 221, 219)" 
                                     href="{{$last->zoomLink}}">click to log in to the zoom
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
                <!-- 2nd row -->
    
    
            <div class="col-sm-12" style="padding-bottom:5px" id="upload_bar">
                <div class="card" style="background-color:#5C5F3A;  ">
                    <div class="card-body" style="color:white; height: 65px">
                        <div class="row">
                            <div class="col-4">
                                <p class="align-baseline">Class Materials</p>                       
                            </div>
                            <div class="col-8">
                                <button type="button" class="btn btn-warning" style="width: 50%;">
                                    <a
                                     style="text-decoration: none; color:rgb(4, 24, 18)" 
                                     href="{{url('/downloadpdf',$last->pdf)}}" download="{{$last->pdf}}">Download pdf file
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <!-- 3rd row -->
    
    
    
            <div class="col-sm-12" style="padding-bottom:5px" id="upload_bar">
                <div class="card" style="background-color:#5C5F3A;  ">
                    <div class="card-body" style="color:white; height: 65px">
                        <div class="row">
                            <div class="col-4">
                                <p class="align-baseline">Recorded Class</p>                       
                            </div>
                            <div class="col-8">
                                <button type="button" class="btn btn-primary" style="width: 50%">
                                    <a
                                     style="text-decoration: none; color:rgb(214, 221, 219)" 
                                     href="{{$last->recordingLink}}">click to refer records
                                    </a>
                                </button>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </div>  
    
    @endforeach

    <!----------------------upload materials to relevent subject----------------------------->
    
    

        <!----------------------one week all materials to the class------------------------------>


    <!-- 1st row -->

    @foreach ($fasts as $fast)

    <div class="container-fluid" style="width: 85%; padding-bottom: 20px;">
        <div class="card" style="border-color:black; background-color:#98998f;">
            <p class="font-weight-light" style="font-size:20px; padding: 20px">{{$date2}}</p>
            <div class="col-sm-12" style="padding-bottom:5px" id="upload_bar">
                <div class="card" style="background-color:#5C5F3A;  ">
                    <div class="card-body" style="color:white; height: 65px">
                        <div class="row">
                            <div class="col-4">
                                <p class="align-baseline">Zoom link for login class</p>                       
                            </div>
                            <div class="col-8">
                                <button type="button" class="btn btn-primary" style="width: 50%">
                                    <a
                                     style="text-decoration: none; color:rgb(214, 221, 219)" 
                                     href="{{$fast->zoomLink}}">click to log in to the zoom
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
                <!-- 2nd row -->
    
    
            <div class="col-sm-12" style="padding-bottom:5px" id="upload_bar">
                <div class="card" style="background-color:#5C5F3A;  ">
                    <div class="card-body" style="color:white; height: 65px">
                        <div class="row">
                            <div class="col-4">
                                <p class="align-baseline">Class Materials</p>                       
                            </div>
                            <div class="col-8">
                                <button type="button" class="btn btn-warning" style="width: 50%">
                                    <a
                                     style="text-decoration: none; color:rgb(1, 24, 18)" 
                                     href="{{url('/downloadpdf',$fast->pdf)}}" download="{{$fast->pdf}}">Download pdf file
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <!-- 3rd row -->
    
    
    
            <div class="col-sm-12" style="padding-bottom:5px" id="upload_bar">
                <div class="card" style="background-color:#5C5F3A;  ">
                    <div class="card-body" style="color:white; height: 65px">
                        <div class="row">
                            <div class="col-4">
                                <p class="align-baseline">Recorded Class</p>                       
                            </div>
                            <div class="col-8">
                                <button type="button" class="btn btn-primary" style="width: 50%">
                                    <a
                                     style="text-decoration: none; color:rgb(214, 221, 219)" 
                                     href="{{$fast->recordingLink}}">click to refer records
                                    </a>
                                </button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </div>    

    @endforeach

    <!----------------------upload materials to relevent subject----------------------------->  

    @include('home_page.footer')
    
       
</body>
</html>
