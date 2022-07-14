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
    <title>Home</title>
</head>
<body>
    @include('layouts.sNavbar')
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
                        &ensp;Dashboard
                    </span>
                </a>
              
            </li>
    
            <li><div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</div>
            </li>
        
         
        </ul>
      
      </nav>
    
      <!-- navbar 2-->
      <div>
        <div class="container-fluid" style="width: 85%; padding-bottom: 20px ;padding-top: 20px;">
            <div class="card-deck" >
                <div class="card border-secondary mb-3 bg-secondary text-white" style="text-align: center">
                    <a href="/select_module">
                        <button class="btn btn-secondary" >
                            <div class="card-body">
                                <h5 class="card-title">Subjects</h5>
                                <p class="card-text">Choose grade and subject via this button</p>
                            </div>
                        </button>
                    </a>
                </div>  
                        
                   
                
                
                <div class="card border-secondary mb-3 bg-secondary text-white" style="text-align: center">
                    <a href="/select_module">
                        <button class="btn btn-secondary" >
                            <div class="card-body">
                                <h5 class="card-title">Subjects</h5>
                                <p class="card-text">Choose grade and subject via this button</p>
                            </div>
                        </button>
                    </a>
                </div>
                <div class="card border-secondary mb-3 bg-secondary text-white" style="text-align: center">
                    <a href="/select_module">
                        <button class="btn btn-secondary" >
                            <div class="card-body">
                                <h5 class="card-title">Subjects</h5>
                                <p class="card-text">Choose grade and subject via this button</p>
                            </div>
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="container-fluid" style="width: 85%; padding-bottom: 20px; padding-top: 20px;">
            <div class="card-deck ">
                <div class="card border-secondary mb-3 bg-secondary text-white" style="text-align: center">
                    <a href="/viewBooks">
                        <button class="btn btn-secondary" >
                            <div class="card-body">
                                <h5 class="card-title">E-Library System</h5>
                                <p class="card-text">Happy Reading</p>
                            </div>
                        </button>
                    </a>
                </div>
                <div class="card border-secondary mb-3 bg-secondary text-white" style="text-align: center">
                    <a href="/payment_option">
                        <button class="btn btn-secondary" >
                            <div class="card-body">
                                <h5 class="card-title">Payment</h5>
                                <p class="card-text">&emsp;&emsp;Make online payment or Bank deposit&emsp;&emsp;</p>
                            </div>
                        </button>
                    </a>
                </div>

                
                <div class="card border-secondary mb-3 bg-secondary text-white" style="text-align: center">
                    <a href="/free_learning_application">
                        <button class="btn btn-secondary" >
                            <div class="card-body">
                                <h5 class="card-title">Free learning</h5>
                                <p class="card-text">&emsp;&emsp;&emsp;&emsp;&emsp;Apply for free learning&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</p>
                            </div>
                        </button>
                    </a>
                </div>
                
            </div>
        </div>
      </div>
      

    @include('home_page.footer')

</body>