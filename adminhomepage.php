<?php
include 'adheader.php';
include 'dbconnections.php';

$sql= "SELECT COUNT(*) AS `usercount` FROM `register`";
$res=mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$users = $row['usercount'];

$sql2= "SELECT COUNT(*) AS `drivercount` FROM `driver`";
$res2=mysqli_query($con,$sql2);
$row2 = mysqli_fetch_array($res2);
$drivers = $row2['drivercount'];

$sql3= "SELECT COUNT(*) AS `carcount` FROM `cars`";
$res3=mysqli_query($con,$sql3);
$row3 = mysqli_fetch_array($res3);
$cars = $row3['carcount'];

$sql4="SELECT COUNT(*) AS `ordercount` FROM `orders`";
$res4=mysqli_query($con,$sql4);
$row4 = mysqli_fetch_array($res4);
$orders = $row4['ordercount'];

$sql5="SELECT orders.oid AS Order_id, cars.cname AS car, orders.date AS bdate, orders.days AS days from orders JOIN cars ON orders.carid=cars.cid ORDER BY Order_id DESC";

$res5=mysqli_query($con,$sql5);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">


		.dash p a button{
			border: none;
			width: 110%;
			background-color: #ffffcc;
			text-align: left;
			border-radius: 10px;
		}


		.dash p a button:hover{
			background-color: #ffffe6;

		}

		.footer{
   bottom: 0;
   background-color: #eaca67;
   color: white;
   text-align: center;

	</style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col col-md-2 ml-3" style="background-color: #ffffcc; border-right: 2px double #facf05;">
			<h5 class="mt-5 mb-5">Dashbord</h5>
			<div class="dash ml-4 mt-5">
				<p><a href="usertable.php"><button>Users data</button></a></p>
				<p><a href="driverstable.php"><button>Drivers data</button></a></p>
				<p><a href="cabstable.php"><button>Cabs data</button></a></p>
				<p><a href="orderstable.php"><button>Orders</button></a></p>
			</div>
		</div>
		<div class="col col-md-9 ml-5">
			<div class="row">
				<div class="col col-md-4 mt-5 text-center" style="border: 1px solid #ff3399; background-color: #fff2f9; padding: 15px;">
					<p class="mt-3">Total No of Users</p>
					<h3 style="color: #ff3399;"><?php echo $users ?></h3>
					<p class="mb-4" style="font-size: 10px">(Registered with email address)</p>
				</div>
				<div class="col col-md-4 mt-5 text-center" style="border: 1px solid #3399ff; background-color: #f0f8ff; padding: 15px">
					<p class="mt-3">Total No of Drivers</p>
					<h3 style="color: #3399ff;"><?php echo $drivers ?></h3>
					<p class="mb-4" style="font-size: 10px">(Registered with email address)</p>
				</div>
				<div class="col col-md-4 mt-5 text-center" style="border: 1px solid #8cff66; background-color: #eeffe8; padding: 15px">
					<p class="mt-3">Total No of Cars</p>
					<h3 style="color: #8cff66;"><?php echo $cars ?></h3>
					<p class="mb-4" style="font-size: 10px">(Attached by the Drivers)</p>
				</div>
			</div>
			<div class="row">
				<div class="col col-md-3 mt-5 ml-5 mb-5 text-center" style="border: 1px solid #808080; background-color: #f2f2f2; padding: 15px">
					<p>Total Orders placed Till Now</p>
					<h3><?php echo $orders ?></h3>
					<p class="mb-4" style="font-size: 10px">(Includes the active, pending and rejected orders)</p>
				</div>
				<div class="col col-md-7 mt-5 ml-5  mb-5 text-center" style="border: 1px solid #808080; background-color: #f2f2f2; height: 200px;  overflow: scroll;">
					<p>Orders placed</p>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Order Id</th>
        <th>Car</th>
        <th>Booked for</th>
        <th>No of days</th>
      </tr>
    </thead>

<?php
while ($row5=mysqli_fetch_array($res5)) {

$orderid= $row5['Order_id'];
$car= $row5['car'];
$date= $row5['bdate'];
$days= $row5['days'];


?>
    <tbody>
      <tr>
        <td><?php echo $orderid; ?></td>
        <td><?php echo $car; ?></td>
        <td><?php echo $date; ?></td>
        <td><?php echo $days; ?></td>
      </tr>
    </tbody>
    <?php } ?>
  </table>
</div>

</div>
					

				</div>
			</div>
		</div>
	</div>
</div>	
































</body>
<div class = "container">
<footer class="footer">
  <div>
    <nav class="navbar navbar-expand-sm" style="margin-left: 200px;">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#" style="color: white;">About Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" style="color: white;">Services</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" style="color: white;">Help</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" style="color: white;">Customer Service</a>
    </li>
  </ul>
</nav>
  </div>
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="#"> TheRailRoad.com</a>
  </div>
</footer>
</div>
 </html>
