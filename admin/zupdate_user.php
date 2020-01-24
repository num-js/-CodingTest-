<?php include 'connection.php';
	

	$uid=$_SESSION['uid'];
?>

<link rel="icon" href="../images/N.jpg">

<div colspan="2" class="bg-dark" style="border-radius: 20px;font-family: papyrus;"><h1 class="text-white" align="center">Update Question</h1></div>
<hr>


<?php

	//$uid=$_POST['id'];

	$query="SELECT * FROM `register` WHERE id='$uid' ";
	$query_run=mysqli_query($con,$query);

	if ($query_run) {
		while($row=mysqli_fetch_array($query_run)){
	?>


<form action="" method="POST">
<center>
	<div class="form-group">
	  <div class="col-8">
		
		<input class="form-control-sm" type="text" name="id" value="<?php echo $row['id'];?>" placeholder="Id" required><br>
		<input class="form-control" type="text" name="name" value="<?php echo $row['name'];?>" placeholder="Name" required><br>
		<input class="form-control" type="text" name="email" value="<?php echo $row['email'];?>" placeholder="Email" required><br>
		<input class="form-control" type="text" name="password" value="<?php echo $row['password'];?>" placeholder="Password" required><br>
		<input class="form-control" type="text" name="college" value="<?php echo $row['college'];?>" placeholder="College" required><br>
		<input class="form-control" type="text" name="course" value="<?php echo $row['course'];?>" placeholder="Course" required><br>
		<input class="btn btn-success" type="submit" name="update" value="Update Data">
		<a href="?page=registered_users" class="btn btn-danger">Cancel</a>

	  </div>
	</div>
</center>
</form>
			<?php
		}
	}else{
		echo "Data not Found";
	}
?>


<?php

	if (isset($_POST['update'])) {

		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$college = $_POST['college'];
		$course = $_POST['course'];
		
		$query = " UPDATE `register` SET id='$id',name='$name',email='$email',password='$password',college='$college',course='$course'  WHERE id='$uid' ";
		 
		 $query_run = mysqli_query($con,$query);
		   if ($query_run) {
				echo '<script> 
						  alert("Question Updated...");
						  window.location="?page=registered_users";
					  </script>';
		    }else{
			  echo "<script> alert('Question Not Updated...');</script>";
			  echo $query;
		   }
	}
	
?>