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

</head>
<body>

  <?php include_once 'navbar2.php'; ?>
<br>
<div class="container">

      <!--Login Form-->
<center>
  <div class="col-lg-6 col-sm-12">
    <div id="sform">
        <h2 class="text-center text-danger">Admin LogIn</h2>
        <div class="form-content">
          <form action="" method="post">
              <img src="images/N.jpg" class="rounded-circle" width="150px"> 
              <br>
              <br>
              <input type="text" name="email" class="form-control" required placeholder="Email"><br>
              
              <input type="Password" name="password" class="form-control" required placeholder="Password"><br>
            
              <button class="btn btn-info" type="login" name="login">LogIn</button>
              
          </form>
      </div>
    </div>
  </div>
</center>
</div> <!--Container div-->

</body>

<?php
    require_once "inc/connection.php";     //Make Connection

          //Fetching LogIn Data---
  if (isset($_POST['login'])) {
     $email=mysqli_real_escape_string($con,$_POST['email']);
     $password=mysqli_real_escape_string($con,$_POST['password']);
              
     $query="SELECT * FROM nnn WHERE email='$email' && password='$password' && active='1' ";
     $data=mysqli_query($con, $query);    //Run Query
     $total=mysqli_num_rows($data);
   
     if ($total) {
        while ($row = mysqli_fetch_array($data)) {
          $_SESSION['nnn']=$row['name'];
        }
          header("Location:nnn2.php");
      }
     else{
        echo "<script>
                 alert('You are not Admin... Donot Try to LogIn again...');
              </script>
        <p align='center' style='color:red;'>You are not Admin...<br> Don't Try to LogIn again...</p>";
      }
   }

?>