<?php
	require("file_includes/dbconnect.php");
    require("model/model.php");
    
    if(isset($_COOKIE['loggedin_user'])){
        header ('location: view/user/index.php');                
    }
    
    else if (isset($_COOKIE['loggedin_admin'])){
        header ('location: view/admin/index.php?users=all');                
    }
    
    else if (isset($_COOKIE['loggedin_employee'])){
        header ('location: view/employee/index.php');                
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
		<nav class="navbar navbar-inverse navbar-fixed-top">
	    <div class="navbar-header">
	      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	      	</button>
	      	<a class="navbar-brand" href="#"><span><img class="brand" src="file_includes/images/katsu.gif"><span class="red">Katsu</span>toons</span></a>
	    </div>
  		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      	<ul class="nav navbar-nav">
	      		<li><a href="index.php">Home</a></li>
				<li><a href="view/webtoons.php">Webtoons List</a></li>
	        </ul>
	    </div>   	
		</nav>

		<div class="jumbotron">
		  	<h1>Kamusta! Halina't sumama sa mga lakbay ni katsu!</h1>
		  	<p>Gumawa ka na ng iyong account para masubaybayan ang mga kwento ni katsu!</p>
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
						<div class="form-group">
						    <label for="exampleInputPassword1">Password</label>
						    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
						</div>						
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
						    <label for="exampleInputEmail1">Birthday</label>
						    <input type="date" name="bday" class="form-control"  id="exampleInputEmail1"  required>
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
						<div class="form-group g-recaptcha" data-sitekey="6Lf57hAUAAAAAFcemwhoWxJKs611f0s25TunkbDG"></div>
						<div class="form-group">    
							<button type="submit" value="Submit" class="btn btn-default" name="register">Submit</button>
						</div>   
					</form>
				</div>
				</div>
			</div>
		</div>

	<div class="container">		
	<div class="row">
		<div class='col-sm-6 col-md-4'>
			<a href='view/view_toons.php?webtoon=1'>
		        <div class='thumbnail'>
		            <img class="img-responsive" src="file_includes/images/1.jpg" alt='...'>
		            <div class='caption'>
		                <h3>Kitkat</h3>
		                <p>Hippocrates</p>
		                <p>Life is short, the art long.</p>                                                                        
		            </div>
		        </div>
	    	</a>
	    </div>

	    <div class='col-sm-6 col-md-4'>
	    	<a href='view/view_toons.php?webtoon=2'>
		        <div class='thumbnail'>
		            <img class="img-responsive" src="file_includes/images/2.jpg" alt='...'>
		            <div class='caption'>
		                <h3>Kitty</h3>
		                <p>William Ellery Channing</p>
		                <p>How easy to be amiable in the midst of happiness and success.</p>                                                                        
		            </div>
		        </div>
		    </a>
	    </div>

	    <div class='col-sm-6 col-md-4'>
	    	<a href='view/view_toons.php?webtoon=3'>
		        <div class='thumbnail'>
		            <img class="img-responsive" src="file_includes/images/3.jpg" alt='...'>
		            <div class='caption'>
		                <h3>Cutie</h3>
		                <p>Francis Bacon</p>
		                <p>The job of the artist is always to deepen the mystery.</p>                                                                        
		            </div>
		        </div>
	    	</a>
	    </div>
	</div>
	</div>
	
	<script>$('#myModal').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	})
	</script>
</body>

</html>