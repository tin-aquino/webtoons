<?php
	if(!isset($_COOKIE['loggedin_user'])){
        header("location:../../index.php");
    }
    
    require("../../model/model.php");  
    require('../../file_includes/dbconnect.php');


    set_user_session($_SESSION['myID']);      
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User | <?php echo get_field('fname', 'wt_user', $_SESSION['myID']) . " " . get_field('lname', 'wt_user', $_SESSION['myID']); ?> </title>
	<script
	src="https://code.jquery.com/jquery-3.1.1.min.js"
	integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
	crossorigin="anonymous">	
	</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../../file_includes/css/updatewebtoons.css">
	<link rel="stylesheet" type="text/css" href="../../file_includes/css/index.css">
	
</head>
<body>
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
					<li><a href="webtoons.php">Webtoons List</a></li>			
		        </ul>
		        <ul class="nav navbar-nav navbar-right">
		        	<li class="dropdown">
		        		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage Account <span class="caret"></span></a>
				        <ul class="dropdown-menu">
				            <li><a href="#" data-toggle="modal" data-target="#myUpdateAccount">Update Account Information</a></li>
				            <li><a href="#" data-toggle="modal" data-target="#myUpdateSecurityQ">Update Security Questions</a></li>
				            <li><a href="#" data-toggle="modal" data-target="#myUpdatePassword">Update Password</a></li>
				            <li role="separator" class="divider"></li>
				            <li><a href="../../controller/logout_controller.php">Logout</a></li>
				        </ul>
				    </li>
		        	<!--<li><a href="../../controller/logout_controller.php">Logout</a></li>-->
		        </ul>
		    </div>   	
		</nav>

		

		<!--UPDATE ACCOUNT MODAL-->
		<div class="modal fade" id="myUpdateAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Login</h4>
		      		</div>
		      	<div class="modal-body">
		        	<form action='../../controller/update_account_controller.php' method='POST'>
		        		<div class="form-group">
						    <label for="exampleInputEmail1">Last Name</label>
						    <input type="text" class="form-control" name="lname" id="exampleInputEmail1" value="<?php echo get_field('lname', 'wt_user', $_SESSION['myID']);?>" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">First Name</label>
						    <input type="text" class="form-control" name="fname" id="exampleInputEmail1" value="<?php echo get_field('fname', 'wt_user', $_SESSION['myID']);?>" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Middle Name</label>
						    <input type="text" class="form-control" name="mname" id="exampleInputEmail1" value="<?php echo get_field('mname', 'wt_user', $_SESSION['myID']);?>" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Birthday</label>
						    <input type="date" class="form-control" name="bday" id="exampleInputEmail1" value="<?php echo get_field('birthday', 'wt_user', $_SESSION['myID']);?>" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Sex</label>
						    <?php get_sex($_SESSION['myID']); ?>
						    <!--<div class="radio">
							    <label>
							    <input type="radio" name="sex" id="optionsRadios1" value="M"> Male
							    </label>
						    </div>
						    <div class="radio">
							    <label>
							    <input type="radio" name="sex" id="optionsRadios1" value="F"> Female
							    </label>
						    </div>-->
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">City</label>
							<select class="form-control" name="city">
								<?php get_city($_SESSION['myID']);
								citylist();
							?>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Province</label>
							<select class="form-control" name="province">
								<?php get_province($_SESSION['myID']);
								provincelist();
							?>
							</select>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Email address</label>
						    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo get_field('email', 'wt_user', $_SESSION['myID']);?>" required>
						</div>
						<div class="form-group">
						<button type='submit' class="btn btn-default" name='update_account' value='Update'>
						Update Account
						</button>
						</div>
					</form>
		      	</div>
		    	</div>
		  	</div>
		</div>

		<!--UPDATE SECURITY QUESTIONS-->
		<div class="modal fade" id="myUpdateSecurityQ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Update Security Questions</h4>
		      		</div>
		      	<div class="modal-body">
		        	<form action='../../controller/update_sq_controller.php' method='POST'>
						<div class="form-group">
							<label for="exampleInputEmail1">Security Question 1</label>
							<select class="form-control" name="sq1">
								<?php 
								get_secQ1($_SESSION['myID']);
							?>
							</select>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Answer 1</label>
						    <input type="text" class="form-control" name="a1" id="exampleInputEmail1" value = "<?php echo get_field('a1', 'wt_secqa', $_SESSION['myID']);?>" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Security Question 2</label>
							<select class="form-control" name="sq2">
								<?php 
								get_secQ2($_SESSION['myID']);
							?>
							</select>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Answer 1</label>
						    <input type="text" class="form-control" name="a2" id="exampleInputEmail1" value = "<?php echo get_field('a2', 'wt_secqa', $_SESSION['myID']);?>" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputPassword1">Password</label>
						    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
						</div>
						<div class="form-group">
						<button type='submit' class="btn btn-default" name='update_sq' value='Update'>
						Update
						</button>
						</div>
					</form>
		      	</div>
		    	</div>
		  	</div>
		</div>

		<!--UPDATE PASSWORD-->
		<div class="modal fade" id="myUpdatePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Update Security Questions</h4>
		      		</div>
		      	<div class="modal-body">
		        	<form action='../../controller/update_password_controller.php' method='POST'>
						<div class="form-group">
						    <label for="exampleInputPassword1">Old Password</label>
						    <input type="password" name="oldpass" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputPassword1">New Password</label>
						    <input type="password" name="newpass1" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputPassword1">Re-type New Password</label>
						    <input type="password" name="newpass2" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
						</div>
						<div class="form-group">
						<button type='submit' class="btn btn-default" name='change_pass' value='Update'>
						Update
						</button>
						</div>
					</form>
		      	</div>
		    	</div>
		  	</div>
		</div>

		<?php
			global $con;

			$query = "SELECT * FROM wt_webtoon WHERE status=1";
			$result = mysqli_query($con, $query);

			if($result) {
            	$i = 0;

            	while ($values = mysqli_fetch_array($result)) {
	                $webtoonID = $values['webtoonID'];
	                $title = $values['title'];
	                $caption = $values['caption'];
	                $file = $values['fileContent'];                
	                $illustrator = $values['illustrator'];
	                $question = $values['question'];
	                $tags = $values['tags'];
	    ?>
		
			<a href='#' data-toggle='modal' data-target='#view_webtoon<?php echo $webtoonID; ?>'>
				<div class="col-sm-6 col-md-4">
			    	<div class="thumbnail">
			      		<img src="../../file_includes/uploads/<?php echo $file; ?>" alt="...">
			      		<div class="caption">
					        <h3><?php echo $title; ?></h3>
                            <p>by <?php echo $illustrator; ?></p>
                            <p><?php echo $caption; ?> </p> 					                                    
			      		</div>
			   		</div>
				</div>		
			</a>		
		
			<!--VIEW WEBTOON-->
			<div class="modal fade" id="view_webtoon<?php echo $webtoonID; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  	<div class="modal-dialog" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">View Webtoon: <?php echo $title; ?> </h4>
			      		</div>
			      	<div class="modal-body">
			        	<form action='view_webtoon.php?webtoon=<?php echo $webtoonID; ?>' method='POST'>
			        		<blockquote>
			        			<p>Are you sure you want to view <?php echo $title; ?>? 
			        				<br> Answering "Yes" will deduct 1 from your tokens.</p>
			        		</blockquote>
							<div class="form-group"></div>
							<input type = 'hidden' name = 'webtoonID' value = '<?php echo $webtoonID; ?>'>
							<input type = 'hidden' name = 'userID' value = '<?php echo $_SESSION['userID']; ?>'>
							<button type='submit' class="btn btn-primary" name='view_webtoon'>
							Yes
							</button>
							<button type='button' class="btn btn-danger" data-dismiss="modal">
							No
							</button>
							</div>	
						</form>
			      	</div>
			    	</div>
			  	</div>
			</div>

		<?php
				}
			}
		?>
</body>
</html>
