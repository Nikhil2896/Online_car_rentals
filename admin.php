<?php
include 'header.php';


session_start();

$error = '';

if (isset($_POST['submit'])) {

$remail = $_POST['aemail'];
$rpassword = $_POST['apassword'];

$crtemail = 'admin@gmail.com';
$crtpassword = 'password';


if (empty($_POST['aemail']) || empty($_POST['apassword'])) {
  $error = "Please enter your Email id and Password";
}
else{
if (($crtemail == $remail) && ($crtpassword == $rpassword)) {
	$_SESSION['aemail'] = $crtemail;
	header("Location:adminhomepage.php");
}
else
{
   $error= "Entered email id or password is incorrect";
}
} 
}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style type="text/css">
    ul li{
      display:none;
     }  
nav{
  height: 50px;
}

  </style>
</head>
<body>
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
					<div class="col-md-6 mt-5">


 		 		<h4 class="mb-5">Admin Sign In</h4>
 		 		  <form class="form-horizontal" method="post" action="<?php  echo $_SERVER['PHP_SELF']; ?>">
    				<div class="form-group">
      					<label class="control-label">Email:</label>
        				<input type="email" class="form-control" placeholder="Enter email" name="aemail">
    				</div>
    				<div class="form-group">
      					<label class="control-label">Password:</label>
        				<input type="password" class="form-control" placeholder="Enter password" name="apassword">
      				</div>
      				<div><?php echo $error; ?></div>
    				<div class="form-group">        
        			<button type="submit" class="btn btn-warning mt-3 mb-5" name="submit">Log In</button>
      				</div>
      			  </form>
			</div>
				<div class="col-md-3"></div>
		</div>	
	</div>	
	<?php include 'footer.php' ?>
</body>
</html>