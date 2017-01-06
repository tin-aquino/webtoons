<?php
	require("file_includes/dbconnect.php");
    require("model/model.php");
    
    if(isset($_COOKIE['loggedin_user'])){
        header ('location: view/user/profile.php');                
    }
    
    else if (isset($_COOKIE['loggedin_admin'])){
        header ('location: view/admin/profile.php');                
    }
    
    else if (isset($_COOKIE['loggedin_employee'])){
        header ('location: view/employee/profile.php');                
    }              
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Webtoons</title>
</head>
<body>
	<div id='top'>
		<!-- convert to modal-->
		<div id='login'>
			<h2>Login</h2>
			<form action='controller/login_controller.php' method='POST'>
				Username: <input type='text' name='username' placeholder='Username' required> <br>
				Password: <input type='password' name='password' placeholder='Password' required> <br>
				<a href="view/forgot_pass.php">Forgot password?</a><br>
				<input type='submit' name='login' value='Login'>
			</form>
		</div>

		<!-- convert to modal-->
		<div id='register'>
			<h2>Register</h2>
			<form action='controller/register_controller.php' method='POST'>
				Last Name: <input type='text' name='lname' placeholder='Last Name' required> <br>
				First Name: <input type='text' name='fname' placeholder='First Name' required> <br>
				Middle Name: <input type='text' name='mname' placeholder='Middle Name' required> <br>
				Birthday: <input type='date' name='bday' placeholder='mm/dd/yyyy' required> <br>
				Sex:	<input type='radio' name='sex' value='M'> Male 
						<input type='radio' name='sex' value='F'> Female <br>
				City: 	
					<select name='city'>
						<option value=''>--Choose a city--</option>
						<?php citylist(); ?>
					</select> <br>
				Province: 
					<select name="province">
						<option value=''>--Choose a province--</option>
						<?php provincelist(); ?>
					</select> <br>
				Email: <input type='email' name='email' placeholder='someone@gmail.com' required> <br>
				<input type='submit' value='Submit'>
			</form>
		</div>
	</div>

	<div id='menu'>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="view/about.php">About</a></li>
			<li><a href="view/wt_list.php">Webtoons List</a></li>
		</ul>		
	</div>

	<div id='content'>
		FEATURED WEBTOONS
	</div>
</body>
</html>