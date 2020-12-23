<?php
include 'header3.php';
include 'dbconnections.php';

$id=$_SESSION['cid'];

$sql="SELECT * from cars where cid='$id'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

	$did=$row['drivid'];
	$name=$row['cname'];
	$price=$row['cprice'];
	$image=$row['image'];

if(isset($_POST['order'])){

	$date=$_POST['date'];
	$days=$_POST['days'];
	$address=$_POST['address'];

$sql3="INSERT INTO `orders`(`oid`, `cusid`, `carid`, `cdivid`, `date`, `days`, `address`, `status`) VALUES ('','$customerid','$id','$did','$date','$days','$address','pending')";

         $res3=mysqli_query($con,$sql3);

          if($res3)
         {
		  header('Location:cusorder.php');
		}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		img{
			width: 100%;
			margin: 70px 30px;
		}
		.details{
			margin: 70px 30px;
		}

	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="details">
					<h3>Complete your booking :</h3>
					<form class="form-horizontal mt-5" method="post" action="order.php">
 					<div class="form-goup">
 					<label class="control-label">Booking from : </label>
 					<input type="date" class="form-control" id="name" placeholder="Enter the date" name="date">
 					</div>
 					<div class="form-goup">
 					<label class="control-label">No of days : </label>
 					<input type="text" class="form-control" id="email" placeholder="Enter the no of days" name="days">
 					</div>
 					<div class="form-goup">
 					<label class="control-label">Pick up Address : </label>
 					<input type="text" class="form-control" id="name" placeholder="Enter the address" name="address">
 					</div>
 					<div class="form-group">        
        			<button type="submit" class="btn btn-warning mt-3" name="order">Book the Cab</button>
      				</div>
 					</form> 
				</div>
			</div>
			<div class="col-md-5">
				<img src="images/<?php echo $image ?>" style="height: 250px">
				<h4>Name of the Car : <?php echo $name; ?></h4>
				<h4>Price : <?php echo 'Rs'.$price.'/- (Per day)'; ?></h4>
			</div>
		</div>
	</div>
<?php include 'footer.php'; ?>
</body>
</html>