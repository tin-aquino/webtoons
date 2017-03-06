<?php
	require("../file_includes/dbconnect.php");
    require("../model/model.php");

    if (isset($_POST['delete_webtoon'])) {     
    	//hidden
    	$webtoonID = trim($_POST['webtoonID']);

    	delete_webtoon($webtoonID);
    	redirect("Delete successful.", "../view/employee/index.php");   
    }
    else {
        header("location: ../");
    }

?>