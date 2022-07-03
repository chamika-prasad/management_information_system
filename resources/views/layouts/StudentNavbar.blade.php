<?php

session_start(); 
$_SESSION['firstName'] = $user->firstName;
$_SESSION['lastName'] = $user->lastName;
$_SESSION['mobileNumber'] = $user->mobileNumber;
$_SESSION['address'] = $user->address;
$_SESSION['email'] = $user->email;
$_SESSION['usertype'] = $user->usertype;
$_SESSION['id'] = $user->id;
?>
<!DOCTYPE html>
<html lang="en">
<head>

</head>
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
                  <button class="dropdown-item" type="button">Settings</button>
                  <button class="dropdown-item" type="button">Logout</button>
                </div>
              </div>
              <div>&emsp;</div>
              <span class="navbar-brand mb-0 h1" style="font-weight: bold;">Student</span>
            </div>
          </nav>
    </body>
</html>