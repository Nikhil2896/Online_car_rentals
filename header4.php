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
	<title>Books</title>
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