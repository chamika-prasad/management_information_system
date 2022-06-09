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
    <title>uploading materials</title>
</head>
<body>
    @include('layouts.Navbar')
    @include('uploading_section.Navbar_module')

    <!----------------------upload materials to relevent subject------------------------------>


    <!-- 1st row -->



    <div class="container-fluid" style="width: 85%;">
        <p class="font-weight-light" style="font-size:20px; padding: 20px">2022 January 6 / grade 6 / Budhdha Charithaya</p>
        <div>
            <div class="col-sm-12" style="padding-bottom:5px" id="upload_bar">
                <div class="card" style="background-color:#5C5F3A;  ">
                    <div class="card-body" style="color:white; height: 65px">
                        <div class="row">
                            <div class="col-2">
                                <p class="align-baseline">Zoom link for login class</p>                       
                            </div>
                            <div class="col-2">
                                {{-- <p class="align-baseline">link.zoom</p> --}}
                                {{$Uploadingzooms->zoomLink}}
                                {{-- @foreach ($Uploadingzooms as $Uploadingzoom)
                                    <p class="align-baseline">
                                        {{$Uploadingzoom->zoomLink}}
                                    </p>
                                @endforeach --}}
                                
                            </div>
                            
                            <div class="col-7">
                                <a style="color: aliceblue" href="/uploading_zoomlink">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="rounded-circle dropdown-toggle"
                                        data-toggle="collapse" aria-haspopup="true" aria-expanded="false" data-target="#collapseExample" aria-controls="collapseExample"
                                        height="40"
                                        alt="Black and White Portrait of a Man"
                                        loading="lazy" viewBox="0 0 16 16" style="position:absolute; right:100px">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </a>   
                            </div>
                            <div class="col-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16" style=" vertical-align: bottom; color: black;">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <hr>
    
                <!-- 2nd row -->
    
    
            <div class="col-sm-12" style="padding-bottom:5px" id="upload_bar">
                <div class="card" style="background-color:#5C5F3A;  ">
                    <div class="card-body" style="color:white; height: 65px">
                        <div class="row">
                            <div class="col-2">
                                <p class="align-baseline">upload class materials</p>                       
                            </div>
                            <div class="col-2">
                                <p class="align-baseline">class.pdf</p>
                                {{-- {{$showpdf->pdf}} --}}
                            </div>
                            
                            <div class="col-7">
                                <a style="color: aliceblue" href="/uploading_pdf">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="rounded-circle dropdown-toggle"
                                        data-toggle="collapse" aria-haspopup="true" aria-expanded="false" data-target="#collapseExample" aria-controls="collapseExample"
                                        height="40"
                                        alt="Black and White Portrait of a Man"
                                        loading="lazy" viewBox="0 0 16 16" style="position:absolute; right:100px">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </a>   
                            </div>
                            <div class="col-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16" style=" vertical-align: bottom; color: black;">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <hr>
          <!-- 3rd row -->
    
    
    
            <div class="col-sm-12" style="padding-bottom:5px" id="upload_bar">
                <div class="card" style="background-color:#5C5F3A;  ">
                    <div class="card-body" style="color:white; height: 65px">
                        <div class="row">
                            <div class="col-2">
                                <p class="align-baseline">upload recorded lecture</p>                       
                            </div>
                            <div class="col-2">
                                {{-- <p class="align-baseline">lec.mp4</p> --}}
                                {{-- @foreach ($Uploadingzooms as $Uploadingzoom)
                                    <p class="align-baseline">
                                        {{$Uploadingzoom->zoomLink}}
                                    </p>
                                @endforeach
                                 --}}
                                 {{$recordlink->recordingLink}}
                            </div>
                            
                            <div class="col-7">
                                <a style="color: aliceblue" href="/uploading_recording">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="rounded-circle dropdown-toggle"
                                        data-toggle="collapse" aria-haspopup="true" aria-expanded="false" data-target="#collapseExample" aria-controls="collapseExample"
                                        height="40"
                                        alt="Black and White Portrait of a Man"
                                        loading="lazy" viewBox="0 0 16 16" style="position:absolute; right:100px">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </a>   
                            </div>
    
                            
                            <div class="col-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16" style=" vertical-align: bottom; color: black;">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="col-sm-12">
                <button class="btn btn-danger" style="font-size: 1.5rem;float:right; ">submit</button>
            </div>
            
            <!----------------------upload materials to relevent subject------------------------------>
    
        </div>

    </div>  
    @include('home_page.footer')
    
</body>
</html>
