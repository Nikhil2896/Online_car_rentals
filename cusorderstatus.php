<?php
include 'header3.php';
include 'dbconnections.php';

$id=$_GET['id'];

$msg='';

$sql= "SELECT orders.oid AS Order_id, orders.cdivid AS driver ,cars.cname AS car, cars.image AS image, cars.cprice AS price, orders.date AS bdate, orders.days AS days, orders.address AS address, orders.status AS status from orders JOIN cars ON orders.carid=cars.cid WHERE orders.oid=$id";

		$res=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($res);

		$orderid= $row['Order_id'];
		$driver= $row['driver'];
		$car= $row['car'];
		$image=$row['image'];
		$amount=$row['price'];
		$date= $row['bdate'];
		$days= $row['days'];
		$address= $row['address'];
		$status= $row['status'];

		$price=$row['price']*$row['days'];

		$_SESSION['Order_id2']=$row['Order_id'];

		$sql3= "SELECT * FROM driver WHERE did = $driver";

		$res3=mysqli_query($con,$sql3);
		$row3=mysqli_fetch_array($res3);		

		$divname= $row3['dname'];
		$divphone= $row3['dphone'];
		

		if ($status=='rejected') {
			$msg ='Your booking have been Cancelled';
			?>
			<style type="text/css">
			.details button{
			display: none;
			}

			.pending{
			display: none;
			}

			.message{
				width: 80%;
				background-color: #ffcccc;
				height: 75px;
				border : 2px solid red;
				margin-top: 30px;
			}

			.message h4{
				margin-left: 35px;
				color: red;
			}

			</style>

<?php
		}

		if ($status=='accepted') {
			$msg ='Your booking have been accepted';
			?>
			<style type="text/css">
			.details button{
			display: none;
			}

			.pending{
			display: none;
			}

			.message{
				width: 80%;
				background-color: #b3ffb3;
				height: 75px;
				border : 2px solid green;
				margin-top: 30px;
			}

			.message h4{
				margin-left: 35px;
				color: green;
			}		
			</style>

<?php
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <style type="text/css">
		img{
			width: 100%;
			margin: 70px 30px;
		}

		.details{
			margin: 70px 0px 0px 50px;
		}

		.details h4{
			padding: 10px;
		}

		.details button{
			width : 400px;
		}

		.pending{
			width: 80%;
			background-color: #d9d9d9;
			padding: 10px;
			border : 2px solid black;
			margin-top: 30px;
			text-align: center;
		}

	</style>  
</head>
<body>
<div class = "container">
	<h2 class="text-center font-weight-bold">Booking details</h2>
	<h3 class="font-weight-bold ml-5 mt-5">Booking Number : <?php echo $orderid ?></h3>
		<div class="row">
			<div class="col-md-5">
				<img src="images/<?php echo $image ?>" style="height: 250px">
				<h4 class="font-weight-bold ml-5">Driver Name : <?php echo $divname ?></h4>
				<h4 class="font-weight-bold ml-5">Driver Number : <?php echo $divphone ?></h4>

			</div>
			<div class="col-md-1"></div>
			<div class="col-md-6">
				<div class="details">
					<h4 class="font-weight-bold">Car : <?php echo $car ?></h4>
					<h4 class="font-weight-bold">From : <?php echo $date ?></h4>
					<h4 class="font-weight-bold">For : <?php echo $days.' days' ?></h4>
					<h4 class="font-weight-bold">Price per day : <?php echo 'Rs '.$amount.'/-' ?></h4>
					<h4 class="font-weight-bold">Total Trip Price : <?php echo 'Rs '.$price.'/-' ?></h4>
					<h4 class="font-weight-bold">Pick Up Location : <?php echo $address ?></h4>
        			<div class="pending">
        				<h4 class="font-weight-bold mt-4">Successfully booked the car</h4>
        				<h4 class="font-weight-bold">Pending for driver Confirmation</h4>
        			</div>
        			<form method="post" action="cusorderedit.php">
        			<button type="submit" class="btn btn-warning mt-3" name="edit">Edit booking</button>
        			</form>
        			<div class="message"><h4 class="font-weight-bold mt-4"><?php echo $msg; ?></h4></div>
				</div>
			</div>	
		</div>
</div> 
<?php include 'footer.php'; ?>
</body>
</html>
