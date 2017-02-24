<?php
    if(!isset($_COOKIE['loggedin_fpass2'])){
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
			<form action="../../controller/update_password_controller.php" method="POST">
			<table>
				<tr>
					<td>New Password: </td>
					<td><input type='password' name='newpass1' required></td>
				</tr>
				<tr>
					<td>Re-type New Password: </td>
					<td><input type='password' name='newpass2' required></td>
				</tr>
				<tr>
					<td><input type='submit' name='change_pass' value='Submit'></td>				
				</tr>
			</table>
		</form>
		</form>
	</div>
</body>
</html>