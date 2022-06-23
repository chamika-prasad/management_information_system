<!DOCTYPE html>
<html lang="en">
<head>
<title>Free learning school</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}


header {
  background-color: #ffccff;
  padding: 20px;
  text-align: left;
  font-size: 25px;
  color: black;
}

/* Create two columns/boxes that floats next to each other */
nav {
  float: left;
  width: 10%;
  height: 300px; /* only for demonstration, should be removed */
  background: #ccc;
  padding: 20px;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

article {
  float: left;
  padding: 20px;
  width: 70%;
  background-color: #f1f1f1;
  height: 300px; 
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
</style>
</head>
<body>

<header>
  <h2>Welcome to E-learning Dhamma School </h2>
  <div class="">Fake Image</div>
</header>

<section>
  <nav>
    <ul>
      <li><a href="/">Dashboard</a></li>
      <li><a href="/index">SignIn</a></li>
      <li><a href="/registration">SignUp</a></li>
    </ul>
  </nav>
   <article>
    <h1>About Us</h1>
    <p>We are conducting a Dhamma school in an Online platform where any student can engage with our school no matter where the person is living in inside or outside the country.</p>
  <br>
    <h1>Contact Us</h1>
    <p>We are here to help you,please email us for more Information</p>
    <p>buddhasway.english.dhamma.school@gmail.com</p>
  </article>
</section>

<footer>
  <p></p>
</footer>

</body>
</html>
