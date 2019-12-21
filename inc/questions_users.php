<style type="text/css">
        /*CArds Starts*/        
    .main_div{
      max-width: 1100px;
      margin: auto;
      display: flex;
      justify-content: center;
      text-align: center;
      flex-wrap: wrap;
    }

    .coln{
      flex: 25%;
      padding: 5px;
      max-width: 220px;
      box-sizing: border-box;
    }

    .tablen{
      padding: 30px 20px;
      font-family: "montserrat",sans-serif;
      position: relative;
      overflow: hidden;
      box-shadow: 0 0 10px #00000070;
    }
    .tablen h1,h2{
      font-family: cursive;
      color: maroon;
    }
    .topic_desc{
      margin-bottom: 20px;
    }

    .topic_desc h5,topic_desc h4{
      font-family: papyrus;
      color: grey;
    }
    .tablen .strt_lrn_btns{
      text-decoration: none;
      color: #2c3e50;
      background: transparent;
      border: 2px solid #2c3e50;
      display: block;
      padding: 10px 0;
      padding-left: 40px;
      padding-right: 40px;
      margin: 10px 20px;
      border-radius: 5px;
      text-transform: uppercase;
      font-size: 14px;
      transition: 0.5s linear;
    }
    .tablen .strt_lrn_btns:hover{
      background: #2c3e50;
      color: #fff;
    }
    .pop{
      background: #2c3e50;
      color: #fff;
      transform: rotate(46deg);
      padding: 8px 40px;
      position: absolute;
      top: 16px;
      right: -34px;
    }

    @media screen and (max-width:980px) {
      .coln{
        flex: 50%;
      }
    }

    @media screen and (max-width:700px) {
      .coln{
        flex: 50%;
      }
    }
    @media screen and (max-width:415px) {
      .main_div{
        max-width: 1100px;
        margin: auto;
        padding: auto;
        display: flex;
        justify-content: center;
        text-align: center;
        flex-wrap: wrap;
      }

      .coln{
        flex: 25%;
        padding: 5px;
        max-width: 220px;
        box-sizing: border-box;
      }

      .tablen{
        padding: 0px;
        padding-top: 15px;
        font-family: "montserrat",sans-serif;
        position: relative;
        overflow: hidden;
        box-shadow: 0 0 10px #00000070;
      }
      .tablen h1,h2{
        font-size:35px;
        font-family: cursive;
        color: maroon;
      }
      .topic_desc{
        margin-bottom: 20px;
      }

      .topic_desc h5{
        font-size:15px;
        font-family: papyrus;
        color: grey;
      }
      .tablen .strt_lrn_btns{
        text-decoration: none;
        color: #2c3e50;
        background: transparent;
        border: 2px solid #2c3e50;
        display: block;
        padding: 8px;
        padding-left: 40px;
        padding-right: 40px;
        margin: auto;
        margin-bottom: 20px;
        border-radius: 5px;
        text-transform: uppercase;
        font-size: 14px;
        transition: 0.5s linear;
      }
      .tablen .strt_lrn_btns:hover{
        background: #2c3e50;
        color: #fff;
      }
      .pop{
        font-size:15px;
        background: #2c3e50;
        color: #fff;
        transform: rotate(46deg);
        padding: 0px 30px;
        position: absolute;
        top: 16px;
        right: -34px;
      }
    }

    #topic_title{
      margin: 20px;
    }
</style>
  <br>
  <div class="container">
    <a class="btn btn-dark float-right" href="">Create New</a>
  </div>
        <!--Bouncing txt-->
  <div>   
    <h1 id="topic_title" class="animated infinite bounce"><u style="font-family: chiller; color:maroon;"><strong>Questions From Users</strong></u></h1>
  </div>

      <!--Coding Test---div Start -->
  <div class="main_div">

<?php
    require_once 'connection.php';
    $query = " SELECT DISTINCT `title`,`description`,`email` FROM `questions_users` ORDER BY id DESC ";
    $queryRun = mysqli_query($con,$query);
    $result = mysqli_num_rows($queryRun);
    if($result){
      while($row = mysqli_fetch_assoc($queryRun)){  
          
?>

    <div class="coln" >
      <div class="tablen" >
        <h1><?php echo $row["title"]?></h1>
        <div class="topic_desc">
          <br>
          <h5><?php echo $row["description"]?></h5>
            <?php 
                $queryBy = " SELECT `name` FROM `register` WHERE email='$email' ";
                $queryRunBy = mysqli_query($con,$queryBy);
                $resultBy = mysqli_num_rows($queryRunBy);
                if($resultBy){
                  while($rowBy = mysqli_fetch_assoc($queryRunBy)){
            ?>
          <p align="right"><?php echo "by ".$rowBy['name']?></p>
            <?php }
                } ?>
        </div>
        <form action="inc/questions_users_paper.php" method="post">
          <input type="hidden" name="emailQ_U" value="<?php echo $row["email"] ?>">
          <input type="hidden" name="titleQ_U" value="<?php echo $row["title"] ?>">
          <input type="hidden" name="descriptionQ_U" value="<?php echo $row["description"] ?>">
          
          <input type="submit" name="submit" value="Start" class="strt_lrn_btns">
        </form>
      </div>
    </div>
<?php
      }
    }
?>
    </div>
<br>

  <?php
/*
  if(isset($_POST['submit'])){
      $quest_type = $_POST['quest_type'];
      $_SESSION['quest_type'] = $quest_type;
      test_home();
  }

  function test_home(){
      echo '<script> 
              window.location="questions_level.php";
            </script>';
  }
*/
  ?>