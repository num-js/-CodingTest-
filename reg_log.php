<?php
    session_start();   //Session
    ob_start();
?>

  <?php include_once 'navbar1.php'; ?>
<br>
<div class="container">
 <div class="row">

      <!--Login Form-->
  <div class="col-sm-6">
    <div id="sform">
        <h2 class="text-center text-danger">LogIn</h2>
        <div class="form-content">
          <form action="" method="post">
              
              <input type="text" name="email" class="form-control" required placeholder="Email"><br>
              
              <input type="Password" name="password" class="form-control" required placeholder="Password"><br>
              
              <button class="btn btn-success" type="login" name="login">LogIn </button>
              <a href="forgot_Password1.php" class="btn">Forgot Password </a>
          </form>
      </div>
    </div>
  </div>
  
      <!--SignUp Form-->
  <div class="col-sm-6">
    <div id="sform">
        <h2 class="text-center text-danger">SignUp</h2>
        <div class="form-content">
          <form action="" method="post">
              
              <input type="text" name="name" class="form-control" required placeholder="Name"><br>
              
              <input type="email" name="email" class="form-control" required placeholder="Email"><br>
              
              <input type="Password" name="password" class="form-control" required placeholder="Password"><br>
              
              <input type="text" name="college" class="form-control" placeholder="College Name"><br>
              
              <input type="text" name="course" class="form-control" placeholder="Course"><br>
              
              <button class="btn btn-primary" type="submit" name="submit">SignUp</button> 
          </form>
        </div>
    </div>
  </div>

 </div> <!--Row Div-->
</div> <!--Container div-->


<br><br>
<?php
    require_once "inc/connection.php";     //Make Connection

          //Fetching LogIn Data---
  if (isset($_POST['login'])) {
     $email=mysqli_real_escape_string($con,$_POST['email']);
     $password=mysqli_real_escape_string($con,$_POST['password']);
              
     $query="SELECT * FROM register WHERE email='$email' && password='$password'";    //SQL Query
     $data=mysqli_query($con, $query);    //Run Query
     $total=mysqli_num_rows($data);
   
     if ($total) {
        while ($row = mysqli_fetch_array($data)) {
          $_SESSION['name']=$row['name'];
          $_SESSION['email']=$row['email'];
          $_SESSION['password']=$row['password'];
        }
          header("Location:index.php");
      }
     else{
        echo "<script>
                 alert('Wrong user Name or Password... Please Try again...');
              </script>
        <p align='center' style='color:red;'>Wrong user Name or Password<br>please Try again</p>";
      }
   }


          //Fetching SignUP Data---
  if (isset($_POST['submit'])) {
      $name=$_POST['name'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      $college=$_POST['college'];
      $course=$_POST['course'];
  
      $query="SELECT * FROM register WHERE email='$email'";    //SQL Query
      $data=mysqli_query($con, $query);    //Run Query
      $total=mysqli_num_rows($data);
      if ($total) {
        echo '<script>alert("U r alredy Registered... Please Login...");</script>';
      }else{
        $query="INSERT INTO `register`(`name`, `email`, `password`, `college`, `course`) VALUES ('$name','$email','$password','$college','$course')";          //SQL Query
        $run=mysqli_query($con,$query);  //Inserting Data to DataBase
          //Checking Data Inserted or Not
        if ($run){
            echo '<script> alert("Registered Successfull... Now u can LogIn"); </script>';
        }
        else{
          echo "<script>
                  alert('Registration Failed... Please Try again...');
                </script>
                Registration Failed<br>Please Try again
                
                ";
        }
      }

        
 }
?>