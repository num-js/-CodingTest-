<?php
  session_start();
  require_once "inc/connection.php";

  if(isset($_SESSION['done'])){
    header('location:questions_level.php');
  }


   //For Question Type
   $quest_type = $_SESSION['quest_type'];
      //For Question Level
   $level = $_POST['level'];
   $_SESSION['level'] = $level;
?>

  <?php include_once 'navbar2.php'; ?>

<br><br>
    <!-- CountDown Timer -->
  <div class="fixed-top" style="margin-top: 80px; margin-left: 60%;">
    
    
    <div class="bg-dark text-danger" style="width:120px">
    Time Left : <span id="time"></span>
  </div>
  </div>



<div class="container">
  <div class="card" id="topic">
    <h4 class="text-center card-header" style="background: black;color: red;"><B><?php echo  $quest_type; ?> Programming</B></h4>
  </div>

  <div class="jumbotron bg-secondary">
  <!-- Form -->
 <form action="result.php" method="POST" id="form1">
    <?php 
      $query = "SELECT * FROM questions WHERE category='$quest_type' && level='$level' ORDER BY RAND() ";
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
      <?php } ?>

      <?php if ($row['opt4']!= '') {?>
        <?php if(isset($row['opt4'])) { ?>
        <pre wrap="hard"><input type="radio" name="<?php echo $row['id'];?>" value="3"> &nbsp; d) <?php echo $row['opt4'];?> </pre>
        <?php } ?>
      <?php } ?>

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

<!-- JS for CountDown Timer -->
  <script type="text/javascript">
    var timeLeft=2*60;
  function timeoutn(){ 
    var minute=Math.floor(timeLeft/60);
    var second=timeLeft%60;
    if(timeLeft<=0){
      clearTimeout(tm);
      alert("Time Out...Submit ur Answer");
      document.getElementById("submit").click();
    }else{
      document.getElementById('time').innerHTML=minute+" : "+second;
    } 
    timeLeft--;
    var tm=setTimeout(function(){timeoutn()},1000);
  }

  window.onload = function(){
    timeoutn();
  }
  </script>


  </div>
</div>

</body>
</html>