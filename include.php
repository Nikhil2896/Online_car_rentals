<?php
include 'dbconnections.php';
include 'header.php';

session_start();

$error = '';

if (isset($_POST['submit'])) {

$remail = $_POST['remail'];
$rpassword = $_POST['rpassword'];

if (empty($_POST['remail']) || empty($_POST['rpassword'])) {
  $error = "Please enter your Email id and Password";
}
else{

$sql="SELECT email, password FROM register WHERE email = '$remail'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

if($row["email"]==$remail && $row["password"]==$rpassword){

	$_SESSION['remail'] = $row["email"];
	header("Location:homepage.php");
}
else
{
   $error= "Entered email id or password is incorrect";
}
} 
}


$name=$email=$phone="";

$nameerr=$emailerr=$phoneerr=$passerr=$regerror="";

if(isset($_POST['register'])){

if(empty($_POST['name'])){
	$nameerr = "Please enter a name";
}

else{
	if(!preg_match("/^[a-zA-Z ]*$/", $_POST['name']))
       {
       	  $nameerr="Please enter a valid name";
       }
       else
       {
       	 $name=$_POST['name'];
       } 

   }

   if(empty($_POST['email']))
   {

    $emailerr="Please enter your email";
   }

   else
   {

    if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {

     $emailerr="Please enter a valid email id";
    }

    else
    {
      $email=$_POST['email'];

    }
   }
    

    if(empty($_POST['phone']))
    {
      $phoneerr="Please enter a your phone number";
    }
     else
     {
    if(!(preg_match("/^[0-9]*$/", $_POST['phone'])  && strlen($_POST['phone'])==10 ))
    {
        $phoneerr="Please enter valid phone number";
     }
     else
     {

      $phone=$_POST['phone'];
  }
     }
     if(empty($_POST['password']))
    {
      $passerr="Please enter a your password";
    }
     else
     {
     $password=$_POST['password'];
}


     // if (($email==$_POST['email']) && ($name==$_POST['name']) && ($phone==$_POST['phone']) && ($password==$_POST['password'])) {
     // }

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];



$sql="INSERT INTO register(`name`,`email`,`phone`,`password`) VALUES ('$name','$email','$phone','$password')";

         $res=mysqli_query($con,$sql); 
         
         if($res)
         {
          $regerror = 'Successfully Resgistered! Please signIn to continue.';
         }
         else
         {
          $regerror = "Registration Failed. Please try again.";
         }

}

if(isset($_SESSION['remail'])){
    header('Location:homepage.php');
}

?>

<!DOCTYPE html>
 <html>
 <head>
 	<title>registration</title>
 </head>
 <body>
 <div class = "container">
 	<div class="row">
 		<div class="col col-md-5 mt-5 ml-4">
 			<h4>Registration</h4>
 			<form class="form-horizontal" method="post" action="<?php  echo $_SERVER['PHP_SELF']; ?>">
 				<div class="form-goup">
 					<label class="control-label">Name : </label>
 					<input type="text" class="form-control" id="name" value="<?php  echo $name;?>" placeholder="Enter name" name="name">
 					<div><?php echo $nameerr ?></div>
 				</div>
 				<div class="form-goup">
 					<label class="control-label">Email : </label>
 					<input type="text" class="form-control" id="email" value="<?php  echo $email;?>" placeholder="Enter email" name="email">
 					<div><?php echo $emailerr ?></div>
 				</div>
 				<div class="form-goup">
 					<label class="control-label">Phone number : </label>
 					<input type="text" class="form-control" id="phone" value="<?php  echo $phone;?>" placeholder="Enter Phone Number" name="phone">
 					<div><?php echo $phoneerr ?></div>
 				</div>
 				<div class="form-goup">
 					<label class="control-label">Password : </label> 
 					<input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
          <div><?php echo $passerr ?></div>
 				</div>
        <div><?php echo $regerror; ?></div>
    			<div class="form-group">        
        		<button type="submit" class="btn btn-warning mt-3" name="register">Register</button>
      			</div>
 			</form> 
 		</div>
 			<div class="col col-md-1"></div>
 		 	<div class="col col-md-5 mt-5 mr-4">
 		 		<h4>Sign In</h4>
 		 		  <form class="form-horizontal" method="post" action="<?php  echo $_SERVER['PHP_SELF']; ?>">
    				<div class="form-group">
      					<label class="control-label">Email:</label>
        				<input type="email" class="form-control" placeholder="Enter email" name="remail">
    				</div>
    				<div class="form-group">
      					<label class="control-label">Password:</label>
        				<input type="password" class="form-control" placeholder="Enter password" name="rpassword">
      				</div>
      				<div><?php echo $error; ?></div>
    				<div class="form-group">        
        			<button type="submit" class="btn btn-warning" name="submit">Log In</button>
      				</div>
      			  </form>
			</div>
 	</div> 
 </div> 
 <?php include 'footer.php'; ?>
 </body>
 </html>