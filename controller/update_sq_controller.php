<?php
	require("../file_includes/dbconnect.php");
    require("../model/model.php");

    if (isset($_POST['update_sq'])) {       
    	$count = accountExists($_SESSION['myID']);

    	if ($count==1) {
    		$type = get_field('accountType', 'wt_accounts', $_SESSION['myID']);
            $curr_pass = get_field('password', 'wt_accounts', $_SESSION['myID']);

            $sq1 = mysqli_real_escape_string($con, trim($_POST['sq1']));
            $a1 = mysqli_real_escape_string($con, trim($_POST['a1']));
            $sq2 = mysqli_real_escape_string($con, trim($_POST['sq2']));
            $a2 = mysqli_real_escape_string($con, trim($_POST['a2']));
            $pass = mysqli_real_escape_string($con, trim($_POST['password']));

    		if ($type == 'admin') {
    			if (($sq1 == null) || ($a1 == null) || ($sq2 == null) || ($a2 == null) || ($pass == null)) {
                    redirect("Kindly input all fields.", "../view/admin/index.php?users=all");
                }
                else if ($curr_pass != md5($_POST['password'])) {
                    redirect("Incorrect password.", "../view/admin/index.php?users=all");
                }
                else {
                    update_sq($_SESSION['myID'], $sq1, $a1, $sq2, $a2);
                    redirect("Update successful.", "../view/admin/index.php?users=all");
                }
    		}
            else if ($type == 'employee') {
                if (($sq1 == null) || ($a1 == null) || ($sq2 == null) || ($a2 == null) || ($pass == null)) {
                    redirect("Kindly input all fields.", "../view/employee/index.php");
                }
                else if ($curr_pass != md5($_POST['password'])) {
                    redirect("Incorrect password.", "../view/employee/index.php");
                }
                else {
                    update_sq($_SESSION['myID'], $sq1, $a1, $sq2, $a2);
                    redirect("Update successful.", "../view/employee/index.php");
                }
            }
            else if ($type == 'user') {
                if (($sq1 == null) || ($a1 == null) || ($sq2 == null) || ($a2 == null) || ($pass == null)) {
                    redirect("Kindly input all fields.", "../view/user/index.php");
                }
                else if ($curr_pass != md5($_POST['password'])) {
                    redirect("Incorrect password.", "../view/user/index.php");
                }
                else {
                    update_sq($_SESSION['myID'], $sq1, $a1, $sq2, $a2);
                    redirect("Update successful.", "../view/user/index.php");
                }
            }
    	}
    	else {
    		echo 'ERROR: MORE THAN 1 ACCOUNT FOUND.';
    	}
    }
    else {
        header("location: ../");
    }
?> 