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
    @include('layouts.TeacherNavbar')
    @include('uploading_section.Navbar_module')

    
    <!----------------------one week all materials to the class------------------------------>


    <!-- 1st row -->

    @foreach ($lasts as $last)

    <p class="font-weight-light" style="font-size:20px; padding-left: 120px; padding-top: 20px">grade {{$gradename->gradeName}} / {{$subjectname->subjectName}} </p>
    <div class="container-fluid" style="width: 85%; padding-bottom: 20px">
        
        <div class="card" style="border-color:black; background-color:#98998f">
            <p class="font-weight-light" style="font-size:20px; padding: 20px">{{$date1}}</p>
            <div class="col-sm-12" style="padding-bottom:5px" id="upload_bar">
                <div class="card" style="background-color:#5C5F3A;  ">
                    <div class="card-body" style="color:white; height: 65px">
                        <div class="row">
                            <div class="col-4">
                                <p class="align-baseline">Zoom link for login class</p>                       
                            </div>
                            <div class="col-8">
                                <a style="text-decoration: none; color:rgb(27, 205, 146)" href="{{$last->zoomLink}}">{{$last->zoomLink}}</a>
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
                                <p class="align-baseline">upload class materials</p>                       
                            </div>
                            <div class="col-8">
                                <u class="align-baseline">{{$last->pdf}}</u>
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
                                <p class="align-baseline">upload recorded lecture</p>                       
                            </div>
                            <div class="col-8">
                                <a style="text-decoration: none; color:rgb(27, 205, 146)" href="{{$last->recordingLink}}">{{$last->recordingLink}}</a>
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
                                <a style="text-decoration: none; color:rgb(27, 205, 146)" href="{{$fast->zoomLink}}">{{$fast->zoomLink}}</a>
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
                                <p class="align-baseline">upload class materials</p>                       
                            </div>
                            <div class="col-4">
                                <u class="align-baseline">{{$fast->pdf}}</u>
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
                                <p class="align-baseline">upload recorded lecture</p>                       
                            </div>
                            <div class="col-8">
                                <a style="text-decoration: none; color:rgb(27, 205, 146)" href="{{$fast->recordingLink}}">{{$fast->recordingLink}}</a>
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
