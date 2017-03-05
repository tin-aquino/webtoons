<?php
	require("../file_includes/dbconnect.php");
    require("../model/model.php");

    global $con;

    if (isset($_POST['insert_sq'])) {
        $sq1 = mysqli_real_escape_string($con, trim($_POST['sq1']));
        $a1 = mysqli_real_escape_string($con, trim($_POST['a1']));
        $sq2 = mysqli_real_escape_string($con, trim($_POST['sq2']));
        $a2 = mysqli_real_escape_string($con, trim($_POST['a2']));
        if (!($sq1 == null) || !($a1 == null) || !($sq2 == null) || !($a2 == null)) {
            $count = accountExists($_SESSION['myID']);

            if ($count==1) {
                $type = get_field('accountType', 'wt_accounts', $_SESSION['myID']);

                if ($type=='admin'){
                    insert_sq($sq1, $a1, $sq2, $a2, $_SESSION['myID']);
                    $admin_cookie= setcookie('loggedin_admin', date("F jS - g:i a"), 0, "/");
                    redirect("Set security questions complete!", "../view/admin/index.php");
                }
                else if ($type=='employee') {
                    insert_sq($sq1, $a1, $sq2, $a2, $_SESSION['myID']);
                    $employee_cookie= setcookie('loggedin_employee', date("F jS - g:i a"), 0, "/");
                    redirect("Set security questions complete!", "../view/employee/index.php");
                }
                else {
                    insert_sq($sq1, $a1, $sq2, $a2, $_SESSION['myID']);
                    $user_cookie= setcookie('loggedin_user', date("F jS - g:i a"), 0, "/");
                    redirect("Set security questions complete!", "../view/user/index.php");
                }
            }
            else {
                redirect("More than 1 account found.", "../view/secQ.php");    
            }
        }
        else {
            redirect("Kindly input all fields.", "../view/secQ.php");                
        }           	
    }
    else {
        header("location: ../");
    }
?> 