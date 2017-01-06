<?php
	require("../file_includes/dbconnect.php");
    require("../model/model.php");

    if (isset($_POST['change_pass'])) {       
    	$count = accountExists($_SESSION['myID']);

    	if ($count==1) {
    		$type = get_field('accountType', 'wt_accounts', $_SESSION['myID']);
            $curr_pass = get_field('password', 'wt_accounts', $_SESSION['myID']);

    		if ($type == 'admin') {
    			if (($_POST['oldpass'] == null) || ($_POST['newpass1']==null) || ($_POST['newpass2']==null)) {
                    redirect("Kindly input all fields.", "../view/admin/profile.php");
                }
                else if ($curr_pass != md5($_POST['oldpass'])) {
                    redirect("Incorrect password.", "../view/admin/profile.php");
                }
                elseif (strcmp ($_POST['newpass1'], $_POST['newpass2'])) {
                    redirect("Passwords don't match.", "../view/admin/profile.php");
                }
                else {
                    update_password($_SESSION['myID'], $type);
                    redirect("Password successfully changed.", "../view/admin/profile.php");
                }
    		}
            else if ($type == 'employee') {
                if (($_POST['oldpass'] == null) || ($_POST['newpass1']==null) || ($_POST['newpass2']==null)) {
                    redirect("Kindly input all fields.", "../view/employee/profile.php");
                }
                else if ($curr_pass != md5($_POST['oldpass'])) {
                    redirect("Incorrect password.", "../view/employee/profile.php");
                }
                elseif (strcmp ($_POST['newpass1'], $_POST['newpass2'])) {
                    redirect("Passwords don't match.", "../view/employee/profile.php");
                }
                else {
                    update_password($_SESSION['myID'], $type);
                    redirect("Password successfully changed.", "../view/employee/profile.php");
                }
            }
            else if ($type == 'user') {
                if (($_POST['oldpass'] == null) || ($_POST['newpass1']==null) || ($_POST['newpass2']==null)) {
                    redirect("Kindly input all fields.", "../view/user/profile.php");
                }
                else if ($curr_pass != md5($_POST['oldpass'])) {
                    redirect("Incorrect password.", "../view/user/profile.php");
                }
                elseif (strcmp ($_POST['newpass1'], $_POST['newpass2'])) {
                    redirect("Passwords don't match.", "../view/user/profile.php");
                }
                else {
                    update_password($_SESSION['myID'], $type);
                    redirect("Password successfully changed.", "../view/user/profile.php");
                }
            }
    	}
    	else {
    		echo 'ERROR: MORE THAN 1 ACCOUNT FOUND.';
    	}
    }
?> 