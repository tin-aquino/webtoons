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
</head>
<body>
	<div id='menu'>
		<ul>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="manage_accounts.php?users=all">Manage Accounts</a></li>		
			<li><a href="users_list.php">Users List</a></li>			
			<li><a href="../../controller/logout_controller.php">Logout</a></li>
		</ul>
	</div>
	
	<!-- convert to dropdown menu -->
	<div id='dropdown_list'>
		<h4>Dropdown Menu</h4>
		<ul>
			<li>
				<form action="manage_accounts.php?users=all" method='POST'>
					<input type="submit" name='all' value='All'></form>
			</li>
			<li>
				<form action="manage_accounts.php?users=admin" method='POST'>
					<input type="submit" name='admin' value='Admin'></form>
			</li>
			<li>
				<form action="manage_accounts.php?users=employee" method='POST'>
					<input type="submit" name='employee' value='Employee'></form>
			</li>
			<li>
				<form action="manage_accounts.php?users=active" method='POST'>
					<input type="submit" name='active' value='Active'></form>
			</li>
			<li>
				<form action="manage_accounts.php?users=inactive" method='POST'>
					<input type="submit" name='inactive' value='Inactive'></form>
			</li>
		</ul>

	</div>

	<div id='accounts_list'>
		<table>
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

	<!-- convert to modal -->
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

	<!-- Convert to modal -->
	<div id='activate'>
		<h4>Activate Account</h4>
		<form action="../../controller/activate_account_controller.php" method='POST'>
			<table>
				<tr>
					<td>Account Type</td>
					<td><select name ="atype">	
							<option value=''>--Account Type--</option>	                                                
	                        <option value = "admin">Admin</option>
	                        <option value = "employee">Employee</option>
	                    </select></td>
				</tr>
				<tr>
					<td>ID Number: </td>
					<td><input type="text" placeholder="ID Number" name="idnum"
						title="Example: 2011012345"
                        pattern="[0-9]{10}"></td>
				</tr>
				<tr>
					<td>Last Name: </td>
					<td><input type="text" placeholder="Last Name" name="lname"></td>
				</tr>
				<tr>
					<td>First Name: </td>
					<td><input type="text" placeholder="First Name" name="fname"></td>
				</tr>
				<tr>
					<td>Middle Name: </td>
					<td><input type="text" placeholder="Middle Name" name="mname"></td>
				</tr>				
				<tr>
					<td>Your Password: (admin)</td>
					<td><input type="password" placeholder="Your Password" name="pass"></td>
				</tr>				
				<tr>
					<td><input type="submit" name="activate_account" value='Activate Account'></td>					
				</tr>				
			</table>
		</form>
	</div>

	<div id='deactivate'>
		<h4>Deactivate Account</h4>
		<form action="../../controller/deactivate_account_controller.php" method='POST'>
			<table>
				<tr>
					<td>Account Type</td>
					<td><select name ="atype">
							<option value=''>--Account Type--</option>	                                                
	                        <option value = "admin">Admin</option>
	                        <option value = "employee">Employee</option>
	                    </select></td>
				</tr>
				<tr>
					<td>ID Number: </td>
					<td><input type="text" placeholder="ID Number" name="idnum"
						title="Example: 2011012345"
                        pattern="[0-9]{10}"></td>
				</tr>
				<tr>
					<td>Last Name: </td>
					<td><input type="text" placeholder="Last Name" name="lname"></td>
				</tr>
				<tr>
					<td>First Name: </td>
					<td><input type="text" placeholder="First Name" name="fname"></td>
				</tr>
				<tr>
					<td>Middle Name: </td>
					<td><input type="text" placeholder="Middle Name" name="mname"></td>
				</tr>				
				<tr>
					<td>Your Password: (admin)</td>
					<td><input type="password" placeholder="Your Password" name="pass"></td>
				</tr>				
				<tr>
					<td><input type="submit" name="deactivate_account" value='Deactivate Account'></td>					
				</tr>				
			</table>
		</form>
	</div>
</body>
</html>