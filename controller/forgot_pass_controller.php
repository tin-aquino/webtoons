<?php
    require("../file_includes/dbconnect.php");
    require("../model/model.php");  

    global $con;

    if (isset($_POST['forgotpass'])) {
        if (!($_POST['username']==null) && !($_POST['email']==null)) {
            $username = mysqli_real_escape_string($con, trim($_POST['username']));
            $email = mysqli_real_escape_string($con, trim($_POST['email']));
            
            $account = verify_fpass($username, $email);
            if ($account) {
                $fpass_cookie= setcookie('loggedin_fpass', date("F jS - g:i a"), 0, "/");
                redirect("Valid input. Click ok to proceed", "../view/show_secQ.php");
            }
            else {
                redirect("Account does not exist.", "../view/forgot_pass.php");
            }
        }
        else {
            redirect("Kindly input all fields.", "../view/forgot_pass.php");
        }               
    }
    else if (isset($_POST['showsecQ'])) {
        if (!($_POST['a1']==null) && !($_POST['a2']==null)) {
            $a1 = mysqli_real_escape_string($con, trim($_POST['a1']));
            $a2 = mysqli_real_escape_string($con, trim($_POST['a2']));
            
            $secID = get_field('secID', 'wt_secqa', $_SESSION['accountID']);
            $answer = verify_ans($a1, $a2, $secID);
            if ($answer == 'correct') {
                $fpass2_cookie= setcookie('loggedin_fpass2', date("F jS - g:i a"), 0, "/");
                redirect("Correct Answers. Click ok to change password.", "../view/change_password.php");
                echo $answer;
            }
            else {
                redirect("Incorrect Answers.", "../view/show_secQ.php");
            }
        }
        else {
            redirect("Kindly input all fields.", "../view/show_secQ.php");
        }    
    }  
    else if (isset($_POST['change_pass'])) {   
        if (!($_POST['newpass1']==null) && !($_POST['newpass2']==null)) {
            $newpass1 = mysqli_real_escape_string($con, $_POST['newpass1']);
            $newpass2 = mysqli_real_escape_string($con, $_POST['newpass2']);
            
            $count = accountExists($_SESSION['accountID']);

            if ($count==1) {
                if (strcmp($newpass1, $newpass2)==0) {
                    $type = get_field('accountType', 'wt_accounts', $_SESSION['accountID']);
                    update_password($_SESSION['accountID'], $type);
                    redirect("Password successfully changed.", "../");    
                }
                else {
                    redirect("Passwords don't match.", "../view/change_password.php");    
                }
            }
            else {
                redirect("More than 1 account found.", "../view/change_password.php");
            }
        }   
        else {
            redirect("Kindly input all fields.", "../view/change_password.php");
        } 
    }
?>