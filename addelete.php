<?php 
include 'dbconnections.php';

$id=$_GET['id'];
if (empty($id)) {
    header("Location:usertable.php");
}

$sql = "DELETE FROM register WHERE rid = '$id'";
$res = mysqli_query($con,$sql);

if($res)

{
	header("Location:usertable.php");
}

else
{
	echo "Data deletion Failed";
}
?>