<?php
	require_once "../inc/connection.php";     //Connection
	session_start();

if(!isset($_SESSION['nnn'])){
		header("Location:../index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../images/N.jpg">
	<title>&ltCoding Test/></title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	 <style>
		.vertical-menu a {
		  background-color: #35475e;
		  color: white;
		  display: block;
		  padding: 15px;
		  text-decoration: none;
		}

		.vertical-menu a:hover {
			text-decoration: none;
		  background-color: #233245;
		  color: white;
		}

		.vertical-menu a#active {
		  background-color: #233245;
		  color: white;
		}
		.vertical-menu a#active:hover {
			color: #dc3545;
		}
	</style> 
</head>
<body>
	  <?php include_once 'navbar2.php'; ?>

<div class="row" style="margin: 0px; padding: 0px;">
		<!-- Left Side -->
	<div class="col-2" style="margin: 0px;padding: 0px; background: #35475e">
	  <div class="vertical-menu">
	    <a class="col-12" id="active"><h4 align="center"><b>&ltCoding Test/></b></h4></a>
	    <a class="col-12" href="?page=home">Home</a>
	    <a class="col-12" href="?page=questions_papers">Questions Papers</a>
	    <a class="col-12" href="?page=all_questions&?pageno=1">All Questions</a>
	    <a class="col-12" href="?page=add_questions">Add Questions</a>
	    <a class="col-12" href="?page=participants">Participants</a>
	    <a class="col-12" href="?page=registered_users">Registered Users</a>
	    <a class="col-12" href="?page=inc/comment/read_index">Comments</a>
	  </div>
	  <br><br><br><br><br><br><br><br>
	</div>

		<!-- Right Side -->
	<div class="col-10 bg-dark" style="margin: 0px;padding: 0px;">
		<br>
		<div class="container col-12">
			<div class="jumbotron">
				<div id="show">
					<?php
						if (isset($_GET['page'])) {
							$page = $_GET['page'];
							echo '<h4>Dashboard / '.ucwords($page).'</h4> <hr>';

							include_once "$page.php";
						}else{
							echo '<h4>Dashboard / Home</h4> <hr>';
							include_once 'home.php';
						}
					   
					?>
				</div>
			</div>			
		</div>

	</div>

</div>



<?php include_once '../inc/zzzfooter.php'; ?>
</body>
</html>