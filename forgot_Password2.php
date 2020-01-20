<?php
    session_start();   //Session
    ob_start();
?>
	
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    
</head>
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

  <?php include_once 'navbar2.php'; ?>
<br>
<div class="container">

      <!--Login Form-->
<center>
  <div class="col-lg-6 col-sm-12">
    <div id="sform">
        <div class="form-content">
          <form action="" method="post">
        <h2 class="text-center text-danger">Forgot Password</h2>
              <br>
              <input type="text" name="name" class="form-control" required placeholder="Name"><br>
              <input type="text" name="course" class="form-control" required placeholder="Course"><br>
              <input type="text" name="college" class="form-control" required placeholder="College"><br>
            
              <button class="btn btn-info" type="submit" name="check">Check</button>
              
          </form>
      </div>
    </div>
  </div>
</center>
</div> <!--Container div-->

</body>

<?php
    require_once "inc/connection.php";

  if (isset($_POST['check'])) {
    $email = $_SESSION['email'];
    $_SESSION['name'] = $name = $_POST['name'];
    $_SESSION['course'] = $course = $_POST['course'];
    $_SESSION['college'] = $college = $_POST['college'];

    $query="SELECT * FROM register WHERE email='$email' && name='$name' && course='$course' && college='$college' ";
    $queryRun=mysqli_query($con, $query);
    $total=mysqli_num_rows($queryRun);
     if ($total) {
        
        header("Location:forgot_Password3.php");
     }else{
        echo "<script>
                 alert('Your Data's are not Maching... Register Again...');
              </script>
        <p align='center' style='color:red;'>You are not Registered...<br><a href='reg_log.php'>Register Again...<a></p>";
     }
  }

?>