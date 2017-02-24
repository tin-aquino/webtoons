<?php
	require("../file_includes/dbconnect.php");
    require("../model/model.php");

    if (isset($_POST['upload_webtoon'])) {
    	try {
    		if ($_FILES['file']['size']>0) {
    			if(!($_POST['title']== null) && !($_POST['caption']== null) && !($_POST['illustrator']== null) && !($_POST['tags']== null)) {

    				$title = trim($_POST['title']);
    				$caption = trim($_POST['caption']);
    				$illustrator = trim($_POST['illustrator']);
    				$tags = trim($_POST['tags']);
    				$datetimeUpload = date("Y-m-d H:i:sa");

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
                    if ($file_size > 2000000){               
                        $ok= 0;
                        redirect("File too large", "../view/employee/upload_webtoon.php");                        
                    }
                    //limit type
                    else if(!($file_type == "image/jpeg" || 
                    	$file_type == "image/jpg" ||
                    	$file_type == "image/gif" ||
                    	$file_type == "image/png")){  

                        $ok= 0;
                        redirect("Image files only", "../view/employee/upload_webtoon.php");                        
                    }
                    else {
                        $ok= 1;
                    }

                    if($ok == 1){
                        $ip = insert_photo($title, $caption, $file_name, $final_file, $file_size, $file_type, 
                                $illustrator, $datetimeUpload, $tags);
                        if($ip){
                        	//move to folder uploads
                    		move_uploaded_file($file_loc,$folder.$final_file);
                            redirect("Photo was successfully uploaded.", "../view/employee/upload_webtoon.php");                                
                        }
                        else{
                            redirect("Photo was not successfully uploaded.", "../view/employee/upload_webtoon.php");                            
                        }
                    }
                    else{
                        redirect("There was an error uploading the photo", "../view/employee/upload_webtoon.php");                            
                    }  
    			}    			   		
    		}
    		else {
            	redirect("File cannot be read", "../view/employee/upload_webtoon.php");                            
        	}
    	}
    	catch (Exception $ex) {
            redirect("Error", "../view/employee/upload_webtoon.php");
        }
    }
?>