<?php 
include 'dheader.php';
include 'dbconnections.php';

$sql="SELECT * from cars where drivid = $driverid";

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
<div class="container">
	<h3>Your Cabs :</h3>
	<div class="row mt-5">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="row">

	       	<?php
			while ($row=mysqli_fetch_array($res)) {

			$cid=$row['cid'];
			$name=$row['cname'];
			$type=$row['ctype'];
			$price=$row['cprice'];
			$image=$row['image'];

			?>
    <div class="col-md-4 tn">
      <div class="thumbnail">
      	<a href="dcab.php?id=<?php echo $cid;?>">
          <img src="images/<?php echo $image ?>" alt="Cabs" style="width:100%; height: 150px;">
          <div class="caption text-center">
				<p><?php echo $name ?></p>
            	<span class="mr-3">Type : <?php echo $type; ?></span><span> Price: <?php echo "Rs ".$price.'/-'; ?></span>
          </div></a>
      </div>
    </div>
     <?php } ?>
  </div>
	</div>
		<div class="col-md-1"></div>
	</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
