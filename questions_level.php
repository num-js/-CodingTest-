<?php 
   session_start();
   //require_once "inc/connection.php";
   
   if (!isset($_SESSION['name'])) {
     header('location:reg_log.php');
   }
   
     //For Question Type
   $quest_type = $_SESSION['quest_type'];

?>
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
<body>


  <?php include_once 'navbar2.php'; ?>

  
<br><br>



<div class="col-lg-8 m-auto d-block">
  
  

 <div class="row">
  <div class="col-sm-12">
    <div id="sform">
      <h2 class="text-center text-danger"><u>Select Level</u></h2>
      <div class="form-content">  
        

        <center>
      <div class="row">
        
        <div class="col-sm-6">
          <div class="jumbotron bg-transparent">
                <h5>Test Type : <?php echo $quest_type; ?></h5>
                    Level : Beginner
                <p>Time Limit : Unlimited</p>
                <form action="questions_paper_beg.php" method="post">
                  <input type="submit" name="level" value="Beg" class="btn btn-primary">
                </form>
            </div>
            
        </div>
        <div class="col-sm-6">
            <div class="jumbotron bg-transparent">
                <h5>Test Type : <?php echo $quest_type; ?></h5>
               Level : Profetional
                <p>Time Limit : 2 Minutes</p>
              <form action="questions_paper_pro.php" method="post">
               <input type="submit" name="level" value="Pro" class="btn btn-danger">
              </form>
            </div>
        </div>
      </div>
        </center>


      </div>
    </div>
  </div>
 </div> <!--Row Div-->
</div>

<br><br><br>
</body>
</html>

<?php
  if(isset($_SESSION['done'])){
      unset($_SESSION['done']);
  }
?>