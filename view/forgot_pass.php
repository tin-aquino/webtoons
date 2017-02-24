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
			Username: <input type='text' name='username' placeholder='Username' required> <br>
			E-mail: <input type='email' name='email' placeholder='E-mail' required> <br>
			<input type='submit' name='forgotpass' value='Submit'> <br>
		</form>
	</div>
</body>
</html>