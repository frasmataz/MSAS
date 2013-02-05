<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>MSAS - Submit a question</title>
	</head>
	
	<body>
		<div align = "center">
			<h1><a href="home.php"> <img src="Untitled.png"></a></h1>

			
			<form action="submit.php" method="post">
				<div id= "newBox">
					<p style="font-weight: bold">
					Submit a question:
					</p>
					<p>Title:<br><input type="text" name="title"></p>
					<p>Post your question:
					<textarea class="inputtext" name="message"> </textarea></p>
				</div>

				<input type="submit">
			</form>
		</div>
	</body>
</html>