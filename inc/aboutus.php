<?php include_once '../navbar2.php'; ?>
<link rel="icon" href="../images/N.jpg">
    <style type="text/css">
        body{
            margin: 0;
            padding: 0;
            background: linear-gradient(132deg,orange,orange,orange,white,green,green,green);
            
              background-size: 400% 400%;
              
              animation: btnchange 15s linear infinite;
        }
        @keyframes btnchange{
              0%{
                  background-position: 0% 50%;
              }
              25%{
                  background-position: 50% 50%;
              }
              50%{
                  background-position: 100% 50%;
              }
              75%{
                  background-position: 75% 50%;
              }
              100%{
                  background-position: 0% 50%;
              }
        }

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

<div class="container">

<center>
<br>
  <div class="jumbotron col-6 bg-dark text-light">
    <div class="container text-center col-12 bg-dark" id="header">
    </div>
    ‘&ltCoding Test/>’ website is an online Quiz platform where everyone can give test easily by creating a user account.
  </div>



  <div class="col-lg-4 col-sm-12">
    <div id="sform">
        <div class="form-content">
          <form action="" method="post">
              <img src="../images/N.jpg" class="rounded-circle" width="150px"> 
              <br>
              <br>
              <h3>N_Ah</h3>
          </form>
      </div>
    </div>
  </div>


</center>


</div> 
<?php include_once 'zzzfooter.php'  ?>
</body>