<?php
	require("../file_includes/dbconnect.php");
    require("../model/model.php");

    if (isset($_POST['update_account'])) {       
    	$count = accountExists($_SESSION['myID']);

    	if ($count==1) {
    		$type = get_field('accountType', 'wt_accounts', $_SESSION['myID']);

    		if ($type == 'admin') {
                $lname = mysqli_real_escape_string($con, trim($_POST['alname']));
                $fname = mysqli_real_escape_string($con, trim($_POST['afname']));
                $mname = mysqli_real_escape_string($con, trim($_POST['amname']));
                $email = mysqli_real_escape_string($con, trim($_POST['aemail']));

    			if (($lname==null) || ($fname==null) || ($mname==null) || ($email==null)) {
                    redirect("Kindly input all fields.", "../view/admin/index.php?users=all");
                }
                else {
                    update_admin_profile($_SESSION['myID'], $lname, $fname, $mname, $email);
                    redirect("Update successful.", "../view/admin/index.php?users=all");
                }
    		}
            else if ($type == 'employee') {
                $lname = mysqli_real_escape_string($con, trim($_POST['elname']));
                $fname = mysqli_real_escape_string($con, trim($_POST['efname']));
                $mname = mysqli_real_escape_string($con, trim($_POST['emname']));
                $email = mysqli_real_escape_string($con, trim($_POST['eemail']));

                if (($lname==null) || ($fname==null) || ($mname==null) || ($email==null)) {
                    redirect("Kindly input all fields.", "../view/employee/index.php");
                }
                else {
                    update_employee_profile($_SESSION['myID'], $lname, $fname, $mname, $email);
                    redirect("Update successful.", "../view/employee/index.php");
                }
            }
            else if ($type == 'user') {
                $lname = mysqli_real_escape_string($con, trim($_POST['lname']));
                $fname = mysqli_real_escape_string($con, trim($_POST['fname']));
                $mname = mysqli_real_escape_string($con, trim($_POST['mname']));
                $bday = mysqli_real_escape_string($con, trim($_POST['bday']));
                $sex = mysqli_real_escape_string($con, trim($_POST['sex']));
                $city = mysqli_real_escape_string($con, trim($_POST['city']));
                $province = mysqli_real_escape_string($con, trim($_POST['province']));
                $email = mysqli_real_escape_string($con, trim($_POST['email']));

                if (($lname == null) || ($fname==null) || ($mname==null) || ($bday==null) || 
                    ($sex==null) || ($city==null) || ($province==null) || ($province==null)) {
                    redirect("Kindly input all fields.", "../view/user/index.php");
                }
                else {
                    update_user_profile($_SESSION['myID'], $lname, $fname, $mname, $bday, $sex, $city, $province, $email);
                    redirect("Update successful.", "../view/user/index.php");                    
                }
            }
    	}
    	else {
    		echo 'ERROR: MORE THAN 1 ACCOUNT FOUND.';
    	}
    }
?> 