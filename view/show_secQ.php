<?php
    if(!isset($_COOKIE['loggedin_fpass'])){
        header("location:../index.php");
    }
    require("../file_includes/dbconnect.php");
    require("../model/model.php"); 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Forgot Password</title>
</head>
<body>
	<div id='forgot_pass'>
		<h4>Forgot Password</h4>
		<form action="../controller/forgot_pass_controller.php" method='POST'>
			Security Question 1: <?php echo get_secQ($_SESSION['accountID'], 'q1'); ?> <br>
			Answer 1: <input ='type' name='a1' placeholder='Answer' required> <br>
			Security Question 2: <?php echo get_secQ($_SESSION['accountID'], 'q2'); ?> <br>
			Answer 2: <input ='type' name='a2' placeholder='Answer' required> <br>
			<input type='submit' name='showsecQ' value='Submit'>
			<td><a href="../index.php">Cancel</a></td>	
		</form>
	</div>
</body>
</html>