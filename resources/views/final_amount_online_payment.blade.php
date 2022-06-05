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
    <title>payment_amount</title>
</head>
<body>
    <!-- navbar 1-->
    <nav class="navbar navbar-light " style="background-color: #FDEFEF;">
    <span class="navbar-brand mb-0 h1" style="font-weight: bold;">Welcome To The Payment Section</span>

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
          <button class="dropdown-item" type="button">My profile</button>
          <button class="dropdown-item" type="button">Settings</button>
          <button class="dropdown-item" type="button">Logout</button>
        </div>
      </div>
      <div>&emsp;</div>
      <span class="navbar-brand mb-0 h1" style="font-weight: bold;">Student</span>
    </div>
  </nav>
  
  <!-- navbar 1-->

  <!-- navbar 2-->
  
  <nav class="navbar navbar-expand-sm " style="background-color: #7C5D5D;">

    <!-- Links -->
    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="#">
          
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16" style=" vertical-align: middle; color: black;">
          <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
          </svg>

          <span  style="font-size:30px; vertical-align: middle;  color: white;">&ensp;Home</span> </a>
          
      </li>

      <li><div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">

          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16" style=" vertical-align: middle; color: black;">
            <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
            <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
          </svg>

          <span  style="font-size:30px; vertical-align: middle;  color: white;">&ensp;Amount</span> </a>
      </li>

      <li><div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</div>
      </li>
     
    </ul>
  
  </nav>

  <!-- navbar 2-->



    <div class="container h-100" style="margin-top: 2cm;">
      <div class="row h-100 justify-content-center align-items-center">
          <div class="col-10 col-md-8 col-lg-6">
              
              <div class = 'card p-5' style="background-color: #b6acab" >

                <!-- amount -->
                <div class = 'card ' style="background-color: black; opacity : 0.4;">
                    <div class="text-center" style="padding-top: 2cm; padding-bottom: 2cm; color :azure; font-weight:bold; font-size:30px;">
                    <div>Your Final Amount</div>
                    <div>LKR 2000.00</div>
                    </div>
                </div>
                <!-- amount -->
                

                <br>

                <!-- continue-->

                <div class="row">

                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success btn-lg btn-block">Continue</button>
                    </div>

                </div>

                <!-- continue-->
                    
                    </div>
                </div>
            </div>
                 
            </div>
              
            </div>
        </div>
      </div>  
    
</body>
</html>