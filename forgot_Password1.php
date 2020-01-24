<?php
    session_start();   //Session
    ob_start();
?>

    
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
    <link
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
              <input type="email" name="email" class="form-control" required placeholder="Email"><br>
              
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
     
    $email=$_POST['email'];
              
     $query="SELECT * FROM register WHERE email='$email' ";
     $data=mysqli_query($con, $query);
     $total=mysqli_num_rows($data);
     if ($total) {
        $_SESSION['email']=$email;
        header("Location:forgot_Password2.php");
     }else{
        echo "<script>
                 alert('You are not Registered... Register Again...');
              </script>
        <p align='center' style='color:red;'>You are not Registered...<br><a href='reg_log.php'>Register Again...<a></p>";
      }
   }

?>