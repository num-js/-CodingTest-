
<?php
    session_start();

    if(!isset($_SESSION['nnn'])){
      header("Location:index.php");
    }

     require_once "inc/connection.php";


  if($_SESSION['nnn']){
     $name=$_SESSION['nnn'];

     $query="SELECT * FROM nnn WHERE name='$name' && active='1' ";
     $data=mysqli_query($con, $query);    //Run Query
     $total=mysqli_num_rows($data);

     if ($total) {
        while ($row = mysqli_fetch_array($data)) {
          $_SESSION['nnn']=$row['name'];
        }
          header("Location:nnn");
      }
     else{
        echo "<script>
                 alert('You are not Admin... Donot Try to LogIn again...');
              </script>
        <p align='center' style='color:red;'>You are not Admin...<br> Don't Try to LogIn again...</p>";
      }
  }
?>