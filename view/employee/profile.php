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
	<script
	src="https://code.jquery.com/jquery-3.1.1.min.js"
	integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
	crossorigin="anonymous">	
	</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="view/css/index.css">
</head>
<body>
	<!-- NAVBAR-->
		<nav class="navbar navbar-inverse">
		<div class="container-fluid">
	    <div class="navbar-header">
	      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	      	</button>
	      	<a class="navbar-brand" href="#">Brand</a>
	    </div>
  		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      	<ul class="nav navbar-nav">
	      		<li><a href="profile.php">Profile</a></li>
				<li><a href="webtoons.php">Webtoons</a></li>			
				<li><a href="survey.php">Survey</a></li>			
	        </ul>
	        <ul class="nav navbar-nav navbar-right">
	        	<li><a href="../../controller/logout_controller.php">Logout</a></li>
	        </ul>
	    </div>   	
		</nav>
	<!--<div id='menu'>
		<ul>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="upload_webtoon.php">Webtoons</a></li>			
			<li><a href="survey.php">Survey</a></li>			
			<li><a href="../../controller/logout_controller.php">Logout</a></li>
		</ul>
	</div>-->

	<div id='content'>
		<h4>EMPLOYEE PROFILE.PHP</h4>
		<table>
			<tr>
				<td>ID Number: </td>
				<td><?php echo get_field('idnum', 'wt_employee', $_SESSION['myID']);?></td>
			</tr>
			<tr>
				<td>Last Name: </td>
				<td><?php echo get_field('lname', 'wt_employee', $_SESSION['myID']);?></td>
			</tr>
			<tr>
				<td>First Name: </td>
				<td><?php echo get_field('fname', 'wt_employee', $_SESSION['myID']);?></td>
			</tr>
			<tr>
				<td>Middle Name: </td>
				<td><?php echo get_field('mname', 'wt_employee', $_SESSION['myID']);?></td>
			</tr>
			<tr>
				<td>E-mail: </td>
				<td><?php echo get_field('email', 'wt_employee', $_SESSION['myID']);?></td>
			</tr>
		</table>
	</div>

	<!--convert to modal-->
	<div ='update_info'>
		<h4>Update Account Information</h4>
		<form action="../../controller/update_account_controller.php" method="POST">
			<table>
				<tr>
					<td>ID Number: </td>
					<td><input type="text" value="<?php echo get_field('idnum', 'wt_employee', $_SESSION['myID']);?>" disabled></td>
				</tr>
				<tr>
					<td>Last Name: </td>
					<td><input type='text' name='elname' value = "<?php echo get_field('lname', 'wt_employee', $_SESSION['myID']);?>"></td>
				</tr>
				<tr>
					<td>First Name: </td>
					<td><input type='text' name='efname' value = "<?php echo get_field('fname', 'wt_employee', $_SESSION['myID']);?>"></td>
				</tr>
				<tr>
					<td>Middle Name: </td>
					<td><input type='text' name='emname' value = "<?php echo get_field('mname', 'wt_employee', $_SESSION['myID']);?>"></td>
				</tr>
				<tr>
					<td>E-mail: </td>
					<td><input type='text' name='eemail' value = "<?php echo get_field('email', 'wt_employee', $_SESSION['myID']);?>"></td>
				</tr>
				<tr>
					<td><input type='submit' name='update_account' value='Submit'></td>				
				</tr>
			</table>
		</form>
	</div>

	<!--convert to modal-->
	<div ='update_sq'>
		<h4>Update Security Questions</h4>
		<form action="../../controller/update_sq_controller.php" method="POST">
			<table>
				<tr>
					<td>Security Question 1: </td>
					<td><select name='sq1'>
							<?php 
								get_secQ1($_SESSION['myID']);
							?>
						</select></td>
				</tr>
				<tr>
					<td>Answer 1: </td>
					<td><input type='text' name='a1' value = "<?php echo get_field('a1', 'wt_secqa', $_SESSION['myID']);?>" required></td>
				</tr>
				<tr>
					<td>Security Question 2: </td>
					<td><select name='sq2'>
							<?php 
								get_secQ2($_SESSION['myID']);
							?>
						</select></td>
				</tr>
				<tr>
					<td>Answer 2: </td>
					<td><input type='text' name='a2' value = "<?php echo get_field('a2', 'wt_secqa', $_SESSION['myID']);?>" required></td>
				</tr>
				<tr>
					<td>Password: </td>
					<td><input type='password' name='password' required></td>
				</tr>				
				<tr>
					<td><input type='submit' name='update_sq' value='Submit'></td>				
				</tr>
			</table>
		</form>
	</div>

	<!-- convert to modal -->
	<div id='change_pass'>
		<h4>Change Password</h4>
		<form action="../../controller/update_password_controller.php" method="POST">
			<table>
				<tr>
					<td>Old Password: </td>
					<td><input type='password' name='oldpass' required></td>
				</tr>
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
	</div>
</body>
</html>