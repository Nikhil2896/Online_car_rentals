<?php
include 'header3.php';
include 'dbconnections.php';

$ordid= $_SESSION['Order_id2'];

if(isset($_POST['cancel']))
{
 $sql="UPDATE `orders` SET `status` = 'rejected' WHERE `oid` = '$ordid'";
 $res=mysqli_query($con,$sql);
 header('Location:cusorder.php');
}


$sql3="SELECT * FROM orders WHERE `oid` = $ordid";

	$res3=mysqli_query($con,$sql3);
	$row3=mysqli_fetch_array($res3);

	$date= $row3['date'];
	$days= $row3['days'];
	$address= $row3['address'];


if(isset($_POST['update']))
{

$udate=$_POST['udate'];
$udays=$_POST['udays'];
$uaddress=$_POST['uaddress'];

$sql4="UPDATE `orders` SET `date` = '$udate' , `days`='$udays',`address`='$uaddress' WHERE `oid` = '$ordid'";

$res4=mysqli_query($con,$sql4);

if ($res4) {
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
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="details">
					<h3>Edit your booking :</h3>
					<form class="form-horizontal mt-5" method="post" action="cusorderedit.php">
 					<div class="form-goup">
 					<label class="control-label">Booking date : </label>
 					<input type="date" class="form-control" id="name" placeholder="Enter the date" name="udate" value="<?php echo $date ?>">
 					</div>
 					<div class="form-goup">
 					<label class="control-label">No of days : </label>
 					<input type="text" class="form-control" id="email" placeholder="Enter the no of days" name="udays" value="<?php echo $days ?>">
 					</div>
 					<div class="form-goup">
 					<label class="control-label">Pick up Address : </label>
 					<input type="text" class="form-control" id="name" placeholder="Enter the address" name="uaddress" value="<?php echo $address ?>">
 					</div>
 					<div class="form-group">        
        			<button type="submit" class="btn btn-warning mt-4 mb-5" name="update">Edit the booking</button><h5>To cancel the booking :</h5>
        			<button type="submit" class="btn btn-warning mt-3" name="cancel">Cancel the booking</button>
      				</div>
 					</form> 
				</div>
			</div>
			<div class="col-md-3">
				</div>
		</div>
	</div>
<?php include 'footer.php'; ?>
</body>
</html>