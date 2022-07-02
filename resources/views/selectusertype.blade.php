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
     background-color:white;
.container {
   padding: 30px;
   background-color:white;
}
.card{
    margin:90px;
    border-style: ridge;
  border-width: 7px;
  border-color: black;  
  width:60%;
 
}
.card-body{
    border-style: ridge;
  border-width: 7px;
  border-color: black;

}
.card-header{
    text-align:center;
    font-weight:bold;
    font-size:20px;
}
</style>

</body>
     <!-- navbar 2-->
     <nav class="navbar navbar-light " style="background-color: #FDEFEF;">
            <div class="left-corner">
                <img src="./images/menu.png" width="35" height="35">
                <span class="navbar-brand mb-0 h1" style="font-weight: bold;">Welcome To The E-Learning of Dhamma school</span>
            </div>
</nav>
      <div class="container">
                                    <div class="card">
                                            <div class="card-header">{{ __('Select Your Role') }}</div> 
                                                 <div class="card-body">

                                                            <form action="/usertype">
                                                        <input type="radio" name="user" value="1">
                                                        <label for="admin"> I am the admin</label><br>
                                                        <input type="radio"  name="user" value="2">
                                                        <label for="teacher"> I am a teacher</label><br>
                                                        <input type="radio" name="user" value="3">
                                                        <label for="student"> I am a student</label><br><br>
                                                        <input type="radio" name="user" value="4">
                                                        <label for="parent"> I am a parent </label><br><br>
                                                        <input type="submit" value="Submit">
                                                        </form>
                                                 </div>        
                                            </div>
                                        </div>
</div>   
</body>
</html>