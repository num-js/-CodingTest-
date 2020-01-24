<?php
    session_start();           //Session
	session_destroy();
	
	include"navbar2.php"; 

?>

<body>
	<div class="container text-center">
		<H1 style="color:red;font-family:comic sans MS">Logging Out...</H1>
		<H1 style="color:green;font-family:papyrus"></H1>
		<H3 style="color:blue;font-family:comic sans MS">C u soon...</H3>
	</div>
</body>
</html>
<?php
	header('refresh:1;index.php');
?>
