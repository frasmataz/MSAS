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
		
		<div>
			<div align = "center">
				<a href="home.php"> <img src="Untitled.png"></a>
				<p class="homebuttons"> <a href="submitquestion.php">Submit a question</a> || Logged in as <?php echo $_SESSION['username']?> || <a href="logout.php">Log out</a>
				<p class = "pageTitle"> Existing posts: </p>
			</div>

			<?php
				if ($_SESSION['userType'] == "student")
				{
					$getPostsQuery = sprintf('SELECT * FROM posts WHERE Users_ID = %s ORDER BY Datetime DESC', $_SESSION['userID']);
					$linkresult=mysql_query($getPostsQuery);
				}
				else if ($_SESSION['userType'] == "advisor")
				{
					$getPostsQuery = sprintf('SELECT * FROM posts ORDER BY Datetime DESC');
					$linkresult=mysql_query($getPostsQuery);
				}
				
				if (!$linkresult)
				{
					die('Invalid query: ' . mysql_error());
				}
				else
				{
					while($row = mysql_fetch_array($linkresult))
					{
						echo sprintf('<a class = postwrap href="replies.php?post=%s">', $row['ID']);
						echo '<div class ="post">';
						echo sprintf('<p class = "postTitle">%s</p> <p class = "postReplies">%s</p><br><br><br><p class = "postMessage">%s</p>', $row['Title'], $row['Datetime'], $row['Message']);
						echo '</div>';
						echo '</a>';
					}
				}
			?>
		</div>
	</body>
</html>