<?php
	if(!isset($_COOKIE['loggedin_user'])){
        header("location:../../index.php");
    }
    
    require("../../model/model.php");  
    require('../../file_includes/dbconnect.php');

    set_user_session($_SESSION['myID']);
    if (isset($_POST['view_webtoon']) || isset($_POST['like_webtoon'])) {

		//hidden
    	$webtoonID = trim($_POST['webtoonID']);
    	$userID = trim($_POST['userID']);

    	$tokens = count_token($userID);
		
		if ($tokens > 0){			
			$query = "SELECT * from wt_webtoon WHERE webtoonID='$webtoonID'";
	        $result = mysqli_query($con, $query); 
	        $row = mysqli_fetch_array($result);

	        $title = $row['title'];
	        $illustrator = $row['illustrator'];
	        $caption = $row['caption'];
	        $fileContent = $row['fileContent'];
			$toon_path = "../../file_includes/uploads/$fileContent"; 	

			subtract_token($userID);		
?>

<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../../file_includes/css/toon-view.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../../file_includes/css/updatewebtoons.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
		    <div class="navbar-header">
		      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
		      	</button>
		      	<a class="navbar-brand" href="#">Brand</a>
		    </div>
	  		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      	<ul class="nav navbar-nav">
		      		<li><a href="index.php">Home</a></li>
					<li><a href="webtoons.php">Webtoons List</a></li>			
		        </ul>
		        <ul class="nav navbar-nav navbar-right">
		        	<li class="dropdown">
		        		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage Account <span class="caret"></span></a>
				        <ul class="dropdown-menu">
				            <li><a href="#" data-toggle="modal" data-target="#myUpdateAccount">Update Account Information</a></li>
				            <li><a href="#" data-toggle="modal" data-target="#myUpdateSecurityQ">Update Security Questions</a></li>
				            <li><a href="#" data-toggle="modal" data-target="#myUpdatePassword">Update Password</a></li>
				            <li role="separator" class="divider"></li>
				            <li><a href="../../controller/logout_controller.php">Logout</a></li>
				        </ul>
				    </li>
		        </ul>
		    </div>   	
		</nav>
					
		<div class='main-container'>
			<div class='row'>				
				<center>
					<p>Refreshing this page will deduct 1 from your tokens. </p>
					<h3><?php echo $title; ?></h3>                            
					<img src='<?php echo $toon_path; ?>' class='toon-img'>
					<p>by <?php echo $illustrator; ?></p>
                    <p><?php echo $caption; ?> </p> 
				</center>
			</div>
			<p>Number of Likes: <?php echo count_likes($webtoonID); ?></p>
			<form action="view_webtoon.php?webtoon=<?php echo $webtoonID; ?>" method='POST'>			
				<button type='submit' class='btn btn-primary' name='like_webtoon'>Like</button>
				<input type = 'hidden' name = 'webtoonID' value = '<?php echo $webtoonID; ?>'>
				<input type = 'hidden' name = 'userID' value = '<?php echo $_SESSION['userID']; ?>'>
			</form>
			<button class='btn btn-success'>Share</button>
			<button class='get-token-btn'>Get Token</button>
		</div>";

	</body>

	<script
	src="https://code.jquery.com/jquery-3.1.1.min.js"
	integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
	crossorigin="anonymous">	
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
<?php
			if (isset($_POST['like_webtoon'])) {     
		    	//hidden
		    	$webtoonID = trim($_POST['webtoonID']);
		    	$userID = trim($_POST['userID']);

		    	add_like($webtoonID);
		    	add_token($userID);
		    	header("location: view_webtoon.php?webtoon=$webtoonID");
		    }			
		}
		else {
			redirect("You don't have enough tokens. Take a survey to earn one!", "webtoons.php");
		}
	}
    else {
        header("location: webtoons.php");
    }

?>