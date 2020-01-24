<?php include 'connection.php';
	

	$uid=$_SESSION['uid'];
?>

<link rel="icon" href="../images/N.jpg">

<div colspan="2" class="bg-dark" style="border-radius: 20px;font-family: papyrus;"><h1 class="text-white" align="center">Update Question</h1></div>
<hr>


<?php

	//$uid=$_POST['id'];

	$query="SELECT * FROM `participants` WHERE id='$uid' ";
	$query_run=mysqli_query($con,$query);

	if ($query_run) {
		while($row=mysqli_fetch_array($query_run)){
	?>


<form action="" method="POST">
<center>
	<div class="form-group">
	  <div class="col-8">
		ID<input class="form-control-sm" type="text" name="id" value="<?php echo $row['id'];?>" placeholder="Id" required><br><br>
		Email<input class="form-control" type="text" name="email" value="<?php echo $row['email'];?>" placeholder="Email" required><br>
		Name<input class="form-control" type="text" name="name" value="<?php echo $row['name'];?>" placeholder="Name" required><br>
		Password<input class="form-control" type="text" name="password" value="<?php echo $row['password'];?>" placeholder="Password" required><br>
		Question Type<input class="form-control" type="text" name="quest_type" value="<?php echo $row['quest_type'];?>" placeholder="Question Type" required><br>
		Level<input class="form-control" type="text" name="level" value="<?php echo $row['level'];?>" placeholder="level" required><br>
		Total Question<input class="form-control" type="text" name="total_quest" value="<?php echo $row['total_quest'];?>" placeholder="total_quest" required><br>
		Attempted<input class="form-control" type="text" name="attempted" value="<?php echo $row['attempted'];?>" placeholder="attempted" required><br>
		Correct Answers<input class="form-control" type="text" name="corr_ans" value="<?php echo $row['corr_ans'];?>" placeholder="corr_ans" required><br>
		Wrong Answers<input class="form-control" type="text" name="wrong_ans" value="<?php echo $row['wrong_ans'];?>" placeholder="wrong_ans" required><br>
		Not Attempted<input class="form-control" type="text" name="no_attempt" value="<?php echo $row['no_attempt'];?>" placeholder="no_attempt" required><br>
		percentage<input class="form-control" type="text" name="percentage" value="<?php echo $row['percentage'];?>" placeholder="percentage" required><br>
		<input class="btn btn-success" type="submit" name="update" value="Update Data">
		<a href="?page=participants" class="btn btn-danger">Cancel</a>

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
		$email = $_POST['email'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$quest_type = $_POST['quest_type'];
		$level = $_POST['level'];
		$total_quest = $_POST['total_quest'];
		$attempted = $_POST['attempted'];
		$corr_ans = $_POST['corr_ans'];
		$wrong_ans = $_POST['wrong_ans'];
		$no_attempt = $_POST['no_attempt'];
		$percentage = $_POST['percentage'];
		
		$query = " UPDATE `participants` SET id='$id',email='$email',password='$password',name='$name',quest_type='$quest_type',level='$level',total_quest='$total_quest',attempted='$attempted',corr_ans='$corr_ans',wrong_ans='$wrong_ans',no_attempt='$no_attempt',percentage='$percentage'  WHERE id='$uid' ";
		 
		 $query_run = mysqli_query($con,$query);
		   if ($query_run) {
				echo '<script> 
						  alert("Participants Updated...");
						  window.location="?page=participants";
					  </script>';
		    }else{
			  echo "<script> alert('Participants Not Updated...');</script>";
			  echo $query;
		   }
	}
	
?>