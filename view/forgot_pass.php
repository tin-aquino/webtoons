<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Forgot Password</title>
	<script
	src="https://code.jquery.com/jquery-3.1.1.min.js"
	integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
	crossorigin="anonymous">	
	</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div style="padding: 50px; width: 800px;">
		<h2>Forgot Password</h2>
		
		<form action='../controller/forgot_pass_controller.php' method='POST'>
		    <div class="form-group">
			    <label for="exampleInputEmail1">Username</label>
			    <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder = "Username" required>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">E-Mail</label>
			    <input type="text" class="form-control" name="email" id="exampleInputEmail1" placeholder = "someone@email.com" required>
			</div>
			<div class="form-group">
			<button type='submit' class="btn btn-default" name='forgotpass' value='Submit'>
			Submit
			</button>
			</div>
		</form>
	</div>

	
</body>
</html>