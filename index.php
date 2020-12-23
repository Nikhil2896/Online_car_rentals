<?php

session_start();

if(isset($_SESSION['remail']) || isset($_SESSION['rdemail'])){
?>
<style type="text/css">
  .buttontwo{
    display: none;
  }

</style>
<?php

if(isset($_POST['logout'])){
  unset($_SESSION['remail']);
  unset($_SESSION['rdemail']);
  header('Location:index.php');
}

}

else{

?>
<style type="text/css">
  .buttonone{
    display: none;
  }

</style>
<?php

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Taxi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


<style type="text/css">
  .logo{
    font-weight: bold;
    margin: 30px 50px; 
     }

  .logo a{
    color: black;
    text-decoration: none;
  }

     ul li{
      padding: 0px  40px;
      font-weight: bold;
     }

  .book{
    width: 350px;
    height: 180px;
    border: 1px solid #eaca67;
    border-radius: 10px;
  }

  .bor{
    margin-top: 40px;
    margin-left: 30px;
  }

  .btn{
    margin-top: 5px;
    margin-left: 120px;
  }

  .footer{
    left: 0;
   bottom: 0;
   background-color: #eaca67;
   color: white;
   text-align: center;
  }
</style>
</head>
<body>
<div class = "container">
<div  class = "row">
 <div class= "col col-md-4"><h2 class="logo"><a href="index.html">The Rail Road</a></h2></div>
 <div class= "col col-md-4"></div> 
 <div class= "col col-md-2">
    <div class="buttonone" style="margin-left: -50px;">
      <form method="post" action="index.php">
        <button type="submit" class="btn btn-warning mt-4" name="logout">Log out</button>
      </form>
    </div>
  </div>
 <div class= "col col-md-2"><div class="buttontwo" style="margin-left: -120px;"><a href="include.php"><button class="btn btn-warning mt-4">Log In/ Sign Up</button></a></div></div>
</div>
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #eaca67;">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Category</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Corporate</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Cabs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Careers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Attach</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="aboutus.php">About</a>
    </li>
  </ul>
</nav>
<div class = "row mt-4">
  <div class = "col col-md-8"><img src="images/taxi.jpg" alt="Taxi_image" width="730" height="400"></div>  
  <div class = "col col-md-4">
    <h2>What is Rail Road?</h2>
    <p>&Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat.</p>
    <div class="book">
      <h4 class="bor">Want to attach your Cab?</h4>
      <a href="driver.php"><button type="button" class="btn btn-warning">Click Here</button></a>
    </div>
  </div>
</div>

<footer class="footer mt-5">
  <div>
    <nav class="navbar navbar-expand-sm" style="margin-left: 200px;">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#" style="color: white;">About Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" style="color: white;">Services</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" style="color: white;">Help</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" style="color: white;">Customer Service</a>
    </li>
  </ul>
</nav>
  </div>
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="#"> TheRailRoad.com</a>
  </div>
</footer>
</div>
</body>
</html>