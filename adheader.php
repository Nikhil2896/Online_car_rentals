<?php

session_start();

if(empty($_SESSION['aemail'])){
	header('Location:admin.php');
}


if(isset($_POST['logout'])){
	unset($_SESSION['aemail']);
	header('Location:admin.php');
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
</style>
</head>
<body>
<div class = "container">
<div  class = "row">
 <div class= "col col-md-4"> <h2 class="logo"><a href="index.php">The Rail Road</a></h2></div>
 <div class= "col col-md-5"></div>  
 <div class= "col col-md-3"> <form method="post"> 	
<button name="logout" class="btn btn-warning mt-4">Log Out</button>
</form></div>
 </div>
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #eaca67;">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="adminhomepage.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"></a>
    </li>
  </ul>
</nav>



</div>
</body>
</html>