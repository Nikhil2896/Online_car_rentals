<?php
include 'dheader.php';
include 'dbconnections.php';

$id=$_SESSION['Order_id'];

if(isset($_POST['accepted']))
{
 $sql="UPDATE `orders` SET `status` = 'accepted' WHERE `oid` = '$id'";
 $res=mysqli_query($con,$sql);
}

if(isset($_POST['rejected']))
{
 $sql="UPDATE `orders` SET `status` = 'rejected' WHERE `oid` = '$id'";
 $res=mysqli_query($con,$sql);
}

if($res)
{
	header("Location:driverorder.php");
}

?>

