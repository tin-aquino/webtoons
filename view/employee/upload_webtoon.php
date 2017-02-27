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
		      		<li><a href="profile.php">Profile</a></li>
					<li><a href="webtoons.php">Webtoons</a></li>			
					<li><a href="survey.php">Survey</a></li>			
		        </ul>
		        <ul class="nav navbar-nav navbar-right">
		        	<li><a href="../../controller/logout_controller.php">Logout</a></li>
		        </ul>
		    </div>   	
		</nav>
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
				        <h4 class="modal-title" id="myModalLabel">Edit Webtoon: </h4>
		      		</div>
		      	<div class="modal-body">
		        	<form action='controller/login_controller.php' method='POST'>
		        		<div class="form-group">
						    <label for="exampleInputEmail1">Title</label>
						    <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Title" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Caption</label>
						    <textarea class="form-control" rows="3"></textarea>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Illustrator</label>
						    <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Username" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Tags</label>
						    <textarea class="form-control" rows="3"></textarea>
						</div>
						<div class="form-group"></div>
						<button type='submit' class="btn btn-default" name='login' value='Upload'>
						Edit
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
				        <h4 class="modal-title" id="myModalLabel">Delete Webtoon</h4>
		      		</div>
		      	<div class="modal-body">
		        	<form action='controller/login_controller.php' method='POST'>
		        		<blockquote>
		        			<p>Are you sure you want to delete the webtoon?</p>
		        		</blockquote>
						<div class="form-group"></div>
						<button type='submit' class="btn btn-primary" name='login' value='Upload'>
						Yes
						</button>
						<button type='submit' class="btn btn-danger" name='login' value='Upload'>
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