<?php
	require("../file_includes/dbconnect.php");
    require("../model/model.php");

    global $con;

    if (isset($_POST['edit_webtoon'])) {       
    	$title = mysqli_real_escape_string($con, trim($_POST['title']));
    	$caption = mysqli_real_escape_string($con, trim($_POST['caption']));
    	$illustrator = mysqli_real_escape_string($con, trim($_POST['illustrator']));
        $question = mysqli_real_escape_string($con, trim($_POST['question']));
        $choices = strtolower(mysqli_real_escape_string($con, trim($_POST['choices'])));
    	$tags = mysqli_real_escape_string($con,trim($_POST['tags']));
    	//hidden
    	$webtoonID = trim($_POST['webtoonID']);

    	if (!($title == null) && !($caption == null) && !($illustrator == null) && !($question == null) && !($choices == null) && !($tags == null)) {
    		update_webtoon($webtoonID, $title, $caption, $illustrator, $choices, $question, $tags);     
            redirect("Update successful.", "../view/employee/index.php");   
    	}
    	else {
    		redirect("Kindly input all fields.", "../view/employee/index.php");                      
    	}
    }
    else {
        header("location: ../");
    }
?>