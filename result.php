<?php
	session_start();
	require_once "inc/connection.php";   

	 //For Question Type
   $quest_type = $_SESSION['quest_type'];
      //For Question Level
   $level = $_SESSION['level'];

	//Total Question Numbers
	$tqn = $_SESSION['tqn'];
	$level = $_SESSION['level'];
	$corr_ans = 0;
	$wrong_ans = 0;
	$attempt = 0;
	$no_attempt = 0;

	$query = "SELECT * FROM `questions` WHERE category='$quest_type' && level='$level' ";
		$query_run = mysqli_query($con,$query);
		if ($query_run) {
			while ($row = mysqli_fetch_array($query_run)) {
			  if($row['ans_id']==$_POST[$row['id']]){
			  		$corr_ans++;
			  }elseif($_POST[$row['id']]=="no_attempt"){
			  		$no_attempt++;
			  }else{
			  		$wrong_ans++;
			  }
			}
		}
?>

<?php include_once 'navbar2.php'; ?>
<br>
<div class="container">
 <div class="jumbotron">
 	<div colspan="2" class="bg-dark" style="border-radius: 20px;font-family: papyrus;"><h1 class="text-white" align="center">Result</h1></div>
 	<hr>
 	<br>

	 <?php 
	 		$attempt = $corr_ans+$wrong_ans;
 		if ($attempt==0) {
			 echo '<h4 align="center" style="color:red;">Please Solve Some Questions</h4>';
			 exit;
 		}
 	?>

  <table class="table table-hover" style="text-align:center;font-family:comic sans MS;">
   <h3 align="center"><b>Name : <?php echo $_SESSION['name']; ?></b></h3>
   <h5 align="center">Test Type : <?php echo $quest_type ?></h5>
   <h5 align="center">Level : <?php echo $level ?></h5>
   <br>
   <tr>
	<td>Total Questions</td>
	<td><?php echo $tqn; ?></td>
   </tr>
   <tr>
	<td>Attemped</td>
	<td><?php echo $attempt; ?></td>
   </tr>
   <tr>
	<td>Correct Ans</td>
	<td><?php echo $corr_ans ?></td>
   </tr>
   <tr>
	<td>Wrong Ans</td>
	<td><?php echo $wrong_ans ?></td>
   </tr>
   <tr>
	<td>Not Attemped</td>
	<td><?php echo $no_attempt ?></td>
   </tr>
  
   <tr>
   	 <td></td>
   	 <td></td>
   </tr>
   <tr>
	<td>Percentage</td>
	<td><?php 
			$percentage = ($corr_ans*100)/$tqn;
			$percentage = round($percentage);
			echo $percentage."%";
		?></td>
   </tr>
  </table>
<br>

 <center>
 	<button class="btn btn-warning" id="Show_answers"> Show Answers </button>
 	<br><br>
 	<div style="display:flex-box;align-items: center;">
		<a href="questions_level.php" class="btn btn-primary">Try Again</a>
		<a href="index.php" class="btn btn-success">Home</a>
		<a href="logout.php" class="btn btn-danger">LogOut</a>
	</div>
 </center>
 </div>	
</div>





<div id="show">
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script type="text/javascript">
		$(document).ready(function(){
			$('#Show_answers').click(function(){
				$('#show').load('corr_ans.php',function(){
				});
			});
		});
   </script>


<?php include_once 'inc/comment/read_Index.php'; ?>


<script>
$(document).ready(function(){
	function insertResult(){
		var name = "<?php echo $_SESSION['name']; ?>";
		var email = "<?php echo $_SESSION['email']; ?>";
		var password = "<?php echo $_SESSION['password']; ?>";
		var quest_type = "<?php echo $quest_type; ?>";
		var level = "<?php echo $level; ?>";
		var tqn = "<?php echo $tqn; ?>";
		var attempt = "<?php echo $attempt; ?>";
		var corr_ans = "<?php echo $corr_ans; ?>";
		var wrong_ans = "<?php echo $wrong_ans; ?>";
		var no_attempt = "<?php echo $no_attempt; ?>";
		var percentage = "<?php echo $percentage; ?>";

		$.ajax({
				url: "result_insert.php",
				type: 'POST',
				data: {
					name : name,
					email : email,
					password : password,
					quest_type : quest_type,
					level : level,
					tqn : tqn,
					attempt : attempt,
					corr_ans : corr_ans,
					wrong_ans : wrong_ans,
					no_attempt : no_attempt,
					percentage : percentage
				},
				success:function(data,status){
				}
		});
	}
	insertResult();
 });
</script>




        <!-- Footer -->
	<?php include_once 'inc/zzzfooter.php'; ?>