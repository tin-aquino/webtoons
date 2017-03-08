<?php
	require("../file_includes/dbconnect.php");
    require("../model/model.php");

    if (isset($_POST['like_webtoon'])) {     
    	//hidden
    	$webtoonID = trim($_POST['webtoonID']);
    	$userID = trim($_POST['userID']);
        $like = 1;

    	//add_like($webtoonID);

        $done = already_liked($webtoonID, $userID);
        $_SESSION['last_viewed'] = $webtoonID;

        if ($done) {
            redirect("You've already liked this webtoon.", "../view/user/view_webtoon.php?webtoon=$webtoonID");
        }
        else {
            insert_likes($webtoonID, $like, $userID);  
            header("location: ../view/user/view_webtoon.php?webtoon=$webtoonID");                                                  
        }                               
    }
    else {
        header("location: ../");
    }

?>