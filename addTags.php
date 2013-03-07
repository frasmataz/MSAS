<!DOCTYPE html>

<?php session_start();
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password=""; // Mysql password

	$linkcon = mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("msas_schema", $linkcon)or die("cannot select DB1"); 
	
	$postID = $_GET['post'];
	$getPostsQuery = sprintf('SELECT * FROM posts WHERE ID = %s', $postID);
	$linkresult=mysql_query($getPostsQuery);
?>
	
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<title>MSAS - Submit a question</title>
		<!--<link rel="stylesheet" type="text/css" href="http://xoxco.com/projects/code/tagsinput/jquery.tagsinput.css" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://xoxco.com/projects/code/tagsinput/jquery.tagsinput.js"></script>
		<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
		<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />-->
		
		<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
		<script src="jquery.tagsinput.js"></script>
		<link rel="stylesheet" type="text/css" href="jquery.tagsinput.css" />
	</head>
	
	<body>
		<div align = "center">
			<h1><a href="home.php"> <img src="Untitled.png"></a></h1>

				<div class= "post">
					<p class="pageTitle">
						Add tags to post:
					</p>
					
					<?php
				
					if (!$linkresult)
					{
						die('Invalid query: ' . mysql_error());
					}
					else
					{
						$row = mysql_fetch_array($linkresult);
						echo( sprintf('<p>%s</p><p>%s</p>', $row['Title'], $row['Message']));
					} 
					
					?>
					<p>
					
					</p>
					
					<p>
						Enter tags:
						<form action="derp" method="get">

							<input id="tags" type="text" class="tags" />

							<input type="submit">
						</form>
					</p>
				</div>

				<input type="submit"><a href="home.php"><button type="button">Cancel</button></a>
		</div>
	</body>
	
	<script type="text/javascript">

		$('#tags').tagsInput();

	</script>
</html>