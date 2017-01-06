<?php
    require("../file_includes/dbconnect.php");
    require("../model/model.php");
    
    if (isset($_POST['deactivate_account'])) {
        try {
            if (!($_POST['atype']== null) && !($_POST['idnum']== null) && !($_POST['lname']== null) &&
                    !($_POST['mname']== null)&& !($_POST['fname']== null) && !($_POST['pass']== null)) {

                $atype = trim($_POST['atype']);
                $idnum = trim($_POST['idnum']);
                $lname = trim($_POST['lname']);
                $fname = trim($_POST['fname']);
                $mname = trim($_POST['mname']);
                $pass = trim($_POST['pass']);

                $hash = md5($pass);
                $curr_pass = get_field('password', 'wt_accounts', $_SESSION['myID']);

                if ($curr_pass == $hash) {
                    $count = account_exists($lname, $fname, $mname, $idnum, $atype);

                    if ($count == 1) {
                        $accountID = get_accountID($lname, $fname, $mname, $idnum, $atype);
                        $status = get_field('status', 'wt_accounts', $accountID);

                        if ($status == 'active') {
                            deactivate_account($accountID);
                            redirect("Account deactivated", "../view/admin/manage_accounts.php?users=all");
                        }
                        else {
                            redirect("Account already deactived.", "../view/admin/manage_accounts.php?users=all");     
                        }
                    }
                    else {
                       redirect("Account does not exist.", "../view/admin/manage_accounts.php?users=all"); 
                    }
                }
                else {
                    redirect("Incorrect Password.", "../view/admin/manage_accounts.php?users=all");
                }                
            }
            else {
                redirect("Kindly input all fields.", "../view/admin/manage_accounts.php?users=all");
            }
        }
        catch (Exception $ex) {
            redirect("Error", "../view/admin/manage_accounts.php?users=all");
        }
    }
?>