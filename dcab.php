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
				</div>
			</div>
		</div>
		<div class="buttons"><button class="btn btn-warning mt-4"><a href="caredit.php?id=<?php echo $cid;?>">Edit</a></button>
							 <button class="btn btn-warning mt-4"><a href="cardelete.php?id=<?php echo $cid;?>">Delete</a></button>
		</div>
	</div>
<?php include 'footer.php'; ?>
</body>
</html>