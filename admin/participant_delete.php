<?php
	require_once 'connection.php';

	if (isset($_POST['submit'])) {
		
		$id = $_POST['id'];

		$query = "DELETE FROM `participants` WHERE id='$id' ";

		$query_run=mysqli_query($con,$query);

		if($query_run) {
			echo '<script> 
					alert("Participants Deleted...");
					window.location="?page=participants";
				  </script>';
		}else{
			echo "<script> alert('Participants Not Deleted'); </script>";
		}
	}
?>