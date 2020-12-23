<?php 
include 'dbconnections.php';

$id=$_GET['id'];
if (empty($id)) {
    header("Location:cabstable.php");
}

$sql = "DELETE FROM cars WHERE cid = '$id'";
$res = mysqli_query($con,$sql);

if($res)

{
	header("Location:cabstable.php");
}

else
{
	echo "Data deletion Failed";
}
?>