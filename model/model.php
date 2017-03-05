<?php
    session_start();

    //accounts session
    function set_accounts_session($myusername, $final_pass) {
    	global $con; 

        $query = "SELECT * FROM wt_accounts WHERE username='$myusername' and password='$final_pass'" ;
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);  

		if (!$result) {
				die("db error " . mysqli_error($con));
		}

        $_SESSION['myID'] = $row['accountID'];
        $_SESSION['myusername'] = $row['username'];
        $_SESSION['mypassword'] = $row['password'];
        $_SESSION['myaccType'] = $row['accountType'];
        $_SESSION['mystatus'] = $row['status'];
        $_SESSION['mysetQ'] = $row['setQ'];
    }

    //admin session    
    function set_admin_session($idNum) {
        global $con; 

        $query ="SELECT * FROM wt_admin where accountID = '$idNum'";
        $result = mysqli_query($con, $query);
        $admin = mysqli_fetch_array($result);  

        if (!$result) {
                die("db error " . mysqli_error($con));
        } 

        $_SESSION['adminID'] = $admin['adminID'];
        $_SESSION['accountID'] = $admin['accountID'];
        $_SESSION['idnum'] = $admin['idnum'];
        $_SESSION['firstName'] = $admin['fname'];
        $_SESSION['lastName'] = $admin['lname'];
        $_SESSION['middleName'] = $admin['mname'];
        $_SESSION['email'] = $admin['email'];
        
    }

    //admin session    
    function set_employee_session($idNum) {
        global $con; 

        $query ="SELECT * FROM wt_employee where accountID = '$idNum'";
        $result = mysqli_query($con, $query);
        $employee = mysqli_fetch_array($result);  

        if (!$result) {
                die("db error " . mysqli_error($con));
        } 

        $_SESSION['employeeID'] = $employee['employeeID'];
        $_SESSION['accountID'] = $employee['accountID'];
        $_SESSION['idnum'] = $employee['idnum'];
        $_SESSION['firstName'] = $employee['fname'];
        $_SESSION['lastName'] = $employee['lname'];
        $_SESSION['middleName'] = $employee['mname'];
        $_SESSION['email'] = $employee['email'];
        
    }

    //admin session    
    function set_user_session($idNum) {
        global $con; 

        $query ="SELECT * FROM wt_user where accountID = '$idNum'";
        $result = mysqli_query($con, $query);
        $user = mysqli_fetch_array($result);  

        if (!$result) {
                die("db error " . mysqli_error($con));
        } 

        $_SESSION['userID'] = $user['userID'];
        $_SESSION['accountID'] = $user['accountID'];        
        $_SESSION['firstName'] = $user['fname'];
        $_SESSION['lastName'] = $user['lname'];
        $_SESSION['middleName'] = $user['mname'];
        $_SESSION['birthday'] = $user['birthday'];
        $_SESSION['city'] = $user['city'];
        $_SESSION['province'] = $user['province'];
        $_SESSION['sex'] = $user['sex'];
        $_SESSION['email'] = $user['email'];
        
    }

    //row count
    function countRow($myusername, $final_pass) {
    	global $con; 

        $query = "SELECT * FROM wt_accounts WHERE username='$myusername' and password='$final_pass'" ;
		$result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);        
        
        if ($result){
            return $count;
        }
    }    

    //alert + redirect 
    function redirect($mes, $link) {
        echo "<script type='text/javascript'>alert(\"$mes\");"
                . "window.location.href='$link';</script>";          
    }

    //get single field from table
    function get_field($field, $table, $id) { 
        global $con;

        $query = "SELECT * FROM ".$table." WHERE accountID =".$id."" ;
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);  

        if (!$result) {
            die("db error " . mysqli_error($con));
        }

        //echo $row["'".$field."'"];
        return $row["".$field.""];
    }

    //account row count 
    function accountExists($idNum) {
        global $con; 

        $query = "SELECT * FROM wt_accounts WHERE accountID = '$idNum'" ;
        $result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);        
        
        if ($result){
            return $count;
        }
    }

    //update admin profile
    function update_admin_profile($idNum, $lname, $fname, $mname, $email) {
        global $con; 

        $query_lname = "UPDATE wt_admin SET lname='$lname' WHERE accountID = '$idNum'" ;
        $query_fname = "UPDATE wt_admin SET fname='$fname' WHERE accountID = '$idNum'" ;
        $query_mname = "UPDATE wt_admin SET mname='$mname' WHERE accountID = '$idNum'" ;
        $query_email = "UPDATE wt_admin SET email='$email' WHERE accountID = '$idNum'" ;

        $result_lname = mysqli_query($con, $query_lname);
        $result_fname = mysqli_query($con, $query_fname);
        $result_mname = mysqli_query($con, $query_mname);
        $result_email = mysqli_query($con, $query_email);       
    }    

    //update employee profile
    function update_employee_profile($idNum, $lname, $fname, $mname, $email) {
        global $con; 

        $query_lname = "UPDATE wt_employee SET lname='$lname' WHERE accountID = '$idNum'" ;
        $query_fname = "UPDATE wt_employee SET fname='$fname' WHERE accountID = '$idNum'" ;
        $query_mname = "UPDATE wt_employee SET mname='$mname' WHERE accountID = '$idNum'" ;
        $query_email = "UPDATE wt_employee SET email='$email' WHERE accountID = '$idNum'" ;

        $result_lname = mysqli_query($con, $query_lname);
        $result_fname = mysqli_query($con, $query_fname);
        $result_mname = mysqli_query($con, $query_mname);
        $result_email = mysqli_query($con, $query_email);       
    }    

    //update user profile
    function update_user_profile($idNum, $lname, $fname, $mname, $bday, $sex, $city, $province, $email) {
        global $con; 

        $query_lname = "UPDATE wt_user SET lname='$lname' WHERE accountID = '$idNum'" ;
        $query_fname = "UPDATE wt_user SET fname='$fname' WHERE accountID = '$idNum'" ;
        $query_mname = "UPDATE wt_user SET mname='$mname' WHERE accountID = '$idNum'" ;
        $query_bday = "UPDATE wt_user SET birthday='$bday' WHERE accountID = '$idNum'" ;
        $query_sex = "UPDATE wt_user SET sex='$sex' WHERE accountID = '$idNum'" ;
        $query_city = "UPDATE wt_user SET city='$city' WHERE accountID = '$idNum'" ;
        $query_province = "UPDATE wt_user SET province='$province' WHERE accountID = '$idNum'" ;
        $query_email = "UPDATE wt_user SET email='$email' WHERE accountID = '$idNum'" ;

        $result_lname = mysqli_query($con, $query_lname);
        $result_fname = mysqli_query($con, $query_fname);
        $result_mname = mysqli_query($con, $query_mname);
        $result_bday = mysqli_query($con, $query_bday);
        $result_sex = mysqli_query($con, $query_sex);
        $result_city = mysqli_query($con, $query_city);
        $result_province = mysqli_query($con, $query_province);
        $result_email = mysqli_query($con, $query_email);       
    }    

    //get security questions 1-5, sec1 selected shown
    function get_secQ1($idNum) {
        global $con;

        //get selected sq1 questionID
        $query = "SELECT * FROM wt_secqa WHERE accountID = '$idNum'" ;
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);          
        $selected_q1 = $row['q1'];

        //get selected sq1 question
        $query_question = "SELECT * FROM wt_sqlist WHERE questionID = '$selected_q1'";
        $result_question = mysqli_query($con, $query_question);
        $row_question = mysqli_fetch_array($result_question);
        $selected_q1_question = $row_question['question'];

        echo "<option value='".$selected_q1."' selected='selected'>".$selected_q1_question."</option>";

        //get all questions except selected
        $query_all = "SELECT * FROM wt_sqlist WHERE questionID < 6 AND questionID <> '$selected_q1'";
        $result_all = mysqli_query($con, $query_all);

        while ($row_all = mysqli_fetch_array($result_all)) {
            $q_id = $row_all['questionID'];
            $question = $row_all['question'];

            echo "<option value='".$q_id."'>".$question."</option>";
        }
        
    }

    //get security questions 6-19, sec2 selected shown
    function get_secQ2($idNum) {
        global $con;

        //get selected sq1 questionID
        $query = "SELECT * FROM wt_secqa WHERE accountID = '$idNum'" ;
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);          
        $selected_q2 = $row['q2'];

        //get selected sq1 question
        $query_question = "SELECT * FROM wt_sqlist WHERE questionID = '$selected_q2'";
        $result_question = mysqli_query($con, $query_question);
        $row_question = mysqli_fetch_array($result_question);
        $selected_q2_question = $row_question['question'];

        echo "<option value='".$selected_q2."' selected='selected'>".$selected_q2_question."</option>";

        //get all questions except selected
        $query_all = "SELECT * FROM wt_sqlist WHERE questionID > 5 AND questionID <> '$selected_q2'";
        $result_all = mysqli_query($con, $query_all);

        while ($row_all = mysqli_fetch_array($result_all)) {
            $q_id = $row_all['questionID'];
            $question = $row_all['question'];

            echo "<option value='".$q_id."'>".$question."</option>";
        }
        
    }

    //update security questions
    function update_sq($idNum, $sq1, $a1, $sq2, $a2) {
        global $con; 

        $query_q1 = "UPDATE wt_secqa SET q1 = '$sq1' WHERE accountID = '$idNum'";
        $query_q2 = "UPDATE wt_secqa SET q2 = '$sq2' WHERE accountID = '$idNum'";
        $query_a1 = "UPDATE wt_secqa SET a1 = '$a1' WHERE accountID = '$idNum'";
        $query_a2 = "UPDATE wt_secqa SET a2 = '$a2' WHERE accountID = '$idNum'";
                    
        $result_q1 = mysqli_query($con, $query_q1);
        $result_q2 = mysqli_query($con, $query_q2);
        $result_a1 = mysqli_query($con, $query_a1);
        $result_a2 = mysqli_query($con, $query_a2);
    }

    //update password
    function update_password($idNum, $type) {
        global $con; 

        $newpass = md5($_POST['newpass1']);
        $query_pass = "UPDATE wt_accounts SET password = '$newpass' WHERE accountID = '$idNum' AND accountType = '$type'";
        $result_pass = mysqli_query($con, $query_pass);        
    }

    //get user sex
    function get_sex($idNum) {
        global $con;

        $query = "SELECT * FROM wt_user WHERE accountID = '$idNum'" ;
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);          
        $sex = $row['sex'];

        if ($sex == 'M') {            
            echo "<input type='radio' name='sex' value='M' checked='checked'> Male 
                    <input type='radio' name='sex' value='F'> Female";
        }
        else {
            echo "<input type='radio' name='sex' value='M' > Male 
                    <input type='radio' name='sex' value='F' checked='checked'> Female";
        }
    }

    //get user city
    function get_city($idNum) {
        global $con;

        $query = "SELECT * FROM wt_user WHERE accountID = '$idNum'" ;
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);          
        $city = $row['city'];

        echo "<option value='".$city."' selected='selected'>".$city."</option>";
    }

    function citylist() {
        echo "<option value='Alaminos'>Alaminos</option>
            <option value='Angeles'>Angeles</option>
            <option value='Antipolo'>Antipolo</option>
            <option value='Bacolod'>Bacolod</option>
            <option value='Bacoor'>Bacoor</option>
            <option value='Bago'>Bago</option>
            <option value='Baguio'>Baguio</option>
            <option value='Bais'>Bais</option>
            <option value='Balanga'>Balanga</option>
            <option value='Batac'>Batac</option>
            <option value='Batangas City'>Batangas City</option>
            <option value='Bayawan'>Bayawan</option>
            <option value='Baybay'>Baybay</option>
            <option value='Bayugan'>Bayugan</option>
            <option value='Biñan'>Biñan</option>
            <option value='Bislig'>Bislig</option>
            <option value='Bogo'>Bogo</option>
            <option value='Borongan'>Borongan</option>
            <option value='Butuan'>Butuan</option>
            <option value='Cabadbaran'>Cabadbaran</option>
            <option value='Cabanatuan'>Cabanatuan</option>
            <option value='Cabuyao'>Cabuyao</option>
            <option value='Cadiz'>Cadiz</option>
            <option value='Cagayan de Oro'>Cagayan de Oro</option>
            <option value='Calamba'>Calamba</option>
            <option value='Calapan Oriental'>Calapan Oriental</option>
            <option value='Calbayog'>Calbayog</option>
            <option value='Caloocan'>Caloocan</option>
            <option value='Candon'>Candon</option>
            <option value='Canlaon'>Canlaon</option>
            <option value='Carcar'>Carcar</option>
            <option value='Catbalogan'>Catbalogan</option>
            <option value='Cauayan'>Cauayan</option>
            <option value='Cavite City'>Cavite City</option>
            <option value='Cebu City'>Cebu City</option>
            <option value='Cotabato City'>Cotabato City</option>
            <option value='Dagupan'>Dagupan</option>
            <option value='Danao'>Danao</option>
            <option value='Dapitan'>Dapitan</option>
            <option value='Dasmariñas'>Dasmariñas</option>
            <option value='Davao City'>Davao City</option>
            <option value='Digos'>Digos</option>
            <option value='Dipolog'>Dipolog</option>
            <option value='Dumaguete'>Dumaguete</option>
            <option value='El Salvador'>El Salvador</option>
            <option value='Escalante'>Escalante</option>
            <option value='Gapan'>Gapan</option>
            <option value='General Santos'>General Santos</option>
            <option value='Gingoog'>Gingoog</option>
            <option value='Guihulngan'>Guihulngan</option>
            <option value='Himamaylan'>Himamaylan</option>
            <option value='Ilagan'>Ilagan</option>
            <option value='Iligan'>Iligan</option>
            <option value='Iloilo City'>Iloilo City</option>
            <option value='Imus'>Imus</option>
            <option value='Iriga'>Iriga</option>
            <option value='Isabela'>Isabela</option>
            <option value='Kabankalan'>Kabankalan</option>
            <option value='Kidapawan'>Kidapawan</option>
            <option value='Koronadal'>Koronadal</option>
            <option value='La Carlota'>La Carlota</option>
            <option value='Lamitan'>Lamitan</option>
            <option value='Laoag'>Laoag</option>
            <option value='Lapu-Lapu'>Lapu-Lapu</option>
            <option value='Las Piñas'>Las Piñas</option>
            <option value='Legazpi'>Legazpi</option>
            <option value='Ligao'>Ligao</option>
            <option value='Lipa'>Lipa</option>
            <option value='Lucena'>Lucena</option>
            <option value='Maasin'>Maasin</option>
            <option value='Mabalacat '>Mabalacat </option>
            <option value='Makati '>Makati </option>
            <option value='Malabon'>Malabon</option>
            <option value='Malaybalay'>Malaybalay</option>
            <option value='Malolos'>Malolos</option>
            <option value='Mandaluyong'>Mandaluyong</option>
            <option value='Mandaue'>Mandaue</option>
            <option value='Manila'>Manila</option>
            <option value='Marawi'>Marawi</option>
            <option value='Marikina'>Marikina</option>
            <option value='Masbate City'>Masbate City</option>
            <option value='Mati'>Mati</option>
            <option value='Meycauayan'>Meycauayan</option>
            <option value='Muñoz'>Muñoz</option>
            <option value='Muntinlupa'>Muntinlupa</option>
            <option value='Naga'>Naga</option>
            <option value='Naga'>Naga</option>
            <option value='Navotas'>Navotas</option>
            <option value='Olongapo'>Olongapo</option>
            <option value='Ormoc'>Ormoc</option>
            <option value='Oroquieta'>Oroquieta</option>
            <option value='Ozamiz'>Ozamiz</option>
            <option value='Pagadian'>Pagadian</option>
            <option value='Palayan'>Palayan</option>
            <option value='Panabo'>Panabo</option>
            <option value='Parañaque'>Parañaque</option>
            <option value='Pasay'>Pasay</option>
            <option value='Pasig '>Pasig </option>
            <option value='Passi'>Passi</option>
            <option value='Puerto Princesa'>Puerto Princesa</option>
            <option value='Quezon City'>Quezon City</option>
            <option value='Roxas'>Roxas</option>
            <option value='Sagay'>Sagay</option>
            <option value='Samal'>Samal</option>
            <option value='San Carlos'>San Carlos</option>
            <option value='San Carlos'>San Carlos</option>
            <option value='San Fernando'>San Fernando</option>
            <option value='San Fernando'>San Fernando</option>
            <option value='San Jose del Monte'>San Jose del Monte</option>
            <option value='San Jose'>San Jose</option>
            <option value='San Juan'>San Juan</option>
            <option value='San Pablo'>San Pablo</option>
            <option value='San Pedro'>San Pedro</option>
            <option value='Santa Rosa'>Santa Rosa</option>
            <option value='Santiago'>Santiago</option>
            <option value='Silay'>Silay</option>
            <option value='Sipalay'>Sipalay</option>
            <option value='Sorsogon City'>Sorsogon City</option>
            <option value='Surigao City'>Surigao City</option>
            <option value='Tabaco'>Tabaco</option>
            <option value='Tabuk'>Tabuk</option>
            <option value='Tacloban'>Tacloban</option>
            <option value='Tacurong'>Tacurong</option>
            <option value='Tagaytay'>Tagaytay</option>
            <option value='Tagbilaran'>Tagbilaran</option>
            <option value='Taguig'>Taguig</option>
            <option value='Tagum'>Tagum</option>
            <option value='Talisay'>Talisay</option>
            <option value='Talisay'>Talisay</option>
            <option value='Tanauan'>Tanauan</option>
            <option value='Tandag'>Tandag</option>
            <option value='Tangub'>Tangub</option>
            <option value='Tanjay'>Tanjay</option>
            <option value='Tarlac City'>Tarlac City</option>
            <option value='Tayabas'>Tayabas</option>
            <option value='Toledo'>Toledo</option>
            <option value='Trece Martires'>Trece Martires</option>
            <option value='Tuguegarao'>Tuguegarao</option>
            <option value='Urdaneta'>Urdaneta</option>
            <option value='Valencia'>Valencia</option>
            <option value='Valenzuela'>Valenzuela</option>
            <option value='Victorias'>Victorias</option>
            <option value='Vigan'>Vigan</option>
            <option value='Zamboanga City'>Zamboanga City</option>";
    }

    //get user province
    function get_province($idNum) {
        global $con;
        
        $query = "SELECT * FROM wt_user WHERE accountID = '$idNum'" ;
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);          
        $province = $row['province'];

        echo "<option value='".$province."' selected='selected'>".$province."</option>";
    }

    function provincelist() {
        echo "<option value='Abra'>Abra</option>
            <option value='Agusan del Norte'>Agusan del Norte</option>
            <option value='Agusan del Sur'>Agusan del Sur</option>
            <option value='Aklan'>Aklan</option>
            <option value='Albay'>Albay</option>
            <option value='Antique'>Antique</option>
            <option value='Apayao'>Apayao</option>
            <option value='Aurora'>Aurora</option>
            <option value='Basilan'>Basilan</option>
            <option value='Bataan'>Bataan</option>
            <option value='Batanes'>Batanes</option>
            <option value='Batangas'>Batangas</option>
            <option value='Benguet'>Benguet</option>
            <option value='Biliran'>Biliran</option>
            <option value='Bohol'>Bohol</option>
            <option value='Bukidnon'>Bukidnon</option>
            <option value='Bulacan'>Bulacan</option>
            <option value='Cagayan'>Cagayan</option>
            <option value='Camarines Norte'>Camarines Norte</option>
            <option value='Camarines Sur'>Camarines Sur</option>
            <option value='Camiguin'>Camiguin</option>
            <option value='Capiz'>Capiz</option>
            <option value='Catanduanes'>Catanduanes</option>
            <option value='Cavite'>Cavite</option>
            <option value='Cebu'>Cebu</option>
            <option value='Compostela Valley'>Compostela Valley</option>
            <option value='Cotabato'>Cotabato</option>
            <option value='Davao del Norte'>Davao del Norte</option>
            <option value='Davao del Sur'>Davao del Sur</option>
            <option value='Davao Occidental'>Davao Occidental</option>
            <option value='Davao Oriental'>Davao Oriental</option>
            <option value='Dinagat Islands'>Dinagat Islands</option>
            <option value='Eastern Samar'>Eastern Samar</option>
            <option value='Guimaras'>Guimaras</option>
            <option value='Ifugao'>Ifugao</option>
            <option value='Ilocos Norte'>Ilocos Norte</option>
            <option value='Ilocos Sur'>Ilocos Sur</option>
            <option value='Iloilo'>Iloilo</option>
            <option value='Isabela'>Isabela</option>
            <option value='Kalinga'>Kalinga</option>
            <option value='La Union'>La Union</option>
            <option value='Laguna'>Laguna</option>
            <option value='Lanao del Norte'>Lanao del Norte</option>
            <option value='Lanao del Sur'>Lanao del Sur</option>
            <option value='Leyte'>Leyte</option>
            <option value='Maguindanao'>Maguindanao</option>
            <option value='Marinduque'>Marinduque</option>
            <option value='Masbate'>Masbate</option>
            <option value='Metro Manila'>Metro Manila</option>
            <option value='Mindoro Occidental'>Mindoro Occidental</option>
            <option value='Mindoro Oriental'>Mindoro Oriental</option>
            <option value='Misamis Occidental'>Misamis Occidental</option>
            <option value='Misamis Oriental'>Misamis Oriental</option>
            <option value='Mountain Province'>Mountain Province</option>
            <option value='Negros Occidental'>Negros Occidental</option>
            <option value='Negros Oriental'>Negros Oriental</option>
            <option value='Northern Samar'>Northern Samar</option>
            <option value='Nueva Ecija'>Nueva Ecija</option>
            <option value='Nueva Vizcaya'>Nueva Vizcaya</option>
            <option value='Palawan'>Palawan</option>
            <option value='Pampanga'>Pampanga</option>
            <option value='Pangasinan'>Pangasinan</option>
            <option value='Quezon Province'>Quezon Province</option>
            <option value='Quirino'>Quirino</option>
            <option value='Rizal'>Rizal</option>
            <option value='Romblon'>Romblon</option>
            <option value='Samar'>Samar</option>
            <option value='Sarangani'>Sarangani</option>
            <option value='Siquijor'>Siquijor</option>
            <option value='Sorsogon'>Sorsogon</option>
            <option value='South Cotabato'>South Cotabato</option>
            <option value='Southern Leyte'>Southern Leyte</option>
            <option value='Sultan Kudarat'>Sultan Kudarat</option>
            <option value='Sulu'>Sulu</option>
            <option value='Surigao del Norte'>Surigao del Norte</option>
            <option value='Surigao del Sur'>Surigao del Sur</option>
            <option value='Tarlac'>Tarlac</option>
            <option value='Tawi-Tawi'>Tawi-Tawi</option>
            <option value='Zambales'>Zambales</option>
            <option value='Zamboanga del Norte'>Zamboanga del Norte</option>
            <option value='Zamboanga del Sur'>Zamboanga del Sur</option>
            <option value='Zamboanga Sibugay'>Zamboanga Sibugay</option>";
    }

    //list security questions 1-5
    function secQlist1() {
        global $con;

        $query_all = "SELECT * FROM wt_sqlist WHERE questionID < 6";
        $result_all = mysqli_query($con, $query_all);        

        while ($row_all = mysqli_fetch_array($result_all)) {
            $q_id = $row_all['questionID'];
            $question = $row_all['question'];

            echo "<option value='".$q_id."'>".$question."</option>";
        }
        
    }

    //list security questions 6-10
    function secQlist2() {
        global $con;

        $query_all = "SELECT * FROM wt_sqlist WHERE questionID > 5 ";
        $result_all = mysqli_query($con, $query_all);

        while ($row_all = mysqli_fetch_array($result_all)) {
            $q_id = $row_all['questionID'];
            $question = $row_all['question'];

            echo "<option value='".$q_id."'>".$question."</option>";
        }
        
    }

    //insert security question
    function insert_sq($sq1, $a1, $sq2, $a2, $idNum) {
        global $con;

        $query_sq = "INSERT wt_secqa(accountID, q1, a1, q2, a2)".
                    "VALUES($idNum, '$sq1', '$a1', '$sq2', '$a2')";
        $result_sq = mysqli_query($con, $query_sq);

        if ($result_sq) {
            $query_setQ = "UPDATE wt_accounts SET setQ = 1 WHERE accountID = '$idNum'";
            $result_setQ = mysqli_query($con, $query_setQ);
        }
    }

    //check if user already exists
    function idnum_exists($idNum) {
        global $con;

        $query = "SELECT * FROM wt_accounts WHERE username ='".$idNum."'";

        if ($result = mysqli_query($con, $query)) {
            $count = mysqli_num_rows($result);  
            if($count > 0) {
                return true;                
            }
            else {
                return false;
            }
        }
        else {
            echo mysqli_error($con);
        }    
    }

    //insert accounts table
    function insert_accounts($uname, $pass, $acctpye, $status, $setQ) {
        global $con;

        $query= "INSERT wt_accounts(username, password, accountType, status, setQ)".
                    "VALUES('$uname', '$pass', '$acctpye', '$status', $setQ)";
        $result = mysqli_query($con, $query);

        if ($result) {
            return true;
        }
        else {
            echo mysqli_error($con);
        }
    }

    //insert admin table
    function insert_admin($accountID, $idnum, $lname, $fname, $mname, $email) {
        global $con;

        $query= "INSERT wt_admin(accountID, idnum, lname, fname, mname, email)".
                    "VALUES('$accountID', '$idnum', '$lname', '$fname', '$mname', '$email')";
        $result = mysqli_query($con, $query);

        if ($result) {
            return true;
        }
        else {
            echo mysqli_error($con);
        }
    }

    //insert employee table
    function insert_employee($accountID, $idnum, $lname, $fname, $mname, $email) {
        global $con;

        $query= "INSERT wt_employee(accountID, idnum, lname, fname, mname, email)".
                    "VALUES('$accountID', '$idnum', '$lname', '$fname', '$mname', '$email')";
        $result = mysqli_query($con, $query);

        if ($result) {
            return true;
        }
        else {
            echo mysqli_error($con);
        }
    }

    //insert user table
    function insert_user($accountID, $lname, $fname, $mname, $bday, $sex, $city, $province, $email) {
        global $con;

        $query= "INSERT wt_user(accountID, lname, fname, mname, birthday, sex, city, province, email)".
                    "VALUES('$accountID', '$lname', '$fname', '$mname', '$bday', '$sex', '$city', '$province','$email')";
        $result = mysqli_query($con, $query);

        if ($result) {
            return true;
        }
        else {
            echo mysqli_error($con);
        }
    }

    //check if account exists
    function account_exists($lname, $fname, $mname, $idnum, $atype) {
        global $con;
        
        if ($atype == 'admin') {
            $query = "SELECT * FROM wt_admin WHERE lname='$lname' AND fname='$fname'  AND mname='$mname' AND idnum='$idnum'";
            $result = mysqli_query($con, $query);
            $count = mysqli_num_rows($result);

            if ($result) {
                return $count;
            }
            else {
                echo mysqli_error($con);
            }
        }
        else if ($atype == 'employee') {
            $query = "SELECT * FROM wt_employee WHERE lname='$lname' AND fname='$fname'  AND mname='$mname' AND idnum='$idnum'";
            $result = mysqli_query($con, $query);
            $count = mysqli_num_rows($result);

            if ($result) {
                return $count;
            }
            else {
                echo mysqli_error($con);
            }
        }
    }

    //get accountID (to activate or deactivate)
    function get_accountID($lname, $fname, $mname, $idnum, $atype) {
        global $con;

        if($atype == 'admin'){
            $query = "SELECT * FROM wt_admin WHERE lname='$lname' AND fname='$fname'  AND mname='$mname' AND idnum='$idnum'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_array($result);

            if ($row) {
                return $row['accountID'];
            }            
        }
        else if($atype == 'employee'){
            $query = "SELECT * FROM wt_employee WHERE lname='$lname' AND fname='$fname'  AND mname='$mname' AND idnum='$idnum'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_array($result);

            if ($row) {
                return $row['accountID'];
            }            
        }
        
    }

    //activate account
    function activate_account($accID) {
        global $con;

        $query = "UPDATE wt_accounts SET status = 'active' WHERE accountID = '$accID'";
        $result = mysqli_query($con, $query);
    }

    //deactivate account
    function deactivate_account($accID) {
        global $con;

        $query = "UPDATE wt_accounts SET status = 'inactive' WHERE accountID = '$accID'";
        $result = mysqli_query($con, $query);
    }

    //employee list
    function employee_list() {
        global $con;

        $query_employee = "SELECT wt_employee.accountID, wt_employee.lname, wt_employee.fname, wt_employee.idnum, 
            wt_accounts.accountID, wt_accounts.status, wt_accounts.accountType 
                FROM wt_employee, wt_accounts WHERE wt_employee.accountID = wt_accounts.accountID ORDER BY wt_employee.lname";
        $result = mysqli_query($con, $query_employee);
        $i = 0;

        while($row = mysqli_fetch_array($result)) {
            $i = $i + 1;
            $lname = $row['lname'];
            $fname = $row['fname'];            
            $idnum = $row['idnum'];
            $status = $row['status'];
            $atype = $row['accountType'];
            $fullname = $lname.", ".$fname;

            echo "<tr>
                    <td>".$i."</td>
                    <td>".$fullname."</td>
                    <td>".$idnum."</td>
                    <td>".$status."</td>
                    <td>".$atype."</td>
                </tr>";
        }
    }

    //admin list
    function admin_list() {
        global $con;

        $query_admin = "SELECT wt_admin.accountID, wt_admin.lname, wt_admin.fname, wt_admin.idnum, 
                wt_accounts.accountID, wt_accounts.status, wt_accounts.accountType 
                FROM wt_admin, wt_accounts WHERE wt_admin.accountID = wt_accounts.accountID ORDER BY wt_admin.lname";
        $result = mysqli_query($con, $query_admin);
        $i = 0;

        while($row = mysqli_fetch_array($result)) {
            $i = $i + 1;
            $lname = $row['lname'];
            $fname = $row['fname'];            
            $idnum = $row['idnum'];
            $status = $row['status'];
            $atype = $row['accountType'];
            $fullname = $lname.", ".$fname;

            echo "<tr>
                    <td>".$i."</td>
                    <td>".$fullname."</td>
                    <td>".$idnum."</td>
                    <td>".$status."</td>
                    <td>".$atype."</td>
                </tr>";
        }
    }

    //admin list
    function all_list() {
        global $con;

        $query_admin = "SELECT wt_admin.accountID, wt_admin.lname, wt_admin.fname, wt_admin.idnum, 
                wt_accounts.accountID, wt_accounts.status, wt_accounts.accountType 
                FROM wt_admin, wt_accounts WHERE wt_admin.accountID = wt_accounts.accountID ORDER BY wt_admin.lname";
        $query_employee = "SELECT wt_employee.accountID, wt_employee.lname, wt_employee.fname, wt_employee.idnum, 
            wt_accounts.accountID, wt_accounts.status, wt_accounts.accountType 
                FROM wt_employee, wt_accounts WHERE wt_employee.accountID = wt_accounts.accountID ORDER BY wt_employee.lname";
        
        $result_admin = mysqli_query($con, $query_admin);
        $result_employee = mysqli_query($con, $query_employee);
        $i = 0;

        while($row = mysqli_fetch_array($result_admin)) {
            $i = $i + 1;
            $lname = $row['lname'];
            $fname = $row['fname'];            
            $idnum = $row['idnum'];
            $status = $row['status'];
            $atype = $row['accountType'];
            $fullname = $lname.", ".$fname;

            echo "<tr>
                    <td>".$i."</td>
                    <td>".$fullname."</td>
                    <td>".$idnum."</td>
                    <td>".$status."</td>
                    <td>".$atype."</td>
                </tr>";
        }

        while($row = mysqli_fetch_array($result_employee)) {
            $i = $i + 1;
            $lname = $row['lname'];
            $fname = $row['fname'];            
            $idnum = $row['idnum'];
            $status = $row['status'];
            $atype = $row['accountType'];
            $fullname = $lname.", ".$fname;

            echo "<tr>
                    <td>".$i."</td>
                    <td>".$fullname."</td>
                    <td>".$idnum."</td>
                    <td>".$status."</td>
                    <td>".$atype."</td>
                </tr>";                
        }        
    }

    //active list
    function active_list() {
        global $con;

        $query_admin = "SELECT wt_admin.accountID, wt_admin.lname, wt_admin.fname, wt_admin.idnum, 
                wt_accounts.accountID, wt_accounts.status, wt_accounts.accountType 
                FROM wt_admin, wt_accounts WHERE wt_admin.accountID = wt_accounts.accountID AND wt_accounts.status = 'active' ORDER BY wt_admin.lname";
        $query_employee = "SELECT wt_employee.accountID, wt_employee.lname, wt_employee.fname, wt_employee.idnum, 
            wt_accounts.accountID, wt_accounts.status, wt_accounts.accountType 
                FROM wt_employee, wt_accounts WHERE wt_employee.accountID = wt_accounts.accountID AND wt_accounts.status = 'active' ORDER BY wt_employee.lname";

        $result_admin = mysqli_query($con, $query_admin);
        $result_employee = mysqli_query($con, $query_employee);
        $i = 0;

        while($row = mysqli_fetch_array($result_admin)) {
            $i = $i + 1;
            $lname = $row['lname'];
            $fname = $row['fname'];            
            $idnum = $row['idnum'];
            $status = $row['status'];
            $atype = $row['accountType'];
            $fullname = $lname.", ".$fname;

            echo "<tr>
                    <td>".$i."</td>
                    <td>".$fullname."</td>
                    <td>".$idnum."</td>
                    <td>".$status."</td>
                    <td>".$atype."</td>
                </tr>";
        }

        while($row = mysqli_fetch_array($result_employee)) {
            $i = $i + 1;
            $lname = $row['lname'];
            $fname = $row['fname'];            
            $idnum = $row['idnum'];
            $status = $row['status'];
            $atype = $row['accountType'];
            $fullname = $lname.", ".$fname;

            echo "<tr>
                    <td>".$i."</td>
                    <td>".$fullname."</td>
                    <td>".$idnum."</td>
                    <td>".$status."</td>
                    <td>".$atype."</td>
                </tr>";                
        }        
    }

    //inactive list
    function inactive_list() {
        global $con;

        $query_admin = "SELECT wt_admin.accountID, wt_admin.lname, wt_admin.fname, wt_admin.idnum, 
                wt_accounts.accountID, wt_accounts.status, wt_accounts.accountType 
                FROM wt_admin, wt_accounts WHERE wt_admin.accountID = wt_accounts.accountID AND wt_accounts.status = 'inactive' ORDER BY wt_admin.lname";
        $query_employee = "SELECT wt_employee.accountID, wt_employee.lname, wt_employee.fname, wt_employee.idnum, 
            wt_accounts.accountID, wt_accounts.status, wt_accounts.accountType 
                FROM wt_employee, wt_accounts WHERE wt_employee.accountID = wt_accounts.accountID AND wt_accounts.status = 'inactive' ORDER BY wt_employee.lname";

        $result_admin = mysqli_query($con, $query_admin);
        $result_employee = mysqli_query($con, $query_employee);
        $i = 0;

        while($row = mysqli_fetch_array($result_admin)) {
            $i = $i + 1;
            $lname = $row['lname'];
            $fname = $row['fname'];            
            $idnum = $row['idnum'];
            $status = $row['status'];
            $atype = $row['accountType'];
            $fullname = $lname.", ".$fname;

            echo "<tr>
                    <td>".$i."</td>
                    <td>".$fullname."</td>
                    <td>".$idnum."</td>
                    <td>".$status."</td>
                    <td>".$atype."</td>
                </tr>";
        }

        while($row = mysqli_fetch_array($result_employee)) {
            $i = $i + 1;
            $lname = $row['lname'];
            $fname = $row['fname'];            
            $idnum = $row['idnum'];
            $status = $row['status'];
            $atype = $row['accountType'];
            $fullname = $lname.", ".$fname;

            echo "<tr>
                    <td>".$i."</td>
                    <td>".$fullname."</td>
                    <td>".$idnum."</td>
                    <td>".$status."</td>
                    <td>".$atype."</td>
                </tr>";                
        }        
    }

    //user list
    function user_all_list() {
        global $con;

        $query = "SELECT wt_user.accountID, wt_user.lname, wt_user.fname, wt_user.birthday, wt_user.sex, wt_user.city, wt_user.province, wt_user.email,
                wt_accounts.accountID, wt_accounts.username, wt_accounts.accountType, wt_accounts.status
                FROM wt_user, wt_accounts WHERE wt_user.accountID = wt_accounts.accountID ORDER BY wt_user.lname";
        $result = mysqli_query($con, $query);
        $i = 0;

        while($row = mysqli_fetch_array($result)) {
            $i = $i + 1;
            $lname = $row['lname'];
            $fname = $row['fname'];            
            $username = $row['username'];
            $birthday = $row['birthday'];
            $sex = $row['sex'];
            $city = $row['city'];
            $province = $row['province'];
            $email = $row['email'];
            $status = $row['status'];
            $atype = $row['accountType'];
            $fullname = $lname.", ".$fname;

            echo "<tr>
                    <td>".$i."</td>
                    <td>".$fullname."</td>
                    <td>".$username."</td>
                    <td>".$birthday."</td>
                    <td>".$sex."</td>
                    <td>".$city."</td>
                    <td>".$province."</td>
                    <td>".$email."</td>
                    <td>".$status."</td>                    
                </tr>";
        }
    }

    //user list
    function user_active_list() {
        global $con;

        $query = "SELECT wt_user.accountID, wt_user.lname, wt_user.fname, wt_user.birthday, wt_user.sex, wt_user.city, wt_user.province, wt_user.email,
                wt_accounts.accountID, wt_accounts.username, wt_accounts.accountType, wt_accounts.status
                FROM wt_user, wt_accounts WHERE wt_user.accountID = wt_accounts.accountID AND wt_accounts.status='active' ORDER BY wt_user.lname";
        $result = mysqli_query($con, $query);
        $i = 0;

        while($row = mysqli_fetch_array($result)) {
            $i = $i + 1;
            $lname = $row['lname'];
            $fname = $row['fname'];            
            $username = $row['username'];
            $birthday = $row['birthday'];
            $sex = $row['sex'];
            $city = $row['city'];
            $province = $row['province'];
            $email = $row['email'];
            $status = $row['status'];
            $atype = $row['accountType'];
            $fullname = $lname.", ".$fname;

            echo "<tr>
                    <td>".$i."</td>
                    <td>".$fullname."</td>
                    <td>".$username."</td>
                    <td>".$birthday."</td>
                    <td>".$sex."</td>
                    <td>".$city."</td>
                    <td>".$province."</td>
                    <td>".$email."</td>
                    <td>".$status."</td>                    
                </tr>";
        }
    }

    //user list
    function user_inactive_list() {
        global $con;

        $query = "SELECT wt_user.accountID, wt_user.lname, wt_user.fname, wt_user.birthday, wt_user.sex, wt_user.city, wt_user.province, wt_user.email,
                wt_accounts.accountID, wt_accounts.username, wt_accounts.accountType, wt_accounts.status
                FROM wt_user, wt_accounts WHERE wt_user.accountID = wt_accounts.accountID AND wt_accounts.status='inactive' ORDER BY wt_user.lname";
        $result = mysqli_query($con, $query);
        $i = 0;

        while($row = mysqli_fetch_array($result)) {
            $i = $i + 1;
            $lname = $row['lname'];
            $fname = $row['fname'];            
            $username = $row['username'];
            $birthday = $row['birthday'];
            $sex = $row['sex'];
            $city = $row['city'];
            $province = $row['province'];
            $email = $row['email'];
            $status = $row['status'];
            $atype = $row['accountType'];
            $fullname = $lname.", ".$fname;

            echo "<tr>
                    <td>".$i."</td>
                    <td>".$fullname."</td>
                    <td>".$username."</td>
                    <td>".$birthday."</td>
                    <td>".$sex."</td>
                    <td>".$city."</td>
                    <td>".$province."</td>
                    <td>".$email."</td>
                    <td>".$status."</td>                    
                </tr>";
        }
    }

    //verify if account exists (forgot password)
    function verify_fpass($username, $email) {
        global $con;

        $query_accountID = "SELECT accountID, username FROM wt_accounts WHERE username='$username'";
        $result_accountID = mysqli_query($con, $query_accountID);

        if ($result_accountID) {
            $row = mysqli_fetch_array($result_accountID);
            $accountID = $row['accountID'];

            $query_admin = "SELECT email FROM wt_admin WHERE accountID ='$accountID' AND email='$email' ";
            $query_employee = "SELECT email FROM wt_employee WHERE accountID ='$accountID' AND email='$email' ";
            $query_user = "SELECT email FROM wt_user WHERE accountID ='$accountID' AND email='$email' ";

            $result_admin = mysqli_query($con, $query_admin);
            $result_employee = mysqli_query($con, $query_employee);
            $result_user = mysqli_query($con, $query_user);

            $count_admin = mysqli_num_rows($result_admin);
            $count_employee = mysqli_num_rows($result_employee);
            $count_user = mysqli_num_rows($result_user);

            if ($count_admin == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['accountID'] = $accountID;
                return $username;
            }
            else if ($count_employee == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['accountID'] = $accountID;
                return $username;
            }
            else if ($count_user == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['accountID'] = $accountID;
                return $username;
            }
        }
    }

    //get account security question (forgot password)
    function get_secQ($idNum, $qNum) {
        global $con;

        //get selected sq1 questionID
        $query = "SELECT * FROM wt_secqa WHERE accountID = '$idNum'" ;
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);          
        $selected = $row[$qNum];

        //get selected sq1 question
        $query_question = "SELECT * FROM wt_sqlist WHERE questionID = '$selected'";
        $result_question = mysqli_query($con, $query_question);
        $row_question = mysqli_fetch_array($result_question);
        $selected_question = $row_question['question'];

        return $selected_question;
    }      

    //verify answers (forgot password)
    function verify_ans($a1, $a2, $secID){
        global $con; 

        $query = "SELECT * FROM wt_secqa WHERE secID = '$secID'";
        $result = mysqli_query($con, $query);

        if ($result) {
            $row = mysqli_fetch_array($result);
            if (strcasecmp($row['a1'], $a1)==0 && strcasecmp($row['a2'], $a2)==0) {
                return 'correct';
            }
            else {
                return 'incorret';
            }
        }
    } 

    //upload webtoon 
    function insert_photo($title, $caption, $file_name, $final_file, $file_size, $file_type, 
                                $illustrator, $question, $datetimeUpload, $tags, $status){
        global $con;

        $query = "INSERT INTO wt_webtoon(title, caption, fileName, fileContent, fileSize, fileType,
                        illustrator, question, datetimeUpload, tags, status)"
                    . "VALUES('$title', '$caption', '$file_name', '$final_file', '$file_size', '$file_type', 
                                '$illustrator', '$question', '$datetimeUpload', '$tags', '$status')";
        $result = mysqli_query($con, $query);
        
        if ($result) {
            return true;
        }
        else {
            echo mysqli_error($con);
        }
    }

    
    //list webtoons
    function list_webtoons($directory, $logged_in) {
        global $con;
        
        $allowed_types = array('jpg', 'jpeg', 'gif', 'png');
        $file_parts = array();
        $ext = '';
        $title = '';
        $i = 0;
        $dir_handle = @opendir($directory) or die("Directory not found.");

        $query = "SELECT * FROM wt_webtoon WHERE status=1"; 

        $result = mysqli_query($con, $query);

        if($result) {
            $i = 0;

            while ($values = mysqli_fetch_array($result)) {
                $webtoonID = $values['webtoonID'];
                $title = $values['title'];
                $caption = $values['caption'];
                $file = $values['fileContent'];                
                $illustrator = $values['illustrator'];

                if ($file=='.' || $file == '..') continue;                

                $file_parts = explode('.',$file);
                $ext = strtolower(array_pop($file_parts));
                //$title = implode('.',$file_parts);
                //$title = htmlspecialchars($title);
                //$title = preg_replace('/[^a-zA-Z0-9\']/', ' ', "$title");  

                if (in_array($ext, $allowed_types)) {     
                    if ($logged_in == "yes") {
                        echo "<a href='../user/view_toons.php?webtoon=$webtoonID'><div class='col-sm-6 col-md-4'>
                            <div class='thumbnail'>
                                <img src=$directory/$file alt='...'>
                                <div class='caption'>
                                    <h3>$title</h3>
                                    <p>by $illustrator</p>
                                    <p>$caption</p>                                                                        
                                </div>
                            </div>
                        </div></a>";
                    }   
                    else {
                        echo "<a href='../controller/unlock_webtoon.php'><div class='col-sm-6 col-md-4'>
                            <div class='thumbnail'>
                                <img src=$directory/$file alt='...'>
                                <div class='caption'>
                                    <h3>$title</h3>
                                    <p>by $illustrator</p>
                                    <p>$caption</p>                                                                        
                                </div>
                            </div>
                        </div></a>";                        
                    }                        
                    
                    $i++;
                }
            }
            closedir($dir_handle);
        }           
    }

    //get webtoon contents
    function get_wt_details($id) {
        global $con;

        $query = "SELECT * FROM webtoon WHERE webtoonID =".$id."" ;
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);  

        if (!$result) {
            die("db error " . mysqli_error($con));
        }

        //echo $row["'".$field."'"];
        return $row["".$field.""];
    } 

    //update webtoon
    function update_webtoon($webtoonID, $title, $caption, $illustrator, $question, $tags) {
        global $con; 

        $query_title = "UPDATE wt_webtoon SET title='$title' WHERE webtoonID = '$webtoonID'" ;
        $query_caption = "UPDATE wt_webtoon SET caption='$caption' WHERE webtoonID = '$webtoonID'" ;
        $query_illustrator = "UPDATE wt_webtoon SET illustrator='$illustrator' WHERE webtoonID = '$webtoonID'" ;
        $query_question = "UPDATE wt_webtoon SET question='$question' WHERE webtoonID = '$webtoonID'" ;
        $query_tags = "UPDATE wt_webtoon SET tags='$tags' WHERE webtoonID = '$webtoonID'" ;

        $result_title = mysqli_query($con, $query_title);
        $result_caption = mysqli_query($con, $query_caption);
        $result_illustrator = mysqli_query($con, $query_illustrator);
        $result_question = mysqli_query($con, $query_question);
        $result_tags = mysqli_query($con, $query_tags);       
    }

    //delete webtoon
    function delete_webtoon($webtoonID) {
        global $con; 

        $query = "UPDATE wt_webtoon SET status=0 WHERE webtoonID = '$webtoonID'" ;
        $result = mysqli_query($con, $query);
    }
?>

