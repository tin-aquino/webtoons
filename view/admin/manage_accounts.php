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
	<title>Admin | Manage Accounts </title>
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
	<!-- convert to dropdown menu -->
	<div class="dropdown">
	  	<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
	    Filter List
	    	<span class="caret"></span>
	  	</button>
	  	<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
	  		<li><a href="manage_accounts.php?users=all" type="submit" name='all' value='All'>All</a></li>
	  		<li><a href="manage_accounts.php?users=admin" type="submit" name='admin' value='Admin'>Admin</a></li>
	  		<li><a href="manage_accounts.php?users=employee" type="submit" name='employee' value='Employee'>Employee</a></li>
	  		<li><a href="manage_accounts.php?users=active" type="submit" name='active' value='Active'>Active</a></li>
	  		<li><a href="manage_accounts.php?users=inactive" type="submit" name='inactive' value='Inactive'>Inactive</a></li>
	  	</ul>
	</div>

	<div id='accounts_list'>
		<table class="table table-hover">
               <tr>
                   <th>#</th>
                   <th>Employee Name</th>
                   <th>ID Number</th>
                   <th>Account Status</th>
                   <th>Account Type</th>
               </tr>	
		<?php
			$a = $_GET['users'];
			 				 
        	if (isset($_POST['employee']) || ($a == 'employee')) {
        		echo '<h4>Employee List</h4>';
        		employee_list(); 
        		
        	}
        	else if (isset($_POST['admin']) || ($a == 'admin')) {
        		echo '<h4>Admin List</h4>';
        		admin_list(); 
        		
        	}
        	else if (isset($_POST['all']) || ($a == 'all')) {
        		echo '<h4>All List</h4>';
        		all_list(); 
        		
        	}
        	else if (isset($_POST['active']) || ($a == 'active')) {
        		echo '<h4>Active List</h4>';
        		active_list(); 
        		
        	}
        	else if (isset($_POST['inactive']) || ($a == 'inactive')) {
        		echo '<h4>Inactive List</h4>';
        		inactive_list(); 
        		
        	}

        	echo '</table>';
            ?>
	</div>

	<div class="row">
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myAddAccount">
				  Add Account
		</button>
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myActivateAccount">
				  Activate Account
		</button>
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myDeactivateAccount">
				  Deactivate Account
		</button>	
	</div>

	<!--ADD ACCOUNT-->
	<div class="modal fade" id="myAddAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Add Account</h4>
		      		</div>
		      	<div class="modal-body">
		        	<form action='../../controller/add_account_controller.php' method='POST'>
		        		<div class="form-group">
							<label for="exampleInputEmail1">Account Type</label>
							<select class="form-control" name="addatype">
								<option value=''>--Account Type--</option>	                        
		                        <option value = "admin">Admin</option>
		                        <option value = "employee">Employee</option>
							</select>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">ID Number</label>
						    <input type="text" class="form-control" name="addidnum" id="exampleInputEmail1" placeholder="ID Number" title="Example: 2011012345" pattern="[0-9]{10}">
						</div>
		        		<div class="form-group">
						    <label for="exampleInputEmail1">Last Name</label>
						    <input type="text" class="form-control" name="addlname" id="exampleInputEmail1" placeholder="Last Name">
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">First Name</label>
						    <input type="text" class="form-control" name="addfname" id="exampleInputEmail1" placeholder="First Name">
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Middle Name</label>
						    <input type="text" class="form-control" name="addmname" id="exampleInputEmail1" placeholder="Middle Name">
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Email address</label>
						    <input type="email" name="addemail" class="form-control" id="exampleInputEmail1" placeholder="example@email.com">
						</div>
						<div class="form-group">
						<button type='submit' class="btn btn-default" name='add_account' value='Add Account'>
						Add Account
						</button>
						</div>
					</form>
		      	</div>
		    	</div>
		  	</div>
		</div>
	<!--
	
	<div id='add_account'>
		<h4>Add Account</h4>
		<form action="../../controller/add_account_controller.php" method='POST'>
			<table>
				<tr>
					<td>Account Type</td>
					<td><select name ="addatype">
							<option value=''>--Account Type--</option>	                        
	                        <option value = "admin">Admin</option>
	                        <option value = "employee">Employee</option>
	                    </select></td>
				</tr>
				<tr>
					<td>ID Number: </td>
					<td><input type="text" placeholder="ID Number" name="addidnum"
						title="Example: 2011012345"
                        pattern="[0-9]{10}"></td>
				</tr>
				<tr>
					<td>Last Name: </td>
					<td><input type="text" placeholder="Last Name" name="addlname"></td>
				</tr>
				<tr>
					<td>First Name: </td>
					<td><input type="text" placeholder="First Name" name="addfname"></td>
				</tr>
				<tr>
					<td>Middle Name: </td>
					<td><input type="text" placeholder="Middle Name" name="addmname"></td>
				</tr>				
				<tr>
					<td>E-mail: </td>
					<td><input type="email" placeholder="E-mail" name="addemail"></td>
				</tr>				
				<tr>
					<td><input type="submit" name="add_account" value='Add Account'></td>					
				</tr>				
			</table>
		</form>
	</div>
