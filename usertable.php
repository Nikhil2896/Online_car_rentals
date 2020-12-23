<?php 

include 'adheader.php';
include 'dbconnections.php';

$sql="SELECT * from register";

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
  <h2>Data of Users of The Road Rails:</h2>
      <div class="col col-md-1 mt-5 ml-4"></div>
      <div class="col col-md-10 mt-5 ml-4">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Delete</th>
      </tr>
    </thead>

<?php
while ($row=mysqli_fetch_array($res)) {

$id=$row['rid'];
$name=$row['name'];
$email=$row['email'];
$phone=$row['phone'];

?>
    <tbody>
      <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $phone; ?></td>
        <td><button class="btn btn-warning ml-3"><a href="addelete.php?id=<?php echo $id;?>">Delete</a></button></td>
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