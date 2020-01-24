<?php
	require_once 'connection.php';

	if (isset($_POST['submit'])) {
		
		$id = $_POST['id'];

		$query = "DELETE FROM questions WHERE id='$id' ";

		$query_run=mysqli_query($con,$query);

		if($query_run) {
			echo '<script> 
					alert("Question Deleted...");
					window.location="?page=all_questions";
				  </script>';
		}else{
			echo "<script> alert('Data Not Deleted'); </script>";
		}
	}
?>