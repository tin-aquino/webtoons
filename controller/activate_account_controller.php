<?php
    require("../file_includes/dbconnect.php");
    require("../model/model.php");

    global $con;
    
    if (isset($_POST['activate_account'])) {
        try {
            if (!($_POST['atype']== null) && !($_POST['idnum']== null) && !($_POST['lname']== null) &&
                    !($_POST['mname']== null)&& !($_POST['fname']== null) && !($_POST['pass']== null)) {

                $atype = mysqli_real_escape_string($con, trim($_POST['atype']));
                $idnum = mysqli_real_escape_string($con, trim($_POST['idnum']));
                $lname = mysqli_real_escape_string($con, trim($_POST['lname']));
                $fname = mysqli_real_escape_string($con, trim($_POST['fname']));
                $mname = mysqli_real_escape_string($con, trim($_POST['mname']));
                $pass = mysqli_real_escape_string($con, trim($_POST['pass']));

                $hash = md5($pass);
                $curr_pass = get_field('password', 'wt_accounts', $_SESSION['myID']);

                if ($curr_pass == $hash) {
                    $count = account_exists($lname, $fname, $mname, $idnum, $atype);

                    if ($count == 1) {
                        $accountID = get_accountID($lname, $fname, $mname, $idnum, $atype);
                        $status = get_field('status', 'wt_accounts', $accountID);

                        if ($status == 'inactive') {
                            activate_account($accountID);
                            redirect("Account Activated", "../view/admin/index.php?users=all");
                        }
                        else {
                            redirect("Account already active.", "../view/admin/index.php?users=all");     
                        }
                    }
                    else {
                       redirect("Account does not exist.", "../view/admin/index.php?users=all"); 
                    }
                }
                else {
                    redirect("Incorrect Password.", "../view/admin/index.php?users=all");
                }                
            }
            else {
                redirect("Kindly input all fields.", "../view/admin/index.php?users=all");
            }
        }
        catch (Exception $ex) {
            redirect("Error", "../view/admin/index.php?users=all");
        }
    }
?>