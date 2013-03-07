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
		<title>MSAS - Replies</title>
				
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
				<h1><a href="home.php"> <img src="Untitled.png"></a></h1>
				<p class="homebuttons"> <a href="submitreply.php?post=<?php echo $_GET['post'];?>">Reply to this question</a> || <a href="home.php">Back to all posts</a> || <a href="logout.php">Log out</a>
				<p class="pageTitle"> Replies: </p>
			</div>

			<?php
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
						if (mysql_num_rows($linkresult)==0)
						{
							echo('<p class = "center">No replies yet!</p>');
						}
						else
						{
							while($row = mysql_fetch_array($linkresult))
							{
								echo '<div class ="post">';
								if ($row['IsFromAdvisor'] == 0)
								{
									echo('<p class = "postTitle">Student:</p>');
								} else if ($row['IsFromAdvisor'] == 1)
								{
									echo('<p class = "postTitle">Advisor:</p>');
								}
								echo sprintf(	'<p id = post%s class = "postReplies"></p>
												<br>
												<br>
												<br> 
												<p class = "postMessage">%s</p>
												
												<script>document.getElementById("post%s").textContent = jQuery.timeago("%s");</script>',
											
												$row['ID'], 
												$row['Message'],
												$row['ID'], 
												$row['Datetime']);
								echo "</div>";
							}
						}
					}
				}
			?>
		</div>
	</body>
</html>