<?php
	if(!isset($_COOKIE['loggedin_employee'])){
        header("location:../../index.php");
    }
    
    require("../../model/model.php");  
    require('../../file_includes/dbconnect.php');


    set_employee_session($_SESSION['myID']);      
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Employee | <?php echo get_field('fname', 'wt_employee', $_SESSION['myID']) . " " . get_field('lname', 'wt_employee', $_SESSION['myID']); ?> </title>
</head>
<body>
	<div id='menu'>
		<ul>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="upload_webtoon.php">Webtoons</a></li>			
			<li><a href="survey.php">Survey</a></li>			
			<li><a href="../../controller/logout_controller.php">Logout</a></li>
		</ul>
	</div>

	<div id='content'>
		<h4>Webtoons List</h4>
		<?php list_webtoons(); ?>

		<!-- modal -->
		<h4>Upload Webtoon</h4>
		<form action="../../controller/upload_webtoon_controller.php" method="POST" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Upload Image:</td>
					<td> 
						<!-- max: 50MB -->
						<input type="hidden" name="MAX_FILE_SIZE" value="50000000">
                    	<input name="file" type="file" accept=".gif, .jpg, .jpeg, .png"> 
					</td>
				</tr>
				<tr>
					<td>Title:</td>
					<td><input type='text' name='title' required></td>
				</tr>
				<tr>
					<td>Caption:</td>
					<td><textarea name='caption' maxlength='150' required></textarea></td>
				</tr>
				<tr>
					<td>Illustrator:</td>
					<td><input type='text' name='illustrator' required></td>
				</tr>
				<tr>
					<td>Tags (separate by commas):</td>
					<td><input type='text' name='tags' required></td>
				</tr>
				<tr>
					<td><input type='submit' name='upload_webtoon' value='Submit'></td>		
					<td><input type='reset' value='Cancel'></td>				
				</tr>
			</table>
		</form>
	</div>
</body>
</html>