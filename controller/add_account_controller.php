<?php
    require("../file_includes/dbconnect.php");
    require("../model/model.php");
    
    if (isset($_POST['add_account'])) {        
        try {
            if (!($_POST['addidnum']== null) && !($_POST['addlname']== null) && !($_POST['addfname']== null) &&
                    !($_POST['addmname']== null)&& !($_POST['addemail']== null) && !($_POST['addatype']== null)) {
                
                //admin/employee table
                $id = trim($_POST['addidnum']);
                $lname = trim($_POST['addlname']);
                $fname = trim($_POST['addfname']);
                $mname = trim($_POST['addmname']);                
                $email = trim($_POST['addemail']);
                
                //accounts table
                $uname = trim($_POST['addidnum']);
                $pass = trim($_POST['addidnum'])+"dswdsoctech";                
                $acctype = trim($_POST['addatype']);
                $status = 'yes';
                $setQ = 0; 

                //password encryption: md5
                $hash = md5($pass);
                
                $check_id = idnum_exists($id);                
                
                if ($check_id == false) {                       
                    $ia = insert_accounts($uname, $hash, $acctype, $status, $setQ);
                    if($ia){
                        global $con;
                        $addidNum = mysqli_insert_id($con);

                        if($acctype == 'admin'){
                            $iad = insert_admin($addidNum, $id, $lname, $fname, $mname, $email);
                            if($iad){
                                redirect("Admin account successfully added!", "../view/admin/manage_accounts.php?users=all");
                            }                                
                        }
                        else if($acctype == 'employee'){
                            $is = insert_employee($addidNum, $id, $lname, $fname, $mname, $email);
                            if($is){
                                redirect("Employee account successfully added!", "../view/admin/manage_accounts.php?users=all");
                            }                                
                        }                        
                        else{
                            redirect("Account type not recognized.", "../view/admin/manage_accounts.php?users=all");
                        }                                    
                    }
                    else {
                        redirect("Error encountered in wt_accounts table.", "../view/admin/manage_accounts.php?users=all");
                    }                                      
                }
                else {                    
                    redirect("Account already exists.", "../view/admin/manage_accounts.php?users=all");
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