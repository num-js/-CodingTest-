<?php
	require_once 'connection.php';

	if (isset($_POST['submit'])) {
		
		$id = $_POST['id'];

		$query = "DELETE FROM `register` WHERE id='$id' ";

		$query_run=mysqli_query($con,$query);

		if($query_run) {
			echo '<script> 
					alert("User Deleted...");
					window.location="?page=registered_users";
				  </script>';
		}else{
			echo "<script> alert('Data Not Deleted'); </script>";
		}
	}
?>