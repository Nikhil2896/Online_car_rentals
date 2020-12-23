<?php
include 'header2.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	
	.user{
		float: right;
		margin: -150px 40px;

	}

	.user a{
		color: #eaca67;
	}

	.home{
		margin: 17% 50px;
	}

</style>

</head>
<body>
	<div class="container">
		<div class="user"><h5><a href="accountedit.php">Your Account</h5></a><a href="cusorder.php"><h5>Your Orders</h5></a></div>
		<div class="home">
		<h4>Welcome to The Rail Road!!</h4>
		<h4>Start searching for the Cars</h4>
		<form method="post" action="search.php">
			<input type="text" name="search" class="search" placeholder="Search here..." style="width: 250px;">
			<button type="sear" style="background-color: #eaca67; border:none;"><i class="fa fa-search" style="font-size:24px"></i></button>
		</form>
	</div>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>