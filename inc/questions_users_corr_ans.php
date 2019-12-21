<?php
	session_start();
  	require_once "../inc/connection.php";
	
		//For the Category Id
	// $cat_id = $_SESSION['cat_id'];
	// $cat_name = $_SESSION['cat_name'];
	// $level = $_SESSION['level'];

	//For Question Type
   $quest_type = $_SESSION['quest_type'];
      //For Question Level
   $level = $_SESSION['level'];
?>	

<!DOCTYPE html>
<html>
<head>
	<title>NNN</title>
</head>
<body>

<div class="container">
	<div class="card" id="topic">
    	<h4 class="text-center card-header" style="background: black;color: red;"><B><?php echo  $quest_type; ?></B></h4>
  	</div>
 

  <div class="jumbotron bg-secondary">
	<!-- Form -->
 <form action="result.php" method="POST" id="form1">
  	<?php 
  		$query = "SELECT * FROM questions WHERE category='$quest_type' && level='$level' ";
		$query_run = mysqli_query($con,$query);
		if ($query_run) {
			$i=1;
			while ($row = mysqli_fetch_array($query_run)) {
	?>
	<div class="card">
	  <div class="card-header bg-">
	  	<?php	
	  		//echo $i.". ";
	  		echo "<pre wrap='hard'> <b style='font-size:18px; font-family:comic sans MS;'>".$i.". ";
			  echo $row['quest']."</b> </pre>";
	  	?>
	  	
	  	<div class="card-body">
	  		
	  		<?php if(isset($row['opt1'])) { ?>
	  		<pre wrap="hard"><input type="radio" name="<?php echo $row['id'];?>" value="0" disabled> &nbsp; a) <?php echo $row['opt1'];?> </pre>
	  		<?php } ?>

	  		<?php if(isset($row['opt2'])) { ?>
	  		<pre wrap="hard"><input type="radio" name="<?php echo $row['id'];?>" value="1" disabled> &nbsp; b) <?php echo $row['opt2'];?> </pre>
	  		<?php } ?>

		       <!-- Checking for Options Are available or not -->
		  <?php if ($row['opt3']!= '') {?>
	  		<?php if(isset($row['opt3'])) { ?>
	  		<pre wrap="hard"><input type="radio" name="<?php echo $row['id'];?>" value="2" disabled> &nbsp; c) <?php echo $row['opt3'];?> </pre>
	  		<?php } ?>
	  	  <?php } ?>

		  <?php if ($row['opt4']!= '') {?>
	  		<?php if(isset($row['opt4'])) { ?>
	  		<pre wrap="hard"><input type="radio" name="<?php echo $row['id'];?>" value="3" disabled> &nbsp; d) <?php echo $row['opt4'];?> </pre>
	  		<?php } ?>
	  	  <?php } ?>

	  			<!--Checking if 0 Attempts-->
	  		<input type="radio" checked="<?php $row['ans_id']; ?>" name="<?php echo $row['id'];?>" value="no_attempt">	

	  		<?php 
	  			$corr_ans = $row['ans_id']; 
	  			$corr_ans = $corr_ans+1;
	  			echo '<b style="background:#e9ecef">Ans : '.$corr_ans.' Number Option</b>';
	  		?>

	  </div>
	  </div>
	</div>
	<?php
					$tqn = $i;
				$i++;	
			}	
		}
	?>

   </form>

  
  </div>
</div>


</body>
</html>