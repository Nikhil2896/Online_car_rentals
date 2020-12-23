<?php
include 'header3.php';
include 'dbconnections.php';

$id=$_GET['id'];
if (empty($id)) {
    header("Location:search.php");
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


	$_SESSION['cid']=$row['cid'];
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

		.details h4{
			padding: 10px;
		}

		.buttons{
			margin-left: 40%;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<img src="images/<?php echo $image ?>" style="height: 250px">
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-6">
				<div class="details">
					<h3>Name of the Car : <?php echo $name; ?></h3>
					<h4>Type : <?php echo $type; ?></h4>
					<h4>Model/Year : <?php echo $year; ?></h4>
					<h4>Maxumum number of days available: <?php echo $adays; ?></h4>
					<h4>Price : <?php echo 'Rs'.$price.'/-'; ?></h4>
					<a href="order.php?id=<?php echo $cid;?>"><button class="btn btn-warning mt-4" style="width: 400px;">Click here to book this cab</button></a>
				</div>
			</div>
		</div>
	</div>
<?php include 'footer.php'; ?>
</body>
</html>