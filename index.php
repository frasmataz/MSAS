<!DOCTYPE html>

<?php session_start();
		if(!empty($_SESSION))
		{
			header("location:home.php");
		}
	?>
<html>
	
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<title>MSAS - Login</title>
	</head>
	
	<body>
		<div align = "center">
			<div align = "center">
				<h1><a href="home.php"> <img src="Untitled.png"></a></h1>
			</div>
			
			<div class = "loginbox">
				<p>
				Please log in.
				</p>
				
				<?php
					if (!empty($_GET))
					{
						if ($_GET['status']==0)
						{
							echo('<p style="color: red;"> Username/password not recognised, please try again.</p>');
						}
						else if ($_GET['status']==1)
						{
							echo('<p style="color: green;"> Account successfully created.</p>');
						}
					}
					else
					{
						echo "<br>";
					}
				?>
				
				<form action="login.php" method="post">
				
					Username:<br><input type="text" name="username"><br><br>
				
					Password:<br><input type="password" name="password"><br><br>
				
					<input type="submit">
				
				</form>
				
				<p> If you do not yet have an account, please register </p>
				
				<button type="button" value="LoL" onclick="location.href='register.php'" />Register</button>
			</div>
		</div>
	</body>
</html>