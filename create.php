<div class="container">
<div class="jumbotron">
		<h1>Create Web Account</h1>
		<p>Give your username and password</p>
	</div>
	
  	<form action="#" method="POST" enctype="multipart/form-data">
    	<div class="form-group">
      		<label for="uname">User Name:</label>
      		<input type="text" class="form-control" id="uname" placeholder="Enter User Name"name="uname">
    	</div>
    	<div class="form-group">
      		<label for="pwd">Password:</label>
      		<input type="password" class="form-control" id="pwd" placeholder="Enter Password"name="upass">
    	</div>
    	<div class="custom-file">
  			<input type="file" class="custom-file-input" id="customFile" name="image">
  			<label class="custom-file-label" for="customFile">Choose file</label>
		</div><br>
    	<button type="submit" class="btn btn-primary btn-lg" name="submit" data-toggle="modal"data-target="#myModal">Create Account</button>
  	</form>
</div>


<?php 
	if(isset($_POST["submit"]))
		{
			$uname= $_POST["uname"];
			$upass= $_POST["upass"];
			$check= getimagesize($_FILES["image"]["tmp_name"]);
			if($check!= FALSE)
			{
				$image= $_FILES["image"]["tmp_name"];
				$imagecontent= addslashes(file_get_contents($image));
			}
			
			$query= "INSERT INTO tbluser VALUES('$uname', '$upass', '$imagecontent')";
			if(mysqli_query($con, $query))
			{ ?>
				<div class="container">
				
				<div class="modal fade" id="myModal" role="dialog">
			    <div class="modal-dialog modal-sm">
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Message</h4>
			        </div>
			        <div class="modal-body">
			          <p>Account created successfully</p>
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
			<?php }
			else
			{
				echo "Error ".$query."<br>".mysqli_errno($con);
			}
		}
	
?>
