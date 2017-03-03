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
		<blockquote>
			<p>Please answer the questions to proceed.</p>
		</blockquote>
		<form action='../controller/forgot_pass_controller.php' method='POST'>
			<div class="form-group">
				<label for="exampleInputEmail1">Security Question 1</label>
				<p class="form-control-static"><?php echo get_secQ($_SESSION['accountID'], 'q1'); ?></p>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Answer 1</label>
			    <input type="text" class="form-control" name="a1" id="exampleInputEmail1" required>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Security Question 2</label>
				<p class="form-control-static"><?php echo get_secQ($_SESSION['accountID'], 'q2'); ?></p>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Answer 2</label>
			    <input type="text" class="form-control" name="a2" id="exampleInputEmail1"  required>
			</div>
			
			<div class="form-group">
			<button type='submit' class="btn btn-default" name='showsecQ' value='Submit'>
			Submit
			</button>
			<a href="../index.php" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</body>
</html>