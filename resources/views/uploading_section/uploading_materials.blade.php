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
    

    <!-- navbar 2-->
          
    <nav class="navbar navbar-expand-sm " style="background-color: #7C5D5D;">
        
        <!-- Links -->
        <ul class="navbar-nav">
    
            <li class="nav-item">
                <a class="nav-link" style="link-decoration:none" href="/">
                
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16" style=" vertical-align: middle; color: black; ">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                    </svg>
            
                    <span  style="font-family: 'Roboto';
                                    font-style: none;
                                    font-weight: 400;
                                    font-size: 24px;
                                    line-height: 28px;
                                    color:white;
                                    "
                    >
                        &ensp;Home
                    </span>
                </a>
              
            </li>
    
            <li><div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</div>
            </li>
        
            <li class="nav-item">
                <a class="nav-link" href="/select_module#">
        
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16" style=" vertical-align: bottom; color: black;">
                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                    </svg>
        
                    <span  style="font-family: 'Roboto';
                                        font-style: none;
                                        font-weight: 400;
                                        font-size: 24px;
                                        line-height: 28px;
                                        color:white"
                    >
                        &ensp;select module
                    </span> 
                </a>
            </li><div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</div>
            <li class="nav-item">
                <a class="nav-link" href="#">
        
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-award" viewBox="0 0 16 16" style=" vertical-align: bottom; color: black;">
                        <path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z"/>
                        <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
                    </svg>
        
                    <span  style="font-family: 'Roboto';
                                        font-style: none;
                                        font-weight: 400;
                                        font-size: 24px;
                                        line-height: 28px;
                                        color:white"
                    >
                        &ensp;grade module
                    </span> 
                </a>
            </li>
         
        </ul>
      
      </nav>
    
      <!-- navbar 2-->
    
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
                                <p class="align-baseline">link.zoom</p>
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
                                <p class="align-baseline">lec.mp4</p>
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
            <div class="col-sm-11">
                <button class="btn btn-danger" style="font-size: 1.5rem;float:right; ">submit</button>
            </div>
    
            <!----------------------upload materials to relevent subject------------------------------>
    
        </div>
    </div>    
    
    
       
</body>
</html>
