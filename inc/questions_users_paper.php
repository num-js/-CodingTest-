<?php
  session_start();
  include_once '../links.php';
  require_once "connection.php";


  if(isset($_SESSION['email'])){
    $email = $_SESSION['email']; //Actual  Email
  }else{
    header('location:../reg_log.php');
  }

    //For Questions_Users Papers
  $_SESSION['emailQ_U']=$emailQ_U = $_POST['emailQ_U']; //Q_U  Email
  $_SESSION['titleQ_U']=$titleQ_U = $_POST['titleQ_U'];
  $_SESSION['descriptionQ_U']=$descriptionQ_U = $_POST['descriptionQ_U'];
  
?>


<!DOCTYPE html>
<html>
<head>
    <title>&ltCoding Test/></title>
    <link rel="icon" href="../images/N.jpg">
    		<!--BOOTSTRAP Saved Links-->
      <link rel="stylesheet" type="text/css" media="screen" href="../assets/Boostrap 4.0.css">
    <style>
          /*Nav Bar*/
      *{
        padding:0;
        margin:0;
      }
      #header{
        text-align:center;
        background-color: black;
        color: white;
        text-shadow: 10px 4px 5px red;
        font-size: 3em;
        font-family: cursive;
      }
    </style>
</head>
<body>
  <div class="container text-center col-12" id="header">
		&ltCoding Test/>
	</div>

<br><br>
  



<div class="container">
  <div class="card" id="topic">
    <h4 class="text-center card-header" style="background: black;color: red;"><B><?php echo  $titleQ_U; ?></B></h4>
  </div>

  <div class="jumbotron bg-secondary">
  <!-- Form -->
 <form action="../questions_users_result.php" method="POST" id="form1">
    <?php 
      //$lim_query =      //Query for Questions Limit
      $query = "SELECT * FROM `questions_users` WHERE email='$emailQ_U' && title='$titleQ_U' ORDER BY RAND() ";
      $query_run = mysqli_query($con,$query);
      if ($query_run) {
        $i=1;
        while ($row = mysqli_fetch_array($query_run)) {
  ?>
  <div class="card">
    <div class="card-header bg-">
      <b>
      <?php 
        echo "<pre wrap='hard'> <b style='font-size:18px; font-family:comic sans MS;'>".$i.". ";
        echo $row['quest']."</b> </pre>"; 
      ?>
      </b>
      <div class="card-body">
        
        <?php if(isset($row['opt1'])) { ?>
          <pre wrap="hard"><input type="radio" name="<?php echo $row['id'];?>" value="0"> &nbsp; a) <?php echo $row['opt1'];?> </pre>
        <?php } ?>

        <?php if(isset($row['opt2'])) { ?>
        <pre wrap="hard"><input type="radio" name="<?php echo $row['id'];?>" value="1"> &nbsp; b) <?php echo $row['opt2'];?> </pre>
        <?php } ?>
       
        <!-- Checking for Options Are available or not -->
      <?php if ($row['opt3']!= '') {?>
        <?php if(isset($row['opt3'])) { ?>
        <pre wrap="hard"><input type="radio" name="<?php echo $row['id'];?>" value="2"> &nbsp; c) <?php echo $row['opt3'];?> </pre>
        <?php } ?>
      <?php }?>
      <?php if ($row['opt4']!= '') {?>
        <?php if(isset($row['opt4'])) { ?>
        <pre wrap="hard"><input type="radio" name="<?php echo $row['id'];?>" value="3"> &nbsp; d) <?php echo $row['opt4'];?> </pre>
        <?php } ?>
      <?php }?>
          <!--Checking if 0 Attempts-->
        <input type="radio" checked="checked" style="display: none;" name="<?php echo $row['id'];?>" value="no_attempt">  


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
  <input type="submit" name="submit" id="submit" value="Submit Answers" class="btn btn-success">
  
    <?php
      $_SESSION['tqn']=$tqn;
    ?>
</center>
    
   </form>



  </div>
</div>

</body>
</html>