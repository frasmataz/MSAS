<?php 
	session_start();
	$host="localhost"; // Host name 
	$username="msasuser"; // Mysql username 
	$password="36Pyfr9FybZTXRQL"; // Mysql password
	$encryptedPassword="";
	$db_name="msas_schema"; // Database name 
	$tbl_name="users"; // Table name 

	// Connect to server and select databse.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");
	
	$mytitle=$_POST['title']; 
	$mymessage=$_POST['message'];
	
	$mytitle = stripslashes($mytitle);
	$mymessage = stripslashes($mymessage);
	$mytitle = mysql_real_escape_string($mytitle);
	$mymessage = mysql_real_escape_string($mymessage);

	$nowFormat = date('Y-m-d H:i:s');
	
	$sql="INSERT INTO posts (title, message, datetime) VALUES ('$mytitle', '$mymessage', '$nowFormat')";
	mysql_query($sql);

	$sql="SELECT * FROM posts WHERE title = '$mytitle' AND message = '$mymessage'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	$sql=sprintf("INSERT INTO users_has_posts VALUES(%s,%s)", $_SESSION['userID'], $row['ID']);
	mysql_query($sql);

	
	
	header("location:home.php");

?>