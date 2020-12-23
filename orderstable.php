<?php 

include 'adheader.php';
include 'dbconnections.php';

$sql="SELECT orders.oid AS Order_id, cars.cname AS car, cars.cprice AS price, orders.date AS bdate, orders.days AS days, orders.address AS address, orders.status AS status from orders JOIN cars ON orders.carid=cars.cid ORDER BY orders.oid DESC";

$res=mysqli_query($con,$sql);

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
  <h2>Data of Bookings on The Road Rails:</h2>
      <div class="col col-md-1 mt-5 ml-4"></div>
      <div class="col col-md-10 mt-5 ml-4">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Order Id</th>
        <th>Car</th>
        <th>Date</th>
        <th>days</th>
        <th>Address</th>
        <th>Price(per day)</th>
        <th>Status</th>
      </tr>
    </thead>

<?php
while ($row=mysqli_fetch_array($res)) {

    $orderid= $row['Order_id'];
    $car= $row['car'];
    $amount=$row['price'];
    $date= $row['bdate'];
    $days= $row['days'];
    $address= $row['address'];
    $status= $row['status'];


?>
    <tbody>
      <tr>
        <td><?php echo $orderid; ?></td>
        <td><?php echo $car; ?></td>
        <td><?php echo $date; ?></td>
        <td><?php echo $days; ?></td>
        <td><?php echo $address; ?></td>
        <td><?php echo 'Rs '.$amount.'/-' ?></td>
        <td><?php echo $status; ?></td>
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