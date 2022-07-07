<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free_Learning_Application</title>
    <style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}
header {
  background-color: #FDEFEF;
  height: 70px;
  padding: 2px;
  text-align:left;
  font-size: 15px;
  font-weight: bold;
  color: black;
}

/* Create two columns/boxes that floats next to each other */


/* Style the list inside the menu */

article {
  float: left;
  padding: 20px;
  width: 86%;
  background-color: #f1f1f1;
  height: 450px; 
}

/* Clear floats after the columns */
section::after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
.container{
   -webkit-filter: grayscale(20%); Safari 6.0 - 9.0 */
  filter: grayscale(10%);
  opacity: 0.7;
  
}
.container .content{
  position: absolute;
  bottom: 0;
  background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0,20); /* Black background with 0.5 opacity */
  color: white;
  width: 100%;
  padding: 20px;
}
img {
  border: 5px solid black;
}
p{
  text-align:center;
  font-weight:bold;
  color:white;
}
.topnav {
  overflow: hidden;
  background-color:#7C5D5D;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
</style>
</head>
<body>

<header>
  
  <h2>Welcome to the E-learning of Dhammaschool</h2>

</header>

  <div class="topnav">
<ul>

    <a href="/">Home</a>
       <a href="/selectuser">Signup</a>

    <a href="{{route('index')}}">Signin</a>
    <a href="/aboutus">About Us</a>
    </ul>
</div>
<section>
   <article>
    <div class="container">
    <img src="./images/Dhamma.jpg" alt="Snow" height="400px" width="1105px";>
    <div class="content">
    <p style="color:orange;">Namo Budhdhaya</p>
    <hr>
    <p>Every sunday:Guided Meditation,Mindfulness,Beautiful dhamma sermons,lesson and more. </p>
    <p>Visit us at: No.03,line1,Colombo,Central Province,Sri Lanka</p>
    <p>Contact Us:(+94)12456789</p>
    </div>
</div>
  </article>
  <img src="./images/library.png" alt="E-library" height="100px" width="150px" >
  <P style="color:red;">E-library</P>
  <img src="./images/onlinecourse.jpg" alt="Course" height="100px" width="150px";>
  <p style="color:red;">Online Learning</p>
  <img src="./images/online_payment.jpg" alt="payment" height="100px" width="150px";>
  <p style="color:red;">Online payment</p>
</section>
<footer>
<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/">Dhammaschool.com</a>
    </div>
</footer>
</body>
</html>