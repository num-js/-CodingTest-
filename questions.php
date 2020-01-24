<?php 
   session_start();
   require_once "inc/connection.php";     //Connection
   
   if (!isset($_SESSION['name'])) {
     header('location:reg_log.php');
   }


      //For Question Type
   $quest_type = $_SESSION['quest_type'];
   	
      //For Question Level
   $level = $_POST['level'];
   $_SESSION['level'] = $level;


   $time_limit = 0;
   if ($level=="Beg") {
   		$time_limit = "Unlimited";
   }elseif ($level=="Pro") {
   		$time_limit = "2 Minutes";
   }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>&ltCoding Test/></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">  

    <style type="text/css">
        .form-content  {
            box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
            -o-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
            -ms-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
            -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
            margin: 20px;
            padding: 20px;
          }
    </style>      
</head>
<body>

  <?php
    include 'navbar2.php'; 
  ?>

<br>


<div class="col-lg-8 m-auto d-block">

 <div class="row">
  <div class="col-sm-12">
    <div id="sform">
      <h2 class="text-center text-danger"><u>Test Details</u></h2>
      <div class="form-content justify-content-center">  
      	<center>
      		<h4>Test Type : <?php echo $quest_type; ?></h4>
	      	<h5>Level : <?php echo $level; ?></h5>
	      	<h5>Time Limit : <?php echo $time_limit; ?></h5>
	      	<br>
	        <a class="btn btn-info" id="cpp_beg" href="questions_paper_.php">START</a>
	    </center>
      </div>
    </div>
  </div>
 </div> <!--Row Div-->

</div>


<!-- 
<div id="show">
</div>

    <script type="text/javascript">
      $(document).ready(function(){
          $('#cpp_beg').click(function(){
            $('#show').load('questions_paper.php',function(){
            });
          });
      });
    </script>
 -->
</body>
</html>
