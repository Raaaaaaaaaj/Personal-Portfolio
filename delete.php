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
    		<h1>Delete Web Account</h1>
    		<p>Delete account</p>
  		</div>
	  	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
	    	<div class="form-group">
				<label for="name">Name</label><br>
				<input type="text" name="name" id="name"><br><br>

	      		<label for="upass">Enter Password:</label>
	      		<input type="password" class="form-control" id="upass" placeholder="New password" name="upass"><br><br>
				  <label for="upass">Reason:</label><br>
				  <textarea name="reason" id="reason"></textarea>
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

				$result = "DELETE FROM tbluser WHERE upass='$upass'";
				if(mysqli_query($con, $result))
				{  
					
					header("location: login.php"); 	
					
 				}
 				

				
		$uname= $_POST["name"];
		$upass= $_POST["upass"];
		$reason =$_POST["reason"];

		$query= "INSERT INTO dltuser VALUES('$uname', '$upass', '$reason')";
		
		if(mysqli_query($con,$query))
		{
			echo "account deleted succesfully";
		}
			}	
		}




		mysqli_close($con);

	?>
</body>
</html>