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
		if(isset($_SESSION['uname']))
		{
			echo "Welcome ".$_SESSION["uname"];
		}
	?>

		<div class="jumbotron">
    		<h1>Update Web Account</h1>
    		<p>Give your new password</p>
  		</div>
	  	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
	    	<div class="form-group">
	      		<label for="upass">New Password:</label>
	      		<input type="password" class="form-control" id="upass" placeholder="New password" name="upass">
	    	</div>
	    	<div class="form-group">
	      		<label for="pwd">Confirm Password:</label>
	      		<input type="password" class="form-control" id="pwd" placeholder="Confirm  Password" name="cpass">
	    	</div>
	    	<button type="submit" class="btn btn-default" name="submit">Update</button>
	  	</form>
	</div>
	</div>

	<?php 
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
			if(isset($_POST["submit"]))
			{
				$upass= $_POST["upass"];
				$cpass= $_POST["cpass"];
				if(strcmp($upass, $cpass)==0)
				{
					$uname= $_SESSION["uname"];
					if(!empty($uname))
					{
						$result= "UPDATE tbluser SET upass='$upass' WHERE uname='$uname'";
						if(mysqli_query($con, $result))
						{
							echo "Password updated";
						}
					}
				}
				else
				{
					echo "Password mismatch";
				}
			}
		}
		mysqli_close($con);

	?>
</body>
</html>