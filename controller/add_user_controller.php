<?php
    require("../file_includes/dbconnect.php");
    require("../model/model.php");
    
    if (isset($_POST['register']) && isset($_POST['g-recaptcha-response'])) {        
        try {
            if (!($_POST['lname']== null) && !($_POST['fname']== null) && !($_POST['mname']== null) &&
                !($_POST['bday']== null) && !($_POST['sex']== null) && !($_POST['city']== null) &&
                !($_POST['province']== null) && !($_POST['email']== null) && !($_POST['username']== null) && !($_POST['password']== null) && !($_POST['g-recaptcha-response']== null)) {
                
                //user table
                $lname = trim($_POST['lname']);
                $fname = trim($_POST['fname']);
                $mname = trim($_POST['mname']);
                $bday = trim($_POST['bday']);
                $sex = trim($_POST['sex']);
                $city = trim($_POST['city']);
                $province = trim($_POST['province']);
                $email = trim($_POST['email']);
                
                //accounts table
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);
                $atype = 'user';
                $status = 'active';
                $setQ = 0;                

                //password encryption: md5
                $hash = md5($password);

                //captcha
                $secret = "6Lf57hAUAAAAAE1KMAzrhCCvcuFBeTgHmffJ_37C";
                $ip = $_SERVER['REMOTE_ADDR'];
                $captcha = $_POST['g-recaptcha-response'];
                $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
                $arr = json_decode($rsp, TRUE);

                if ($arr['success']) {
                    //idnum(admin/employee) equivalent to username(user)
                    $check_username = idnum_exists($username);                
                
                    if ($check_username == false) {                       
                        $ia = insert_accounts($username, $hash, $atype, $status, $setQ);
                        if($ia){
                            global $con;                        
                            $addidNum = mysqli_insert_id($con);

                            $iu = insert_user($addidNum, $lname, $fname, $mname, $bday, $sex, $city, $province, $email);

                            if ($iu) {
                                redirect("You have successfully registered!", "../");
                            }                                                       
                        }
                        else {
                            redirect("Error encountered in wt_accounts table.", "../");
                        }                                      
                    }
                    else {                    
                        redirect("Username already exists.", "../");
                    }
                }
                else {
                    echo 'captcha error';
                }                            
            }        
            else {
                redirect("Kindly input all fields.", "../");
            }               
        } 
        catch (Exception $ex) {
            redirect("Error", "../");
        }
    }

?>