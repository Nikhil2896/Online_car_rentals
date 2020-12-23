<?php
include 'header3.php';
include 'dbconnections.php';

$sql="SELECT * FROM register WHERE rid = $customerid";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

$id=$row['rid'];
$name=$row['name'];
$email=$row['email'];
$phone=$row['phone'];

$sql3= "SELECT COUNT(*) AS `count` FROM `orders` where cusid= $customerid";
$res3=mysqli_query($con,$sql3);
$row = mysqli_fetch_array($res3);
$count = $row['count'];

?>

<!DOCTYPE html>
 <html>
 <head>
 	<title>registration</title>
 </head>
 <body>
 <div class = "container">
 	<div class="row">
 		<div class="col col-md-3"></div>
 		<div>
 			<h3 class="mt-5 mb-5">Account Details: </h3>
 			<h4>Account Id: <?php echo $id ?></h4>
 			<h4>Name : <?php echo $name ?></h4>
 			<h4>Email: <?php echo $email ?></h4>
 			<h4>Phone Number: <?php echo $phone ?></h4>
 			<h4 class="mb-5">Total no of bookings: <?php echo $count ?></h4>
 		</div>
 		<div class="col col-md-3"></div>
 	</div>
 </div>
 <?php include 'footer.php'; ?>
 </body>
 </html>