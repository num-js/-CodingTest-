<?php include 'connection.php';
	

	$uid=$_SESSION['uid'];
?>

<link rel="icon" href="../images/N.jpg">

<div colspan="2" class="bg-dark" style="border-radius: 20px;font-family: papyrus;"><h1 class="text-white" align="center">Update Question</h1></div>
<hr>


<?php

	//$uid=$_POST['id'];

	$query="SELECT * FROM questions WHERE id='$uid' ";
	$query_run=mysqli_query($con,$query);

	if ($query_run) {
		while($row=mysqli_fetch_array($query_run)){
	?>


<form action="" method="POST">
<center>
	<div class="form-group">
		<div class="col">
		
		<input class="form-control-sm" type="text" name="id" value="<?php echo $row['id'];?>" placeholder="Question Id"><br>

		<textarea class="form-control form-control-lg" style="height:200px;" type="text" name="quest" placeholder="Question" required><?php echo $row['quest'];?></textarea><br>
		
		<textarea class="form-control" type="text" name="opt1" placeholder="Option 1" required><?php echo $row['opt1'];?></textarea><br>

		<textarea class="form-control" type="text" name="opt2" placeholder="Option 2" required><?php echo $row['opt2'];?></textarea><br>

		<textarea class="form-control" type="text" name="opt3" placeholder="Option 3"><?php echo $row['opt3'];?></textarea><br>
		
		<textarea class="form-control" type="text" name="opt4" placeholder="Option 4"><?php echo $row['opt4'];?></textarea><br>

		<textarea class="form-control" type="text" name="ans" placeholder="Correct Ans" required></textarea><br>
		
		<input class="form-control" type="text" name="category" value="<?php echo $row['category'];?>" placeholder="Category" required><br>
		
		<input class="form-control" type="text" name="level" value="<?php echo $row['level'];?>" placeholder="Level" required><br>
		
		<input class="btn btn-success" type="submit" name="update" value="Update Data">
		
		<a href="?page=all_questions" class="btn btn-danger">Cancel</a>
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
		
		$quest = htmlentities($_POST['quest']);
		$quest = mysqli_real_escape_string($con,$quest);
		
		$opt1 = htmlentities($_POST['opt1']);
		$opt1 = mysqli_real_escape_string($con,$opt1);
		
		$opt2 = htmlentities($_POST['opt2']);
		$opt2 = mysqli_real_escape_string($con,$opt2);

		$opt3 = htmlentities($_POST['opt3']);
		$opt3 = mysqli_real_escape_string($con,$opt3);

		$opt4 = htmlentities($_POST['opt4']);
		$opt4 = mysqli_real_escape_string($con,$opt4);

		$ans = htmlentities($_POST['ans']);	//For Correct ans_id
		$ans = mysqli_real_escape_string($con,$ans);

				//Searching Correct Answers
		$array = [$opt1,$opt2,$opt3,$opt4]; //get all the options in an array for serch
		$ans_id = array_search($ans,$array);
			//For category_id
		$category = $_POST['category'];

			//For Question Level
		$level = $_POST['level'];


		echo $query = " UPDATE questions SET id='$id',quest='$quest',opt1='$opt1',opt2='$opt2',opt3='$opt3',opt4='$opt4',ans_id='$ans_id',category='$category',level='$level' WHERE id='$uid' ";
		 
		 $query_run = mysqli_query($con,$query);
		   if ($query_run) {
				echo '<script> 
						  alert("Question Updated...");
						  window.location="?page=all_questions";
					  </script>';
		    }else{
			  echo "<script> alert('Question Not Updated...');</script>";
			  echo $query;
		   }
	}
	
?>