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
	<link rel="stylesheet" type="text/css" href="../../file_includes/css/updatewebtoons.css">
	
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
					<li><a href="index.php">Webtoons</a></li>			
					<li><a href="summary.php">Summary</a></li>			
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

		<!--MODALS-->

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
						    <label for="exampleInputEmail1">ID Number</label>
						    <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo get_field('idnum', 'wt_employee', $_SESSION['myID']);?>" disabled>
						</div>
		        		<div class="form-group">
						    <label for="exampleInputEmail1">Last Name</label>
						    <input type="text" class="form-control" name="elname" id="exampleInputEmail1" value="<?php echo get_field('lname', 'wt_employee', $_SESSION['myID']);?>">
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">First Name</label>
						    <input type="text" class="form-control" name="efname" id="exampleInputEmail1" value="<?php echo get_field('fname', 'wt_employee', $_SESSION['myID']);?>">
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Middle Name</label>
						    <input type="text" class="form-control" name="emname" id="exampleInputEmail1" value="<?php echo get_field('mname', 'wt_employee', $_SESSION['myID']);?>">
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Email address</label>
						    <input type="email" name="eemail" class="form-control" id="exampleInputEmail1" value="<?php echo get_field('email', 'wt_employee', $_SESSION['myID']);?>">
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


		<div class="jumbotron" id="jumbotron">
			<h1>Update your webtoons here!</h1>
			<p>In this page, you can upload new webtoons, and edit and delete your webtoons!</p>
			<p>
			    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myUploadModal">
						  Upload Webtoons
				</button>
			</p>
		</div>

		<!--MODAL CONTENT-->
		<div class="modal fade" id="myUploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Upload Image</h4>
		      		</div>
		      	<div class="modal-body">
		        	<form action="../../controller/upload_webtoon_controller.php" method="POST" enctype="multipart/form-data">
		        		<div class="form-group">
		        			<input type="hidden" name="MAX_FILE_SIZE" value="50000000">                    		
						    <input type="file" class="form-control" name="file" placeholder="Upload image..." accept=".gif, .jpg, .jpeg, .png" required>						    
    					</div>
		        		<div class="form-group">
						    <label for="exampleInputEmail1">Title</label>
						    <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Title" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Caption</label> 
						    <textarea name='caption' class="form-control" rows="3" maxlength='150' placeholder="Up to 150 characters only"></textarea>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Illustrator</label>
						    <input type="text" class="form-control" name="illustrator" id="exampleInputEmail1" placeholder="Illustrator" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Tags</label>
						    <textarea name="tags" class="form-control" rows="3" placeholder="Separated by commas"></textarea>
						</div>
						<div class="form-group"></div>
						<button type='submit' class="btn btn-default" name='upload_webtoon' value='Upload'>
						Upload
						</button>
						<button type='reset' class="btn btn-default" value='Upload'>
						Clear
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
	                $tags = $values['tags'];
	    ?>
		
			
				<div class="col-sm-6 col-md-4">
			    	<div class="thumbnail">
			      		<img src="../../file_includes/uploads/<?php echo $file; ?>" alt="...">
			      		<div class="caption">
					        <h3><?php echo $title; ?></h3>
                            <p>by <?php echo $illustrator; ?></p>
                            <p><?php echo $caption; ?> </p> 
					        <p><a href='#' class='btn btn-default' role='button' data-toggle='modal' data-target='#myEditModal<?php echo $webtoonID; ?>'>Edit</a> 
                            <a href='#' class='btn btn-danger' role='button' data-toggle='modal' data-target='#myDeleteModal<?php echo $webtoonID; ?>'>Delete</a></p>
			      		</div>
			   		</div>
				</div>
				
		

			<!--EDIT MODAL-->
			<div class="modal fade" id="myEditModal<?php echo $webtoonID; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  	<div class="modal-dialog" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Edit Webtoon: <?php echo $title; ?> </h4>
			      		</div>
			      	<div class="modal-body">
			        	<form action='../../controller/update_webtoon_controller.php' method='POST'>
			        		<div class="form-group">
							    <label for="exampleInputEmail1">Title</label>
							    <input type="text" class="form-control" name="title" id="exampleInputEmail1" value="<?php echo $title; ?>" required>
							</div>
							<div class="form-group">
							    <label for="exampleInputEmail1">Caption</label>
							    <textarea class="form-control" rows="3" name="caption"> <?php echo $caption; ?> </textarea>
							</div>
							<div class="form-group">
							    <label for="exampleInputEmail1">Illustrator</label>
							    <input type="text" class="form-control" name="illustrator" id="exampleInputEmail1" value="<?php echo $illustrator; ?>" required>
							</div>
							<div class="form-group">
							    <label for="exampleInputEmail1">Tags</label>
							    <textarea class="form-control" rows="3" name="tags"> <?php echo $tags; ?> </textarea>
							</div>
							<div class="form-group"></div>
							<input type = 'hidden' name = 'webtoonID' value = '<?php echo $webtoonID; ?>'>
							<button type='submit' class="btn btn-default" name='edit_webtoon' value='Upload'>
							Submit
							</button>						
							</div>	
						</form>
			      	</div>
			    	</div>
			  	</div>
			</div>

			<!--DELETE MODAL-->
			<div class="modal fade" id="myDeleteModal<?php echo $webtoonID; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  	<div class="modal-dialog" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Delete Webtoon: <?php echo $title; ?> </h4>
			      		</div>
			      	<div class="modal-body">
			        	<form action='../../controller/delete_webtoon_controller.php' method='POST'>
			        		<blockquote>
			        			<p>Are you sure you want to delete <?php echo $title; ?> ? </p>
			        		</blockquote>
							<div class="form-group"></div>
							<input type = 'hidden' name = 'webtoonID' value = '<?php echo $webtoonID; ?>'>
							<button type='submit' class="btn btn-primary" name='delete_webtoon'>
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