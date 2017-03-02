<?php
    require("../model/model.php");
    require('../file_includes/dbconnect.php');

    $myusername = trim($_POST['username']);
    $mypassword = trim($_POST['password']);
    
    $final_pass = md5($mypassword);

    set_accounts_session($myusername, $final_pass);    
    $count = countRow($myusername, $final_pass);

    if ($myusername = null || $mypassword = null) {
        redirect("Kindly input all fields.", "../index.php"); 
    }
    else {
        if($count==1) { 
            //for inactive accounts  
            if($_SESSION['mystatus'] == 'inactive'){
               redirect("Account deactivated", "../index.php"); 
            }
            else {
                if ($_SESSION['myaccType']=='admin') {    
                    //expire = 0 : cookie expires when browser closes                                 
                    if ($_SESSION['mysetQ']==0) {
                        header('location: ../view/secQ.php');
                    }
                    else {
                        $admin_cookie= setcookie('loggedin_admin', date("F jS - g:i a"), 0, "/");
                        if ($admin_cookie) {
                            header ('location: ../view/admin/profile.php');   
                        }
                    }
                }
                else if ($_SESSION['myaccType']=='user') {    
                    //expire = 0 : cookie expires when browser closes                                 
                    if ($_SESSION['mysetQ']==0) {
                        header('location: ../view/secQ.php');
                    }
                    else {
                        $user_cookie= setcookie('loggedin_user', date("F jS - g:i a"), 0, "/");
                        if ($user_cookie) {
                            header ('location: ../view/user/index.php');   
                        }
                    }
                }
                else if ($_SESSION['myaccType']=='employee') {    
                    //expire = 0 : cookie expires when browser closes             
                    if ($_SESSION['mysetQ']==0) {
                        header('location: ../view/secQ.php');
                    }
                    else {
                        $employee_cookie= setcookie('loggedin_employee', date("F jS - g:i a"), 0, "/");
                        if ($employee_cookie) {
                            header ('location: ../view/employee/profile.php');   
                        }
                    }
                }
            }
        }
        else {
            redirect("Incorrect username or password.", "../index.php"); 
        }
    }
    

    

?>