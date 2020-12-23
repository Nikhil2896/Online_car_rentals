<?php 
include 'dbconnections.php';

$id=$_GET['id'];
if (empty($id)) {
    header("Location:driverstable.php");
}

$sql = "DELETE FROM driver WHERE did = '$id'";
$res = mysqli_query($con,$sql);

if($res)

{
	header("Location:driverstable.php");
}

else
{
	echo "not success";
}
?>