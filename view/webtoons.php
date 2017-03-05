<?php
	require("../file_includes/dbconnect.php");
    require("../model/model.php");           
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- RECAPTCHA -->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<title>Webtoons</title>
	<script
	src="https://code.jquery.com/jquery-3.1.1.min.js"
	integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
	crossorigin="anonymous">	
	</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="file_includes/css/index.css">
	
	
</head>
<body>
	<div id='top'>
		<!-- NAVBAR-->
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
	      		<li><a href="../index.php">Home</a></li>
				<li><a href="webtoons.php">Webtoons List</a></li>
	        </ul>
	    </div>   	
		</nav>		

	<div class="container">
		<div class="row">
			<?php 
				$directory = '../file_includes/uploads';
				$logged_in = "no";
				list_webtoons($directory, $logged_in); 
			?>
		</div>
	</div>
	
	<script>$('#myModal').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	})
	</script>
</body>

</html>