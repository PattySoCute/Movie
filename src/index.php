<!DOCTYPE html>
<html>
<head>
	<title>Movie review</title>
	<link rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		body{
			background: linear-gradient(45deg, #49a09d, #5f2c82);
		}
		button{
			float: right;
		}
		.homeheader{
			text-align: center;
			color: #F8EFBA;
			background-color: #2C3A47;
		}
	</style>
</head>
<body>
	
	<p>
		<a href="login.php">
			<button type="button" class="btn btn-default btn-sm">
          		<div style="color: #ee5253"><span class="glyphicon glyphicon-log-out"></span> Log out </div>
        	</button>
    </p></a>
	<br></br>
	<div class="homeheader">
		<h1>MR</h1>
	</div>
	<div class = "row">
       <div class="col-md-12">
    <?php include ('showmovie.php'); ?>
    </div>
</div>
</body>
</html>