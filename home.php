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
		
		<script>
			function deleteMessage(postID)
			{
				if(confirm('Are you sure you want to delete this post?'))
				{
					url="deletePost.php?post="
					window.location= url.concat(postID);
					return false;
				}
			}
		</script>
		
		<script src="jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="jquery.timeago.js" type="text/javascript"></script>
		
		<script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery("abbr.timeago").timeago();
			});
		</script>
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
					if (mysql_num_rows($linkresult)==0)
					{
						echo('<p class = "center">No posts yet, click the link above to submit one!</p>');
					}
					else
					{
						while($row = mysql_fetch_array($linkresult))
						{
							echo '<div class ="post">';
							echo sprintf(	'<div class=delete>
												<img class=delete src="delete.png" onClick="deleteMessage(%s)">
											</div>
											
											<a class = postwrap href="replies.php?post=%s">
												<p class = "postTitle">%s</p>
											</a>
											
											<p id = post%s class = "postReplies"></p>
											<br>
											<br>
											<p class = "postMessage">%s</p>
											
											<script>document.getElementById("post%s").textContent = jQuery.timeago("%s");</script>',
											
											$row['ID'],  
											$row['ID'], 
											$row['Title'], 
											$row['ID'],
											$row['Message'],
											$row['ID'],
											$row['Datetime']);
							echo '</div>';
						}
					}
				}
			?>
		</div>
	</body>
</html>