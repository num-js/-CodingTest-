<link rel="icon" href="../images/N.jpg">

<div colspan="2" class="bg-dark" style="border-radius: 20px;font-family: papyrus;"><h1 class="text-white" align="center">Add Questions</h1></div>

<?php 
	require_once "../inc/connection.php";     //Connection
?>
<center>
	<div class="jumbotron col-lg-84">
		<!--Add Question Form-->
<form action="" method="post" class="form">
  <input type="text" name="id" placeholder="ID" class="form-control-sm"><br>
  <textarea type="text" name="quest" placeholder="Question" class="form-control form-control-lg" style="height:200px;" required></textarea><br>
  <textarea type="text" name="opt1" placeholder="Option 1" class="form-control" required></textarea> <br>  
  <textarea type="text" name="opt2" placeholder="Option 2" class="form-control" required></textarea> <br>  
  <textarea type="text" name="opt3" placeholder="Option 3" class="form-control"></textarea> <br>  
  <textarea type="text" name="opt4" placeholder="Option 4" class="form-control"></textarea> <br>
  <textarea type="text" name="ans" placeholder="Correct Answer" class="form-control" required></textarea> <br>

  <select class="form-control" name="cat_name" required>
	<option selected value="0" disabled>Question Category</option>
	 <?php
			$query = "SELECT * FROM category";
			$query_run = mysqli_query($con,$query);
			if ($query_run) {
				while ($row = mysqli_fetch_array($query_run)) {
		?>
				<option value="<?php echo $row['cat_name']; ?>"><?php echo $row['cat_name']; ?></option>
		<?php
				}
			}
		?>
  </select><br>

  <select class="form-control" name="level" required>
	<option selected="selected" value="0" disabled>Question Level</option>
	<option value="Beg">Beg</option>
	<option value="Pro">Pro</option>
  </select>
<br>
  <input type="submit" name="submit" value="Submit" class="btn btn-warning">
</form>
	</div>


<hr>
<br>



<?php

	if (isset($_POST['submit'])) {
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


		$array = [$opt1,$opt2,$opt3,$opt4]; //get all the options in an array for serch
		$ans_id = array_search($ans,$array);
			//For category_id
		$cat_name = $_POST['cat_name'];
			//For Question Level
		$level = $_POST['level'];
		
		$query = " INSERT INTO questions (id,quest,opt1,opt2,opt3,opt4,ans_id,category,level) VALUES ('$id','$quest','$opt1','$opt2','$opt3','$opt4',$ans_id,'$cat_name','$level') ";
		 $query_run = mysqli_query($con,$query);
		 if ($query_run) {
			echo "<script> alert('Question Inserted...');</script>";
			include_once "$page.php";
		}else{
			echo "<script> alert('Question Not Inserted...');</script>";
			echo $query;
		}
	}
?>
</center>
<?php include_once 'all_questions.php'; ?>