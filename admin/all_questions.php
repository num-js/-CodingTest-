<link rel="icon" href="../images/N.jpg">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 


<div colspan="2" class="bg-dark" style="border-radius: 20px;font-family: papyrus;"><h1 class="text-white" align="center">All Questions</h1></div>

  <!-- Form -->
    <?php 
      $query = "SELECT * FROM questions ORDER BY `questions`.`id` DESC ";
    $query_run = mysqli_query($con,$query);
    if ($query_run) {
      $i=1;
      while ($row = mysqli_fetch_array($query_run)) {
  ?>
  <div class="card">
    <div class="card-header bg-">
      <div class="row">
	      <b> 
	      <?php 
	        echo "<pre wrap='hard'><b style='font-size:18px;'>".$row['id'].'. ';
	        echo $row['quest']."</b></pre>"; 
	      ?> 
	      </b>
	      &emsp;&emsp;
	      <form action="" method="post">  <!--?page=zupdate_question -->
				  <input type="hidden" name="uid" value="<?php echo $row['id']; ?>">
				  <button type="submit" name="edit" class="btn btn-warning"><span class="fa fa-edit"></span></button>
		    </form>
        <?php

          if(isset($_POST['edit'])){
              echo $uid = $_POST['uid'];
              $_SESSION['uid'] = $uid;              
              
              echo '
                <script>
                  window.location="?page=zupdate_question";
                </script>
              ';
          }
        ?>
		    &emsp;
		    <form action="?page=zdelete_question" method="post">
				  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
				  <button type="submit" name="submit" class="btn btn-danger"><span class="fa fa-trash"></span></button>
		    </form>
	    </div>
 
      <div class="card-body">
        
        <?php if(isset($row['opt1'])) { ?>
          <pre wrap="hard"><input type="radio" name="<?php echo $row['id'];?>" value="0" disabled> &nbsp; a) <?php echo $row['opt1']; ?></pre>
        <?php } ?>

        <?php if(isset($row['opt2'])) { ?>
          <pre wrap="hard"><input type="radio" name="<?php echo $row['id'];?>" value="1" disabled> &nbsp; b) <?php echo $row['opt2'];?></pre>
        <?php } ?>
      
        <!-- Checking for Options Are available or not -->
      <?php if ($row['opt3']!= '') {?>
        <?php if(isset($row['opt3'])) { ?>
          <pre wrap="hard"><input type="radio" name="<?php echo $row['id'];?>" value="2" disabled> &nbsp; c) <?php echo $row['opt3'];?></pre>
        <?php } 
         } ?>
    
      <?php if ($row['opt4']!= '') {?>
        <?php if(isset($row['opt4'])) { ?>
          <pre wrap="hard"><input type="radio" name="<?php echo $row['id'];?>" value="3" disabled> &nbsp; d) <?php echo $row['opt4'];?></pre>  
        <?php } 
          } ?>
<br>
        <?php 
        		$corr_ans = $row['ans_id']; 
            $corr_ans = $corr_ans+1;
  			echo '<b style="background:#e9ecef">Ans : '.$corr_ans.' Number option</b> &emsp;';
  			echo 'Q_Category: '.$row['category'].'&emsp;'; 
  			echo 'Level: '.$row['level'].'&emsp;';
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

  <br>
  <center>
  
    <?php
      echo '<b>Total Questions: '.$tqn.'</b>';
    ?>
    <br><br><br>
    
</center>

<script>
    $(document).ready(function(){
        $('table').DataTable();
    });
</script>