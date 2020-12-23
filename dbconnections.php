<?php

$hostname = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "project";


$con = mysqli_connect($hostname,$dbuser,$dbpass,$dbname);

if(!$con)
{
	echo "DataBase Not Connected";
}

?>