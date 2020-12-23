<?php

session_start();

if(empty($_SESSION['remail'])){
	header('Location:include.php');
}

if(isset($_POST['logout'])){
	unset($_SESSION['remail']);
	header('Location:index.php');
}

$cxid = $_SESSION['remail'];

include 'dbconnections.php';

$sql2="SELECT rid FROM register WHERE email = '$cxid'";
$res2=mysqli_query($con,$sql2);
$row2=mysqli_fetch_array($res2);

$customerid = $row2['rid'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Taxi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
.sear{
  margin-top: 35px;
}

</style>
</head>
<body>
<div class = "container">
<div  class = "row">
 <div class= "col col-md-4"><h2 class="logo"><a href="index.php">The Rail Road</a></h2></div>
 <div class= "col col-md-5"> 
      <form method="post" action="search.php" class="sear">
      <input type="text" name="search" class="search" placeholder="Search here...." style="width: 250px;">
      <button type="sear" style="background-color: #eaca67; border:none;"><i class="fa fa-search" style="font-size:24px"></i></button>
    </form>
  </div>  
 <div class= "col col-md-3"> <form method="post"> 	
<button name="logout" class="btn btn-warning mt-4 button2">Log Out</button>
</form></div>
 </div>
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #eaca67;">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="category.php">Category</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="homepage.php">Book Cab</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="attach.php">Attach</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="working.php">Woking</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="aboutus.php">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact.php">Contact</a>
    </li>
  </ul>
</nav>



</div>
</body>
</html>