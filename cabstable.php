<?php 

include 'adheader.php';
include 'dbconnections.php';

$sql="SELECT * from cars";

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
  <h2>Data of Cars on The Road Rails:</h2>
      <div class="col col-md-1 mt-5 ml-4"></div>
      <div class="col col-md-10 mt-5 ml-4">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Year</th>
        <th>days</th>
        <th>Price</th>
        <th>Delete</th>
      </tr>
    </thead>

<?php
while ($row=mysqli_fetch_array($res)) {

$id=$row['cid'];
$name=$row['cname'];
$year=$row['cyear'];
$days=$row['cdays'];
$price=$row['cprice'];

?>
    <tbody>
      <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo $year; ?></td>
        <td><?php echo $days; ?></td>
        <td><?php echo $price; ?></td>
        <td><button class="btn btn-warning ml-3"><a href="cadelete.php?id=<?php echo $id;?>">Delete</a></button></td>
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