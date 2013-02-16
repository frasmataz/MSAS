<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<title>MSAS - Registration</title>
	</head>
	
	<body>
		<div align = "center">
			<div align = "center">
				<h1><a href="home.php"> <img src="Untitled.png"></a></h1>
			</div>
			
			<div class = "loginbox">
				<?php
				if (!empty($_GET))
				{
					if ($_GET['status']==0)
					{
						echo('<p class = "center", style="color: red;">Passwords did not match.</p>');
					}
					else if ($_GET['status']==1)
					{
						echo('<p class = "center", style="color: red;">Please enter a username.</p>');
					}
				}
				?>
				<p>Please enter the following details to register:</p>
				<form action="checkReg.php" method="post">
				
					Username:<br><input type="text" name="username"><br><br>
				
					Password:<br><input type="password" name="password"><br><br>
				
					Confirm Password:<br><input type="password" name="passwordConf"><br><br>
				
					<input type="submit">
				</form>
			</div>
		</div>
	</body>
</html>