<?php 
	session_start();
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password=""; // Mysql password
	$encryptedPassword="";
	$db_name="msas_schema"; // Database name 
	$tbl_name="users"; // Table name 

	// Connect to server and select databse.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");
	 
	$mymessage=$_POST['message'];
	
	$mymessage = stripslashes($mymessage);
	$mymessage = mysql_real_escape_string($mymessage);

	$nowFormat = date('Y-m-d H:i:s');
	
	if($_SESSION['userType'] == "student")
	{
		$IsFromAdvisor = 0;
	}
	else if ($_SESSION['userType'] == "advisor")
	{
		$IsFromAdvisor = 1;
	}
	else
	{
		die("Invalid user type.  Contact the developer about this!");
	}
	
	$sql= sprintf("INSERT INTO reply (message, datetime, IsFromAdvisor, Posts_ID) VALUES ('%s','%s','%s','%s')", $mymessage, $nowFormat, $IsFromAdvisor, $_GET['post']);
	$result = mysql_query($sql);
	
	if ($result)
	{
		echo "Post successful";
		header("location:home.php");
	}
	else
	{
		echo "Posting failed!  The database is probably offline or overloaded right now.  Please contact the admin if this continues!";
	}

	//header("location:home.php");
?>