
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>&ltCoding Test/></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    


  </head>
  <body>

    <?php include_once 'navbar2.php'; ?>
    <?php include_once 'inc/front_div1.php'; ?>
    <?php include_once 'inc/previous_results.php';  ?>  

    <?php include_once 'inc/coding quiz test.php'; ?>

          <!-- Questions from the User -->
    <!-- <div style=" background:linear-gradient(132deg,red,orange,yellow,green);">
      <?php //include_once 'inc/questions_users.php'; ?> 
    </div> -->
    
        <!-- another Page1 -->
        <?php //include_once 'inc/anopage1.php'; ?>
    
    
    
      <?php 
        if(isset($_SESSION['email'])){
      ?>
          <div>
      <?php
            include_once 'inc/comment/read_index.php';
        echo '</div>';
        }
      ?>
          
           <!-- Footer -->
    <?php include_once 'inc/zzzfooter.php'; ?>

  </body>
</html>