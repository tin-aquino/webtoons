<?php
	require("../file_includes/dbconnect.php");
    require("../model/model.php");

    global $con;

    if (isset($_POST['edit_webtoon'])) {       
    	$title = mysqli_real_escape_string($con, trim($_POST['title']));
    	$caption = mysqli_real_escape_string($con, trim($_POST['caption']));
    	$illustrator = mysqli_real_escape_string($con, trim($_POST['illustrator']));
        $question = mysqli_real_escape_string($con, trim($_POST['question']));
    	$tags = mysqli_real_escape_string($con,trim($_POST['tags']));
    	//hidden
    	$webtoonID = trim($_POST['webtoonID']);

    	if (!($title == null) && !($caption == null) && !($illustrator == null) && !($tags == null)) {
    		update_webtoon($webtoonID, $title, $caption, $illustrator, $question, $tags);     
            redirect("Update successful.", "../view/employee/index.php");   
    	}
    	else {
    		redirect("Kindly input all fields.", "../view/employee/index.php");                      
    	}
    }
?>