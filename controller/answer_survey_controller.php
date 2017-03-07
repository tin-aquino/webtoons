<?php
	require("../file_includes/dbconnect.php");
    require("../model/model.php");

    if (isset($_POST['answer_survey'])) {
        $webtoonID = $_POST['webtoonID'];
        $userID = $_SESSION['userID'];        

    	if (!($_POST['answer'] == null)) {
            $answer = mysqli_real_escape_string($con, $_POST['answer']);
            $done = already_answered($webtoonID, $userID);

            if ($done) {
                $tokens = count_token($userID);
                redirect("You've already answered this survey. Please take a different one. Total tokens: $tokens", "../view/user/view_webtoon.php?webtoon=$webtoonID");
            }
            else {
                insert_answer($webtoonID, $answer, $userID);
            
                add_token($userID);
                $tokens = count_token($userID);

                $_SESSION['last_viewed'] = $webtoonID;

                redirect("Thank you for answering! You earn 1 token. Total tokens: $tokens", "../view/user/view_webtoon.php?webtoon=$webtoonID");
            }
        }
        else {
            redirect("Please answer the question.", "../view/user/view_webtoon.php?webtoon=$webtoonID");
        }
    }
    else {
        header("location: ../");
    }

?>