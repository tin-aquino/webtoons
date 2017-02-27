<?php
	require("../file_includes/dbconnect.php");
    require("../model/model.php");

    if (isset($_POST['edit_webtoon'])) {       
    	$title = trim($_POST['title']);
    	$caption = trim($_POST['caption']);
    	$illustrator = trim($_POST['illustrator']);
    	$tags = trim($_POST['tags']);
    	//hidden
    	$webtoonID = trim($_POST['webtoonID']);

    	if (!($title == null) && !($caption == null) && !($illustrator == null) && !($tags == null)) {
    		update_webtoon($webtoonID, $title, $caption, $illustrator, $tags);     
            redirect("Update successful.", "../view/employee/upload_webtoon.php");   
    	}
    	else {
    		redirect("Kindly input all fields.", "../view/employee/upload_webtoon.php");                      
    	}
    }
?>