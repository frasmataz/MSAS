<?php 
	session_start();
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password=""; // Mysql password
	$encryptedPassword="";
	$db_name="msas_schema"; // Database name 
	$tbl_name="users"; // Table name 
	$postID = $_GET['post'];
	$userID = $_SESSION['userID'];
	$userType = $_SESSION['userType'];

	// Connect to server and select databse.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");

	$nowFormat = date('Y-m-d H:i:s');
	
	if($userType == "advisor")
	{
	$sql= sprintf("DELETE FROM posts WHERE ID = %s", $postID);
	}
	else
	{
	$sql= sprintf("DELETE FROM posts WHERE ID = %s AND Users_ID = %s", $postID, $userID);
	}
	mysql_query($sql);

	header("location:home.php");
?>