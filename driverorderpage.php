<?php
include 'dheader.php';
include 'dbconnections.php';

$id=$_GET['id'];

$msg='';

$sql= "SELECT orders.oid AS Order_id, orders.cusid AS customer ,cars.cname AS car, cars.image AS image, cars.cprice AS price, orders.date AS bdate, orders.days AS days, orders.address AS address, orders.status AS status from orders JOIN cars ON orders.carid=cars.cid WHERE orders.oid=$id";

		$res=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($res);

		$orderid= $row['Order_id'];
		$customer= $row['customer'];
		$car= $row['car'];
		$image=$row['image'];
		$amount=$row['price'];
		$date= $row['bdate'];
		$days= $row['days'];
		$address= $row['address'];
		$status= $row['status'];

		$price=$row['price']*$row['days'];

		$_SESSION['Order_id']=$row['Order_id'];

$sql3= "SELECT * FROM register WHERE rid = $customer";

		$res3=mysqli_query($con,$sql3);
		$row3=mysqli_fetch_array($res3);		

		$cusname= $row3['name'];
		$cusphone= $row3['phone'];
		

		if ($status=='rejected') {
			$msg ='Booking have been Cancelled';
			?>
			<style type="text/css">
			.details button{
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
				margin-left: 50px;
				color: red;
			}

			</style>

<?php
		}

		if ($status=='accepted') {
			$msg ='Booking have been accepted';
			?>
			<style type="text/css">
			.details button{
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
				margin-left: 50px;
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
			width : 230px;
		}

	</style>  
</head>
<body>
<div class = "container">
	<h2 class="text-center font-weight-bold">Booking details</h2>
	<h3 class="font-weight-bold ml-5 mt-5">Booking Number : <?php echo $orderid ?></h3>
		<div class="row">
			<div class="col-md-5">
				<h3 class="font-weight-bold ml-5 mt-5">Car Details : </h3>
				<img src="images/<?php echo $image ?>" style="height: 250px">
				<h4 class="font-weight-bold text-center">Car : <?php echo $car ?></h4>
				<h4 class="font-weight-bold text-center">Price : <?php echo 'Rs '.$amount.'(Per day)' ?></h4>
				<h4 class="font-weight-bold text-center">Total Trip Price : <?php echo 'Rs '.$price.'/-' ?></h4>

			</div>
			<div class="col-md-1"></div>
			<div class="col-md-6">
				<h3 class="font-weight-bold ml-5 mt-5">Car Booked by : </h3>
				<div class="details">
					<h4 class="font-weight-bold">Name : <?php echo $cusname ?></h4>
					<h4 class="font-weight-bold">From : <?php echo $date ?></h4>
					<h4 class="font-weight-bold">For : <?php echo $days.' days' ?></h4>
					<h4 class="font-weight-bold">Pick Up Location : <?php echo $address ?></h4>
					<h4 class="font-weight-bold">Customer Mobile  : <?php echo $cusphone ?></h4>
					<form method="post" action="orderstatuspage.php">
        			<button type="submit" class="btn btn-warning mt-3" name="accepted">Accept</button>
        			<button type="submit" class="btn btn-warning mt-3" name="rejected">Reject</button>
        			</form>
        			<div class="message"><h4 class="font-weight-bold mt-4"><?php echo $msg; ?></h4></div>
				</div>
			</div>	
		</div>
</div> 
<?php include 'footer.php'; ?>
</body>
</html>
