<!DOCTYPE html>
<?php session_start();
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password=""; // Mysql password

	$linkcon = mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("msas_schema", $linkcon)or die("cannot select DB1"); ?>
	
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<title>MSAS - Your posts</title>
	</head>
	
	<body>
	<?php
		if(empty($_SESSION))
		{
			header("location:index.php");
		}
	?>
		<div align = "center">
			<div align = "center">
				<h1><a href="home.php"> <img src="Untitled.png"></a></h1>
				<p class="homebuttons"> <a href="submitquestion.php">Submit a question</a> || <a href="logout.php">Log out</a>
				<p class="homebuttons" style="font-weight: bold"> Existing posts: </p>
			</div>

			<?php
			if ($_SESSION['userType'] == "student")
			{
				$getPostsQuery = sprintf('SELECT * FROM posts WHERE Users_ID = %s ORDER BY Datetime DESC', $_SESSION['userID']);
				$linkresult=mysql_query($getPostsQuery);
				
				if (!$linkresult)
				{
					die('Invalid query: ' . mysql_error());
				}
				else
				{
					while($row = mysql_fetch_array($linkresult))
					{
						echo sprintf('<a href="replies.php?post=%s" style="text-decoration:none">', $row['ID']);
						echo '<div id ="newBox">';
						echo sprintf('<p class = "title">%s</p> <p class = "replies">%s</p><br><br><br> <p class = "message">%s</p>', $row['Title'], $row['Datetime'], $row['Message']);
						echo '</div>';
						echo '</a>';
					}
				}
			}
			else if ($_SESSION['userType'] == "advisor")
			{
				$getPostsQuery = sprintf('SELECT * FROM posts ORDER BY Datetime DESC');
				$linkresult=mysql_query($getPostsQuery);
				
				if (!$linkresult)
				{
					die('Invalid query: ' . mysql_error());
				}
				else
				{
					while($row = mysql_fetch_array($linkresult))
					{
						echo sprintf('<a href="replies.php?post=%s" style="text-decoration:none">', $row['ID']);
						echo '<div id ="newBox">';
						echo sprintf('<p class = "title">%s</p> <p class = "replies">%s</p><br><br><br> <p class = "message">%s</p>', $row['Title'], $row['Datetime'], $row['Message']);
						echo "</div>";
						echo '</a>';
					}
				}
			}
			?>
		</div>
	</body>
</html>