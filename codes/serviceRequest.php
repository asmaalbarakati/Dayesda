<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user'])!="")
{
	header("Location:home.html");
}

if(isset($_POST['request']))
{
	
	$oid = trim(mysql_real_escape_string($_SESSION['user']));
	
	//check if the Organization already exist, if not display error message, register first..
	$query1 = "SELECT * FROM organization WHERE oid='$oid'";
	
	if(@mysql_num_rows(mysql_query($query1))!= 1 ){
		require("header.html");	
		echo ("<br><br><center><h2>Sorry.. your user name not found, you need to register first..</h2></center>");
		echo ("<br><br><center><a href='OrganizationRegistration.php'>Register here</a></center>");
	}	
	else
	{

    $oid = trim(mysql_real_escape_string($_SESSION['user']));
	$oid = trim($oid);
	$serChoice = mysql_real_escape_string($_POST['service']);
	$serChoice = trim($serChoice);
	$today = date("Y.m.d"); 
	
	//insert into the request relation..
	$query = "INSERT INTO REQUEST(date,sid,oid) values('$today','$serChoice','$oid')";
	$result = mysql_query($query)
		or die (mysql_error());
		
	require("header.html");	
    echo ("<br><br><center><h2> your request is processing, we will contact you soon..</h2></center>");	
   }
}     
else
	
echo "Error";	
		
?>
