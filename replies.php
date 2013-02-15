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
		<title>MSAS - Replies</title>
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
				<p class="homebuttons"> <a href="submitreply.php">Reply to this question</a> || <a href="home.php">Back to all posts</a> || <a href="logout.php">Log out</a>
				<p class="homebuttons" style="font-weight: bold"> Replies: </p>
			</div>

			<?php
			//if ($_SESSION['userType'] == "student")
			//{
			
			if(!empty($_GET))
			{
				$postID = $_GET['post'];
				$getRepliesQuery = sprintf('SELECT * FROM reply WHERE Posts_ID = %s ORDER BY Datetime DESC', $postID);
				$linkresult=mysql_query($getRepliesQuery);
				
				if (!$linkresult)
				{
					die('Invalid query: ' . mysql_error());
				}
				else
				{
					while($row = mysql_fetch_array($linkresult))
					{
						// $getSingleQuery = sprintf('SELECT * FROM reply WHERE ID = %s', $row['Reply_ID']);
						// $singleresult=mysql_query($getSingleQuery);
						// $singlerow = mysql_fetch_array($singleresult);
						echo '<div id ="newBox">';
						if ($row['IsFromAdvisor'] == 0)
						{
							echo('<p class = "title">Student:</p>');
						} else if ($row['IsFromAdvisor'] == 1)
						{
							echo('<p class = "title">Advisor:</p>');
						}
						echo sprintf('<p class = "replies">%s</p><br><br><br> <p class = "message">%s</p>', $row['Datetime'], $row['Message']);
						echo "</div>";
					}
				}
			}
			//}
			// else if ($_SESSION['userType'] == "advisor")
			// {
				// $getPostsQuery = sprintf('SELECT * FROM posts ORDER BY Datetime DESC');
				// $linkresult=mysql_query($getPostsQuery);
				
				// if (!$linkresult)
				// {
					// die('Invalid query: ' . mysql_error());
				// }
				// else
				// {
					// while($row = mysql_fetch_array($linkresult))
					// {
						// echo '<div id ="newBox">';
						// echo sprintf('<p class = "title">%s</p> <p class = "replies">%s</p><br><br><br> <p class = "message">%s</p>', $row['Title'], $row['Datetime'], $row['Message']);
						// echo "</div>";
					// }
				// }
			// }
			?>
		</div>
	</body>
</html>