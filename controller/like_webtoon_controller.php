<?php
	require("../file_includes/dbconnect.php");
    require("../model/model.php");

    if (isset($_POST['like_webtoon'])) {     
    	//hidden
    	$webtoonID = trim($_POST['webtoonID']);
    	$userID = trim($_POST['userID']);

    	add_like($webtoonID);
    	header("location: ../view/user/view_webtoon.php?webtoon=$webtoonID");
    }
    else {
        header("location: ../");
    }

?>