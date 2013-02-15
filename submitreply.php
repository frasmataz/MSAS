<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>MSAS - Submit a question</title>
	</head>
	
	<body>
		<div align = "center">
			<h1><a href="home.php"> <img src="Untitled.png"></a></h1>

			
			<form action="submittingreply.php?post=<?php echo $_GET['post'];?>" method="post">
				<div id= "newBox">
					<p style="font-weight: bold">
					Submit a reply:
					</p>
					<p>Enter your reply:
					<textarea class="inputtext" name="message"></textarea></p>
				</div>

				<input type="submit"><a href="home.php"><button type="button">Cancel</button></a>
			</form>
		</div>
	</body>
</html>