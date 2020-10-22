<!DOCTYPE html>
<html>
<head>
	<title>HPDS Management System | Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" type="text/css">

	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
</head>
<body>
	<div class="loginbox">
		<img src="parrot.png" class="avatar">
		<img src="HPDS-logo.png" class="HPDS-logo">
		<h1>
			Welcome Back!
		</h1>
		<form action="process.php" method="POST">
			<div>
				<span id='username-title' class="log-in-information">
					Username
				</span>
				<input type="text" name="username" required="required" onfocus="moveUsername()">

				<span id='password-title' class="log-in-information">
					Password
				</span>
				<input type="password" name="password" required="required" onfocus="movePassword()">
			</div>
			<form action="index.php">
				<input type="submit" name="log-in" value="HOP IN" onclick="login()">
			</form>
		</form>
	</div>

	<div class="footer">
		<p>&copy; HPDS. All rights reserved</p>
	</div>
</body>
<script type="text/javascript" src="index.js?v=<?php echo time(); ?>"></script>
</script>
</html>