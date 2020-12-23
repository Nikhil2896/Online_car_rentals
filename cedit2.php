<?php

include 'dbconnections.php';
if(isset($_POST['update']))
{

$id=$_POST['id'];
$name=$_POST['ucar'];
$uyear=$_POST['uyear'];
$umax=$_POST['umax'];
$price=$_POST['uprice'];

$sql="UPDATE `cars` SET `cname` = '$name' , `cyear`='$uyear',`cdays`='$umax',`cprice`='$price'  WHERE `cid` = '$id'";

$res=mysqli_query($con,$sql);


if($res)
{
	header("Location:display.php");
}
else
{
	echo "Failed to Edit";
}
}
?>