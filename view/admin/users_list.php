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
</head>
<body>
	<div id='menu'>
		<ul>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="manage_accounts.php?users=all">Manage Accounts</a></li>		
			<li><a href="users_list.php?users=all">Users List</a></li>			
			<li><a href="../../controller/logout_controller.php">Logout</a></li>
		</ul>
	</div>
	
	<!-- convert to dropdown menu -->
	<div id='dropdown_list'>
		<h4>Dropdown Menu</h4>
		<ul>
			<li>
				<form action="users_list.php?users=all" method='POST'>
					<input type="submit" name='all' value='All'></form>
			</li>
			<li>
				<form action="users_list.php?users=active" method='POST'>
					<input type="submit" name='active' value='Active'></form>
			</li>
			<li>
				<form action="users_list.php?users=inactive" method='POST'>
					<input type="submit" name='inactive' value='Inactive'></form>
			</li>
		</ul>

	</div>

	<div id='accounts_list'>
		<table>
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
</body>
</html>