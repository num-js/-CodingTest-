<?php
	require_once 'conn.php';
	if (isset($_POST['id'])) {
		$id = $_POST['id'];

		$query = " DELETE FROM `tbl_comment` WHERE comment_id='$id' ";
		//$query = " UPDATE `tbl_comment` SET `active` = '0' WHERE comment_id='$id' ";	
		$statement = $connect->prepare($query);
		$query_run = $statement->execute();
 		if ($query_run) {
			echo "Deleted";
		}else{
			echo "Not Deleted";
		}
	}
?>