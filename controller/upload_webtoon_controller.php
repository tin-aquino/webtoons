<?php
	require("../file_includes/dbconnect.php");
    require("../model/model.php");

    global $con;

    if (isset($_POST['upload_webtoon'])) {
    	try {
    		if ($_FILES['file']['size']>0) {
    			if(!($_POST['title']== null) && !($_POST['caption']== null) && !($_POST['illustrator']== null) && !($_POST['question']== null) && !($_POST['choices']== null)&& !($_POST['tags']== null)) {

    				$title = mysqli_real_escape_string($con,trim($_POST['title']));
    				$caption = mysqli_real_escape_string($con,trim($_POST['caption']));
    				$illustrator = mysqli_real_escape_string($con,trim($_POST['illustrator']));
                    $question = mysqli_real_escape_string($con,trim($_POST['question']));
                    $choices = strtolower(mysqli_real_escape_string($con,trim($_POST['question'])));
    				$tags = mysqli_real_escape_string($con,trim($_POST['tags']));
    				$datetimeUpload = date("Y-m-d H:i:sa");
                    $status = 1;

    				//upload file
		            $file = rand(1000,100000)."-".$_FILES['file']['name'];
		            $file_loc = $_FILES['file']['tmp_name'];
		            $file_size = $_FILES['file']['size'];
		            $file_type = $_FILES['file']['type'];
		            $folder="../file_includes/uploads/";

		            $file_name = $_FILES['file']['name'];

                    // make file name in lower case
                    $new_file_name = strtolower($file);                
                    $final_file=str_replace(' ','-',$new_file_name);                    

                    //file limits
                    $ok = 1;  

                    // size limit: 50MB max
                    // error checking: 5MB
                    if ($file_size > 5000000){               
                        $ok= 0;
                        redirect("File too large", "../view/employee/index.php");                        
                    }
                    //limit type
                    else if(!($file_type == "image/jpeg" || 
                    	$file_type == "image/jpg" ||
                    	$file_type == "image/gif" ||
                    	$file_type == "image/png")){  

                        $ok= 0;
                        redirect("Image files only", "../view/employee/index.php");                        
                    }
                    else {
                        $ok= 1;
                    }

                    if($ok == 1){
                        $ip = insert_photo($title, $caption, $file_name, $final_file, $file_size, $file_type, 
                                $illustrator, $question, $choices, $datetimeUpload, $tags, $status);
                        if($ip){
                        	//move to folder uploads
                    		move_uploaded_file($file_loc,$folder.$final_file);
                            redirect("Photo was successfully uploaded.", "../view/employee/index.php");                                
                        }
                        else{
                            redirect("Photo was not successfully uploaded.", "../view/employee/index.php");                            
                        }
                    }
                    else{
                        redirect("There was an error uploading the photo", "../view/employee/index.php");                            
                    }  
    			}    			   		
    		}
    		else {
            	redirect("File cannot be read", "../view/employee/index.php");                            
        	}
    	}
    	catch (Exception $ex) {
            redirect("Error", "../view/employee/index.php");
        }
    }
    else {
        header("location: ../");
    }
?>