-->
<!--ACTIVATE ACCOUNT-->
		<div class="modal fade" id="myActivateAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Add Account</h4>
		      		</div>
		      	<div class="modal-body">
		        	<form action='../../controller/activate_account_controller.php' method='POST'>
		        		<div class="form-group">
							<label for="exampleInputEmail1">Account Type</label>
							<select class="form-control" name="addatype">
								<option value=''>--Account Type--</option>	                        
		                        <option value = "admin">Admin</option>
		                        <option value = "employee">Employee</option>
							</select>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">ID Number</label>
						    <input type="text" class="form-control" name="idnum" id="exampleInputEmail1" placeholder="ID Number" title="Example: 2011012345" pattern="[0-9]{10}">
						</div>
		        		<div class="form-group">
						    <label for="exampleInputEmail1">Last Name</label>
						    <input type="text" class="form-control" name="lname" id="exampleInputEmail1" placeholder="Last Name">
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">First Name</label>
						    <input type="text" class="form-control" name="fname" id="exampleInputEmail1" placeholder="First Name">
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Middle Name</label>
						    <input type="text" class="form-control" name="mname" id="exampleInputEmail1" placeholder="Middle Name">
						</div>
						<div class="form-group">
						    <label for="exampleInputPassword1">Your Password (ADMIN)</label>
						    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Your Password" required>
						</div>
						<div class="form-group">
						<button type='submit' class="btn btn-default" name='activate_account' value='Activate Account'>
						Activate Account
						</button>
						</div>
					</form>
		      	</div>
		    	</div>
		  	</div>
		</div>
	

<!--DEACTIVATE ACCOUNT-->
		<div class="modal fade" id="myDeactivateAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Add Account</h4>
		      		</div>
		      	<div class="modal-body">
		        	<form action='../../controller/deactivate_account_controller.php' method='POST'>
		        		<div class="form-group">
							<label for="exampleInputEmail1">Account Type</label>
							<select class="form-control" name="addatype">
								<option value=''>--Account Type--</option>	                        
		                        <option value = "admin">Admin</option>
		                        <option value = "employee">Employee</option>
							</select>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">ID Number</label>
						    <input type="text" class="form-control" name="idnum" id="exampleInputEmail1" placeholder="ID Number" title="Example: 2011012345" pattern="[0-9]{10}">
						</div>
		        		<div class="form-group">
						    <label for="exampleInputEmail1">Last Name</label>
						    <input type="text" class="form-control" name="lname" id="exampleInputEmail1" placeholder="Last Name">
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">First Name</label>
						    <input type="text" class="form-control" name="fname" id="exampleInputEmail1" placeholder="First Name">
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Middle Name</label>
						    <input type="text" class="form-control" name="mname" id="exampleInputEmail1" placeholder="Middle Name">
						</div>
						<div class="form-group">
						    <label for="exampleInputPassword1">Your Password (ADMIN)</label>
						    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Your Password" required>
						</div>
						<div class="form-group">
						<button type='submit' class="btn btn-default" name='deactivate_account' value='Deactivate Account'>
						Deactivate Account
						</button>
						</div>
					</form>
		      	</div>
		    	</div>
		  	</div>
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