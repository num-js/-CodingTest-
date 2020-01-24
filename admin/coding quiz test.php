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

        <!--Bouncing txt-->
  <div>   
    <h1 id="topic_title" class="animated infinite bounce"><u style="font-family: chiller; color:maroon;"><strong>Coding Quiz Test</strong></u></h1>
  </div>

      <!--Coding Test---div Start -->
  <div class="main_div">

    <div class="coln">
      <div class="tablen">
        <h1>C</h1>
        <div class="topic_desc">
          <h5><br>Procedure Oriented Programming</h5>
        </div>
        <form action="" method="post">
          <input type="hidden" name="quest_type" value="C">
          <input type="submit" name="submit" value="Start" class="strt_lrn_btns">
        </form>
      </div>
    </div>

    <div class="coln">
      <div class="tablen">
        <h1>C++</h1>
        <div class="pop">Popular</div>
        <div class="topic_desc">
          <h5><br>Object Oriented Programming (OOPS)</h5>
        </div>
        <form action="" method="post">
          <input type="hidden" name="quest_type" value="C++">
          <input type="submit" name="submit" value="Start" class="strt_lrn_btns">
        </form>
      </div>
    </div>

    <div class="coln">
      <div class="tablen">
        <h1>Python</h1>
        <div class="pop">Popular</div>
        <div class="topic_desc">
          <h5><br>High Level Programming Language</h5>
        </div>
        <form action="" method="post">
          <input type="hidden" name="quest_type" value="Py">
          <input type="submit" name="submit" value="Start" class="strt_lrn_btns">
        </form>
      </div>
    </div>

    <div class="coln">
      <div class="tablen">
        <h1>JAVA</h1>
        <div class="pop">Popular</div>
        <div class="topic_desc">
          <h5><br>Object Orented Programming (OOPS)</h5>
        </div>
        <form action="" method="post">
          <input type="hidden" name="quest_type" value="JAVA">
          <input type="submit" name="submit" value="Start" class="strt_lrn_btns">
        </form>
      </div>
    </div>

    <div class="coln">
      <div class="tablen">
        <h1>HTML</h1>
        <div class="topic_desc">
          <h5><br>Hyper Text Markup Language (HTML)</h5>
        </div>
        <form action="" method="post">
          <input type="hidden" name="quest_type" value="HTML">
          <input type="submit" name="submit" value="Start" class="strt_lrn_btns">
        </form>
      </div>
    </div>

    <div class="coln">
      <div class="tablen">
        <h1>JS</h1>
        <div class="pop">Popular</div>
        <div class="topic_desc">
          <h5><br>Client-Side Scripting Language</h5>
        </div>
        <form action="" method="post">
          <input type="hidden" name="quest_type" value="JS">
          <input type="submit" name="submit" value="Start" class="strt_lrn_btns">
        </form>
      </div>
    </div>

    <div class="coln">
      <div class="tablen">
        <h1>PHP</h1>
        <div class="pop">Popular</div>
        <div class="topic_desc">
          <h5><br>Server-Side Scripting Language</h5>
        </div>
        <form action="" method="post">
          <input type="hidden" name="quest_type" value="PHP">
          <input type="submit" name="submit" value="Start" class="strt_lrn_btns">
        </form>
      </div>
    </div>

    <div class="coln">
      <div class="tablen">
        <h1>MySQL</h1>
        <div class="topic_desc">
          <h5><br>Structured Query Language DataBase</h5>
        </div>
        <form action="" method="post">
          <input type="hidden" name="quest_type" value="MySQL">
          <input type="submit" name="submit" value="Start" class="strt_lrn_btns">
        </form>
      </div>
    </div>
  </div> <!--Coding Test---div End -->

  <?php

  if(isset($_POST['submit'])){
      $quest_type = $_POST['quest_type'];
      $_SESSION['quest_type'] = $quest_type;
      test_home();
  }

  function test_home(){
      echo '<script> 
              window.location="../questions_level.php";
            </script>';
  }

  ?>