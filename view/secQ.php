<?php  
	if(isset($_COOKIE['loggedin_admin']) || isset($_COOKIE['loggedin_employee']) || isset($_COOKIE['loggedin_user'])){
        header("location:../index.php");
    }

    require("../model/model.php");  
    require('../file_includes/dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Set Security Questions</title>
</head>
<body>
	<div id='set_sq'>
		<h4>SET SECURITY QUESTIONS</h4>

		<form action="../controller/insert_sq_controller.php" method="POST">
			<table>
				<tr>
					<td>Security Question 1: </td>
					<td><select name="sq1">
						<option value="">--Select Security Question 1--</option>
						<?php 
							secQlist1();
						?>				
					</select></td>
				</tr>
				<tr>
					<td>Answer 1: </td>					
					<td><input type='text' name='a1' required></td>
				</tr>
				<tr>
					<td>Security Question 2: </td>	
					<td><select name="sq2">
						<option value="">--Select Security Question 2--</option>
						<?php 
							secQlist2();
						?>				
					</select></td>				
				</tr>
				<tr>
					<td>Answer 2: </td>
					<td><input type='text' name='a2' required></td>
				</tr>					
				<tr>
					<td><input type='submit' name='insert_sq' value='Submit'></td>	
					<td><a href="../index.php">Back</a></td>			
				</tr>
			</table>
		</form>
	</div>
</body>
</html>