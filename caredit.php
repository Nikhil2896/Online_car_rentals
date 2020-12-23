<?php 
include 'dheader.php';
include 'dbconnections.php';

$id=$_GET['id'];
if (empty($id)) {
    header("Location:display.php");
}

$sql="SELECT * from cars where cid='$id'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

	$cid=$row['cid'];
	$name=$row['cname'];
	$year=$row['cyear'];
  $type=$row['ctype'];
	$adays=$row['cdays'];
	$price=$row['cprice'];
	$image=$row['image'];


$nameerr=$manerr=$typerr=$maxerr=$regerror=$prerr=$msg="";

if(isset($_POST['update'])){

if(empty($_POST['ucar'])){
  $nameerr = "Please enter the name of the Car";
}
       else
       {
         $cname=$_POST['ucar'];
       } 

   

   if(empty($_POST['uyear']))
   {

    $manerr="Please enter the year";
   }

   else
   {

    if(!(preg_match("/^[0-9]*$/", $_POST['uyear'])))
    {

     $manerr="Please enter a valid year";
    }

    else
    {
      $cyear=$_POST['uyear'];

    }
   }
    

// switch ($operation) {
//     case 'option1':
//     $type = 'Hatchback';
//     break;

//     case 'option2':
//     $type = 'Sedan';
//     break;

//     case 'option3':
//     $type = 'MPV';
//     break;
 
//     case 'option4':
//     $type = 'SUV';
//     break;

//     case 'option5':
//     $type = 'Crossover';
//     break;

//     case 'option6':
//     $type = 'Coupe';
//     break;

//   default:
//     $typerr="Please select the model of the car";
//     break;
// }

     if(empty($_POST['umax']))
    {
      $maxerr="Please enter the number of days";
    }
     else
     {
    if(!(preg_match("/^[0-9]*$/", $_POST['umax'])))
    {
        $maxerr="Please enter a valid number";
     }
   else   {
     $cmax=$_POST['umax'];
}}

     if(empty($_POST['uprice']))
    {
      $prerr="Please enter a the price";
    }else
     {
    if(!(preg_match("/^[0-9]*$/", $_POST['uprice'])))
    {
        $prerr="Please enter a valid number";
     }
     else
     {
     $cprice=$_POST['uprice'];
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
 <div class = "container">
  <div class="row">
    <div class="col col-md-3 mt-5 ml-4"></div>
    <div class="col col-md-6 mt-5 ml-4">
    <h3><b>Edit Car  Details :</b></h3>
    	<form class="form-horizontal" method="post" action="cedit2.php" enctype="multipart/form-data">
        <div class="form-goup">
        	<div class="form-goup">
          <label class="control-label">Car Id : </label>
          <input type="text" class="form-control" id="id" value="<?php echo $id ;?>" name="id" readonly>
        </div>
          <label class="control-label">Name of the Car: </label>
          <input type="text" class="form-control" id="name" value="<?php echo $name ;?>" placeholder="Enter Car name" name="ucar">
          <div><?php echo $nameerr ?></div>
        </div>
        <div class="form-goup">
          <label class="control-label">Manufacturing Year : </label>
          <input type="text" class="form-control" id="email" value="<?php echo $year ;?>" placeholder="Enter the Manufacturing Year" name="uyear">
          <div><?php echo $manerr ?></div>
        </div>
<!--         <div class="form-group">
      	<label for="type">Type of Car:</label>
      		<select class="form-control" id="type" name="type" value="<?php echo $type ?>">
        		<option value="">Select a Car</option>      			
        		<option value="Hatchback">Hatchback</option>
        		<option value="Sedan">Sedan</option>
       	 		<option value="MPV">MPV</option>
        		<option value="SUV">SUV</option>
        		<option value="Crossover">Crossover</option>
        		<option value="Coupe">Coupe</option>
      		</select>
      	<div><?php echo $typerr ?></div>
        </div> -->
        <div class="form-goup">
          <label class="control-label">Maximum number of Days available to book: </label> 
          <input type="text" class="form-control" id="password" value="<?php echo $adays ;?>" placeholder="Enter number of Days" name="umax">
          <div><?php echo $maxerr ?></div>
        </div>
        <div class="form-goup">
          <label class="control-label">Price per day(In Rs) : </label> 
          <input type="text" class="form-control" id="password" value="<?php echo $price ;?>" placeholder="Enter the prive in Rs" name="uprice">
          <div><?php echo $prerr ?></div>
        </div>
          <div class="form-group">        
            <button type="submit" class="btn btn-warning mt-3" name="update">Update</button>
            <div><?php echo $regerror; ?></div>
            </div>
      </form>



        </div>
      <div class="col col-md-3 mt-5 ml-4"></div>
 	</div> 
</div>

<?php include 'footer.php'; ?>
</body>
</html>
