<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php include("home.php"); ?>
	<div class="container">
	  	<div class="jumbotron">
    		<h1>Login Web Account</h1>
    		<p>Give your registered username and password</p>
  		</div>
	  	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
	    	<div class="form-group">
	      		<label for="uname">User Name:</label>
	      		<input type="text" class="form-control" id="uname" placeholder="Enter User Name" name="uname">
	    	</div>
	    	<div class="form-group">
	      		<label for="pwd">Password:</label>
	      		<input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="upass">
	    	</div>
	    	<button type="submit" class="btn btn-primary btn-lg" name="submit">Login</button>
	  	</form>
	</div>

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
			if(isset($_POST["submit"]))
			{
				$uname= $_POST["uname"];
				$upass= $_POST["upass"];

				$result= mysqli_query($con, "SELECT * FROM tbluser WHERE uname='$uname' AND upass='$upass'");
				$row= mysqli_fetch_array($result);
				if($row['uname']==$uname && $row['upass']==$upass)
				{
					$image= $row['image'];
					$cartarray= Array($uname, $image);
					$_SESSION['uname']=$uname;
					header("location: profile.php");
				}
				else
				{
					echo "Login failed";
				}

			}
		}

	?>

</body>
</html>