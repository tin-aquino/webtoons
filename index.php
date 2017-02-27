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
	<!-- RECAPTCHA -->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<title>Webtoons</title>
	<script
	src="https://code.jquery.com/jquery-3.1.1.min.js"
	integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
	crossorigin="anonymous">	
	</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="file_includes/css/index.css">
	
	
</head>
<body>
	<div id='top'>
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
	      		<li><a href="index.php">Home</a></li>
				<li><a href="view/about.php">About</a></li>
				<li><a href="view/wt_list.php">Webtoons List</a></li>
	        </ul>
	    </div>   	
		</nav>

		<div class="jumbotron">
		  	<h1>Hello, world!</h1>
		  	<p>...</p>
		  	<p>
		  		<!--Button Trigger MODAL-->
		  		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myLoginModal">
				  Login
				</button>
				<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myRegisterModal">
				  Register
				</button>
			</p>


		</div>

		<!-- Button trigger modal -->
		<!--
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myLoginModal">
		  Login
		</button>
		-->

		<!-- Modal -->
		<div class="modal fade" id="myLoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Login</h4>
		      		</div>
		      	<div class="modal-body">
		        	<form action='controller/login_controller.php' method='POST'>
		        		<div class="form-group">
						    <label for="exampleInputEmail1">Username</label>
						    <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Username" required>
						</div>
						<!--Username: <input type='text' name='username' placeholder='Username' required> <br>-->
						<div class="form-group">
						    <label for="exampleInputPassword1">Password</label>
						    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
						</div>
						<!--Password: <input type='password' name='password' placeholder='Password' required> <br>-->
						<a href="view/forgot_pass.php">Forgot password?</a><br>
						<div class="form-group"></div>
						<button type='submit' class="btn btn-default" name='login' value='Login'>
						Login
						</button>
					</form>
		      	</div>
		    	</div>
		  	</div>
		</div>

		<!--<div id='login'>
			<h2>Login</h2>
			<form action='controller/login_controller.php' method='POST'>
				Username: <input type='text' name='username' placeholder='Username' required> <br>
				Password: <input type='password' name='password' placeholder='Password' required> <br>
				<a href="view/forgot_pass.php">Forgot password?</a><br>
				<input type='submit' name='login' value='Login'>
			</form>
		</div> -->

		<!-- convert to modal-->
		<!-- Button trigger modal -->
		<!--
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myRegisterModal">
		  Register
		</button>
		-->
		<!-- Modal -->
		<div class="modal fade" id="myRegisterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Register</h4>
		      		</div>
		      	<div class="modal-body">
		        	<form action='controller/add_user_controller.php' method='POST'>
		        		<div class="form-group">
						    <label for="exampleInputEmail1">Last Name</label>
						    <input type="text" name="lname" class="form-control" id="exampleInputEmail1" placeholder="Last Name" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">First Name</label>
						    <input type="text" name="fname" class="form-control"  id="exampleInputEmail1" placeholder="First Name" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Middle Name</label>
						    <input type="text" name="mname" class="form-control"  id="exampleInputEmail1" placeholder="Middle Name" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">First Name</label>
						    <input type="date" name="sex" class="form-control"  id="exampleInputEmail1"  required>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Sex</label>
						    <div class="radio">
							    <label>
							    <input type="radio" name="sex" id="optionsRadios1" value="M"> Male
							    </label>
						    </div>
						    <div class="radio">
							    <label>
							    <input type="radio" name="sex" id="optionsRadios1" value="F"> Female
							    </label>
						    </div>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">City</label>
							<select class="form-control" name="city">
								<option value=''>--Choose a city--</option>
								<?php citylist(); ?>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Province</label>
							<select class="form-control" name="province">
								<option value=''>--Choose a province--</option>
								<?php provincelist(); ?>
							</select>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Email address</label>
						    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="someone@email.com" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Username</label>
						    <input type="text" name="username" class="form-control"  id="exampleInputEmail1"  required>
						</div>
						<div class="form-group">
						    <label for="exampleInputPassword1">Password</label>
						    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
						</div>
						<div class="form-group g-recaptcha" data-sitekey="6Lf57hAUAAAAAFcemwhoWxJKs611f0s25TunkbDG">
							
						</div>
						<div class="form-group">    
						<button type="submit" value="Submit" class="btn btn-default" name="register">Submit</button>
						</div>   
						
    
						<!--
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
		  	</div>
		</div>

		<div id='register'>
			<h2>Register</h2>
			<form action='controller/add_user_controller.php' method='POST'>
				Last Name: <input type='text' name='lname' placeholder='Last Name' required> <br>
				First Name: <input type='text' name='fname' placeholder='First Name' required> <br>
				Middle Name: <input type='text' name='mname' placeholder='Middle Name' required> <br>
				Birthday: <input type='date' name='bday' placeholder='mm/dd/yyyy' required> <br>
				Sex:	<input type='radio' name='sex' value='M'> Male 
						<input type='radio' name='sex' value='F'> Female <br>
				City: 	
					<select name='city'>
						<option value=''>Choose a city</option>
						<?php citylist(); ?>
					</select> <br>
				Province: 
					<select name="province">
						<option value=''>Choose a province</option>
						<?php provincelist(); ?>
					</select> <br>
				Email: <input type='email' name='email' placeholder='someone@gmail.com' required> <br>
				Username: <input type='text' name='username' placeholder='Username' required> <br>
				Password: <input type='text' name='password' placeholder='Password' required> <br>
				//RECAPTCHA
				<div class="g-recaptcha" data-sitekey="6Lf57hAUAAAAAFcemwhoWxJKs611f0s25TunkbDG"></div>
				//END RECAPTCHA
				<input type='submit' value='Submit' name='register'>-->
					</form>
				</div>
				</div>
			</div>
		</div>

	<div class="container">
	<div class="row">
		  <div class="col-sm-6 col-md-4">
		    	<div class="thumbnail">
		      		<img src="file_includes/images/1.jpg" alt="...">
		      		<div class="caption">
				        <h3>Thumbnail label</h3>
				        <p>...</p>
				        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
		      		</div>
		   		</div>
		  </div>
	
	
	
		  <div class="col-sm-6 col-md-4">
		    	<div class="thumbnail">
		      		<img src="view/images/2.jpg" alt="...">
		      		<div class="caption">
				        <h3>Thumbnail label</h3>
				        <p>...</p>
				        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
		      		</div>
		   		</div>
		  </div>
	
	
		  <div class="col-sm-6 col-md-4">
		    	<div class="thumbnail">
		      		<img src="view/images/3.jpg" alt="...">
		      		<div class="caption">
				        <h3>Thumbnail label</h3>
				        <p>...</p>
				        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
		      		</div>
		   		</div>
		  </div>
	</div>
	</div>
	
	<script>$('#myModal').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	})
	</script>
</body>

</html>