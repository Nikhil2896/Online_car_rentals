<?php
include 'dheader.php';
include 'dbconnections.php';

$sql= "SELECT orders.oid AS Order_id, cars.cname AS car, orders.date AS bdate, orders.days AS days from orders JOIN cars ON orders.carid=cars.cid WHERE orders.cdivid=$driverid ORDER BY Order_id DESC";

		$res=mysqli_query($con,$sql);
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<div class = "container">
  <h2>Your Orders :</h2>
      <div class="col col-md-1 mt-5 ml-4"></div>
      <div class="col col-md-10 mt-5 ml-4">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Order Id</th>
        <th>Car</th>
        <th>Booked for</th>
        <th>No of days</th>
        <th>View</th>
      </tr>
    </thead>

	  <?php
			
		while ($row=mysqli_fetch_array($res)) {

		$orderid= $row['Order_id'];
		$car= $row['car'];
		$date= $row['bdate'];
		$days= $row['days'];

		?>
 <tbody>
      <tr>
        <td><?php echo $orderid; ?></td>
        <td><?php echo $car; ?></td>
        <td><?php echo $date; ?></td>
        <td><?php echo $days; ?></td>
        <td><a href="driverorderpage.php?id=<?php echo $orderid;?>"><button class="btn btn-warning ml-3">Open</button></a></td>
      </tr>
    </tbody>
    <?php } ?>
  </table>
</div>

</div>
    <div class="col col-md-1 mt-5 ml-4"></div>
 </div> 
<?php include 'footer.php'; ?>
</body>
</html>


