<?php
	require("../file_includes/dbconnect.php");
    require("../model/model.php");

    if (isset($_POST['update_account'])) {       
    	$count = accountExists($_SESSION['myID']);

    	if ($count==1) {
    		$type = get_field('accountType', 'wt_accounts', $_SESSION['myID']);

    		if ($type == 'admin') {
                $lname = trim($_POST['alname']);
                $fname = trim($_POST['afname']);
                $mname = trim($_POST['amname']);
                $email = trim($_POST['aemail']);

    			if (($lname==null) || ($fname==null) || ($mname==null) || ($email==null)) {
                    redirect("Kindly input all fields.", "../view/admin/profile.php");
                }
                else {
                    update_admin_profile($_SESSION['myID'], $lname, $fname, $mname, $email);
                    redirect("Update successful.", "../view/admin/profile.php");
                }
    		}
            else if ($type == 'employee') {
                $lname = trim($_POST['elname']);
                $fname = trim($_POST['efname']);
                $mname = trim($_POST['emname']);
                $email = trim($_POST['eemail']);

                if (($lname==null) || ($fname==null) || ($mname==null) || ($email==null)) {
                    redirect("Kindly input all fields.", "../view/employee/profile.php");
                }
                else {
                    update_employee_profile($_SESSION['myID'], $lname, $fname, $mname, $email);
                    redirect("Update successful.", "../view/employee/profile.php");
                }
            }
            else if ($type == 'user') {
                $lname = trim($_POST['lname']);
                $fname = trim($_POST['fname']);
                $mname = trim($_POST['mname']);
                $bday = trim($_POST['bday']);
                $sex = trim($_POST['sex']);
                $city = trim($_POST['city']);
                $province = trim($_POST['province']);
                $email = trim($_POST['email']);

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