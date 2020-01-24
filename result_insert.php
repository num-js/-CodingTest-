<?php
    session_start();
	require_once 'inc/connection.php';

    $done = $_SESSION['done'];
if(!$done){
    extract($_POST);
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
        //$query = " INSERT INTO `participants` (name,email,password) VALUES ('$name','$email','$password') ";
		$query=" INSERT INTO `participants` (`email`, `password`, `name`, `quest_type`, `level`, `total_quest`, `attempted`, `corr_ans`, `wrong_ans`, `no_attempt`, `percentage`) VALUES ('$email','$password','$name','$quest_type','$level','$tqn','$attempt','$corr_ans','$wrong_ans','$no_attempt','$percentage') ";
		$query_run = mysqli_query($con,$query);

        if ($query_run) {
        	echo "Data Inserted";
        }else{
    		echo "Data Not Inserted";
        }
        
        $_SESSION['done']="done";
    }
}	
?>