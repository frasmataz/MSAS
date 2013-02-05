<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>MSAS - Registration</title>
	</head>
	<body>
		<div align = "center">
			<div align = "center">
				<h1><a href="home.php"> <img src="Untitled.png"></a></h1>
			</div>
			<div id = "box">
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
					<p>Username:<input type="text" name="username"></p>
				
					<p>Password:<input type="password" name="password"></p>
				
					<p>Confirm Password:<input type="password" name="passwordConf"></p>
				
					<input type="submit">
				</form>
			</div>
		</div>
	</body>
</html>