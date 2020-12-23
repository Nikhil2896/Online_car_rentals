<?php
include 'dbconnections.php';

session_start();

$error = '';

if (isset($_POST['submit'])) {

$rdemail = $_POST['rdemail'];
$rdpassword = $_POST['rdpassword'];


if (empty($_POST['rdemail']) || empty($_POST['rdpassword'])) {
  $error = "Please enter your Email id and Password";
}
else{

$sql="SELECT demail, dpassword FROM driver WHERE demail = '$rdemail'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

if($row["demail"]==$rdemail && $row["dpassword"]==$rdpassword){

  $_SESSION['rdemail'] = $row["demail"];
  header("Location:driverhome.php");
}
else
{
   $error= "Entered email id or password is incorrect";
}
} 
}
include 'header.php';


$dname=$demail=$dphone=$dgid="";

$nameerr=$emailerr=$phoneerr=$passerr=$regerror=$iderr="";

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
         $dname=$_POST['name'];
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
      $demail=$_POST['email'];

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

      $dphone=$_POST['phone'];
  }
     }

     if(empty($_POST['id']))
    {
      $passerr="Please enter a your Govt ID number";
    }
     else
     {
     $dgid=$_POST['id'];
}

     if(empty($_POST['password']))
    {
      $passerr="Please enter a your password";
    }
     else
     {
     $dpassword=$_POST['password'];
}




     // if (($email=$_POST['email']) && ($name=$_POST['name']) && ($phone=$_POST['phone']) && ($password=$_POST['password'])) {
     //   header('Location:registered.php');
     // }



$sql="INSERT INTO driver(`dname`,`demail`,`dphone`,`dgid`,`dpassword`) VALUES ('$dname','$demail','$dphone','$dgid','$dpassword')";

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

if(isset($_SESSION['rdemail'])){
    header('Location:driverhome.php');
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
      <h4>To Register as a Driver :</h4>
      <form class="form-horizontal" method="post" action="driver.php">
        <div class="form-goup">
          <label class="control-label">Name : </label>
          <input type="text" class="form-control" id="name" value="<?php  echo $dname;?>" placeholder="Enter name" name="name">
          <div><?php echo $nameerr ?></div>
        </div>
        <div class="form-goup">
          <label class="control-label">Email : </label>
          <input type="text" class="form-control" id="email" value="<?php  echo $demail;?>" placeholder="Enter email" name="email">
          <div><?php echo $emailerr ?></div>
        </div>
        <div class="form-goup">
          <label class="control-label">Phone number : </label>
          <input type="text" class="form-control" id="phone" value="<?php  echo $dphone;?>" placeholder="Enter Phone Number" name="phone">
          <div><?php echo $phoneerr ?></div>
        </div>
        <div class="form-goup">
          <label class="control-label">Govt ID number : </label> 
          <input type="text" class="form-control" id="password" value="<?php  echo $dgid;?>" placeholder="Enter a Govt ID number" name="id">
          <div><?php echo $iderr ?></div>
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
        <h4>To Sign In as a Driver :</h4>
          <form class="form-horizontal" method="post" action="driver.php">
            <div class="form-group">
                <label class="control-label">Email:</label>
                <input type="email" class="form-control" placeholder="Enter email" name="rdemail">
            </div>
            <div class="form-group">
                <label class="control-label">Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" name="rdpassword">
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