<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
  	<title>Login</title>
  	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  	<form method="post" action="checkLog.php">
  		
			<div class="header">
  				<h2>Login</h2>
  			</div>

  			<div class="input-group">
  				<label>Username</label>
  				<input type="text" name="username"><br>
  			</div>
  			<div class="input-group">
  				<label>Password</label>
  				<input type="password" name="password"><br>
  			</div>
  			<div class="input-group">
  				<button type="submit" class="btn">Login</button>
  			</div>
  		<p>
  			Not yet a member? <a href="register.php">Sign up</a>
  		</p>
  	</form>
</body>
</html>