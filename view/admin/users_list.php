<?php
	if(!isset($_COOKIE['loggedin_admin'])){
        header("location:../../index.php");
    }
    
    require("../../model/model.php");  
    require('../../file_includes/dbconnect.php');


    set_admin_session($_SESSION['myID']);       
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin | UsersList </title>
	<script
	src="https://code.jquery.com/jquery-3.1.1.min.js"
	integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
	crossorigin="anonymous">	
	</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
					<li><a href="manage_accounts.php?users=all">Accounts</a></li>		
					<li><a href="users_list.php?users=all">Users List</a></li>		
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
		        	
		        </ul>
		        
		    </div>   	
		</nav>
	<div class="container">
	<div class="dropdown">
	  	<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
	    Filter List
	    	<span class="caret"></span>
	  	</button>
	  	<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
	  		<li><a href="users_list.php?users=all" type="submit" name='all' value='All'>All</a></li>
	  		<li><a href="users_list.php?users=active" type="submit" name='active' value='Active'>Active</a></li>
	  		<li><a href="users_list.php?users=inactive" type="submit" name='inactive' value='Inactive'>Inactive</a></li>
	  	</ul>
	</div>
	
	
	<div id='accounts_list'>
		<table class="table table-hover">
               <tr>
                   <th>#</th>
                   <th>Name</th>
                   <th>Username</th>
                   <th>Birthday</th>
                   <th>Sex</th>
                   <th>City</th>
                   <th>Province</th>
                   <th>E-mail</th>
                   <th>Account Status</th>
                   <th>Account Type</th>
               </tr>	
		<?php
			$a = $_GET['users'];
			 				 
        	if (isset($_POST['all']) || ($a == 'all')) {
        		echo '<h4>All List</h4>';
        		user_all_list(); 
        		
        	}
        	else if (isset($_POST['active']) || ($a == 'active')) {
        		echo '<h4>Active List</h4>';
        		user_active_list(); 
        		
        	}
        	else if (isset($_POST['inactive']) || ($a == 'inactive')) {
        		echo '<h4>Inactive List</h4>';
        		user_inactive_list(); 
        		
        	}

        	echo '</table>';
            ?>
	</div>
	<!--MANAGE ACCOUNT MODALS-->
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
						    <input type="text" class="form-control" name="lname" id="exampleInputEmail1" value="<?php echo get_field('lname', 'wt_admin', $_SESSION['myID']);?>" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">First Name</label>
						    <input type="text" class="form-control" name="fname" id="exampleInputEmail1" value="<?php echo get_field('fname', 'wt_admin', $_SESSION['myID']);?>" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Middle Name</label>
						    <input type="text" class="form-control" name="mname" id="exampleInputEmail1" value="<?php echo get_field('mname', 'wt_admin', $_SESSION['myID']);?>" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Birthday</label>
						    <input type="date" class="form-control" name="bday" id="exampleInputEmail1" value="<?php echo get_field('birthday', 'wt_admin', $_SESSION['myID']);?>" required>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Email address</label>
						    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo get_field('email', 'wt_admin', $_SESSION['myID']);?>" required>
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
						Change Password
						</button>
						</div>
					</form>
		      	</div>
		    	</div>
		  	</div>
		</div>	
	</div>
</body>
</html>