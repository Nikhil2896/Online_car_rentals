<?php 
include 'dheader.php';

include 'dbconnections.php';

$nameerr=$manerr=$typerr=$maxerr=$regerror=$prerr=$msg="";

if(isset($_POST['attach'])){

if(empty($_POST['car'])){
  $nameerr = "Please enter the name of the Car";
}
       else
       {
         $cname=$_POST['car'];
       } 

   

   if(empty($_POST['year']))
   {

    $manerr="Please enter the year";
   }

   else
   {

    if(!(preg_match("/^[0-9]*$/", $_POST['year'])))
    {

     $manerr="Please enter a valid year";
    }

    else
    {
      $cyear=$_POST['year'];

    }
   }
    
    $operation = $_POST['type'];


switch ($operation) {
    case 'option1':
    $type = 'Hatchback';
    break;

    case 'option2':
    $type = 'Sedan';
    break;

    case 'option3':
    $type = 'MPV';
    break;
 
    case 'option4':
    $type = 'SUV';
    break;

    case 'option5':
    $type = 'Crossover';
    break;

    case 'option6':
    $type = 'Coupe';
    break;

  default:
    $typerr="Please select the model of the car";
    break;
}

     if(empty($_POST['max']))
    {
      $maxerr="Please enter the number of days";
    }
     else
     {
    if(!(preg_match("/^[0-9]*$/", $_POST['max'])))
    {
        $maxerr="Please enter a valid number";
     }
   else   {
     $cmax=$_POST['max'];
}}

     if(empty($_POST['price']))
    {
      $prerr="Please enter a the price";
    }else
     {
    if(!(preg_match("/^[0-9]*$/", $_POST['price'])))
    {
        $prerr="Please enter a valid number";
     }
     else
     {
     $cprice=$_POST['price'];
}}


	  	$image = $_FILES['image']['name'];
	   	$target = "images/".basename($image);





$sql="INSERT INTO cars(`drivid`,`cname`,`cyear`,`ctype`,`cdays`,`cprice`,`image`) VALUES ('$driverid','$cname','$cyear','$type','$cmax','$cprice','$image')";

         $res=mysqli_query($con,$sql);

         if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	} 
         
         if($res)
         {
          $regerror = 'Successfully Attached!';
         }
         else
         {
          $regerror = "Attaching Failed. Please try again.";
         }

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
  	<div class="col col-md-2 mt-5 ml-4"></div>
    <div class="col col-md-6 mt-5 ml-4">
      <h4>To Register as a Driver :</h4>
      <form class="form-horizontal" method="post" action="attach.php" enctype="multipart/form-data">
        <div class="form-goup">
          <label class="control-label">Name of the Car: </label>
          <input type="text" class="form-control" id="name" placeholder="Enter Car name" name="car">
          <div><?php echo $nameerr ?></div>
        </div>
        <div class="form-goup">
          <label class="control-label">Manufacturing Year : </label>
          <input type="text" class="form-control" id="email" placeholder="Enter the Manufacturing Year" name="year">
          <div><?php echo $manerr ?></div>
        </div>
        <div class="form-group">
      	<label for="type">Type of Car:</label>
      		<select class="form-control" id="type" name="type">
        		<option value="">Select a Car</option>      			
        		<option value="option1">Hatchback</option>
        		<option value="option2">Sedan</option>
       	 		<option value="option3">MPV</option>
        		<option value="option4">SUV</option>
        		<option value="option5">Crossover</option>
        		<option value="option6">Coupe</option>
      		</select>
      	<div><?php echo $typerr ?></div>
        </div>
        <div class="form-goup">
          <label class="control-label">Maximum number of Days available to book: </label> 
          <input type="text" class="form-control" id="password" placeholder="Enter number of Days" name="max">
          <div><?php echo $maxerr ?></div>
        </div>
        <div class="form-goup">
          <label class="control-label">Price per day(In Rs) : </label> 
          <input type="text" class="form-control" id="password" placeholder="Enter the prive in Rs" name="price">
          <div><?php echo $prerr ?></div>
        </div>
        <div class="form-group">
        <label class="control-label">Please Upload the image of the vehicle : </label>         
		<input type="file" name="image">        <div><?php echo $msg; ?></div>

            </div>
          <div class="form-group">        
            <button type="submit" class="btn btn-warning mt-3" name="attach">Attach</button>
            <div><?php echo $regerror; ?></div>
            </div>
      </form>
      	<div class="col col-md-4 mt-5 ml-4"></div>   
    </div>
 </div> 
 <?php include 'footer.php'; ?>
 </body>
 </html>