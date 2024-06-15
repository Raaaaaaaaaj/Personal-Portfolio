<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include("home.php"); ?>
	<div class="container">
	<?php 
		session_start();
		$host="localhost";
		$user="root";
		$pass="";
		$dbname="cruddb";
		$con=mysqli_connect($host, $user, $pass, $dbname);
			if(!$con)
			{
				die(mysqli_connect_error("Connection failed"));
			}
			else
			{
				$result= mysqli_query($con, "SELECT * FROM tbluser");
				$row= mysqli_fetch_array($result);
				if(isset($_SESSION['uname']))
				{
					echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" height="200" width="200"/>';
				}
			}
?>
	
	<?php
			$host="localhost";
			$user="root";
			$pass="";
			$dbname="cruddb";

			

			if(isset($_SESSION['uname']))
		{
			
			echo "<h1 class='display-1'>Welcome ". $_SESSION['uname']. "</h1>";
		}


		?>
		<br><br><button class="btn btn-primary btn-lg"><a href="update.php" style="color: white; text-decoration: none;">Change password</a></button><br>
		<br><button class="btn btn-warning btn-lg"><a href="delete.php" style="text-decoration: none;">Delete account</a></button>

	</div>
	
</body>
</html>