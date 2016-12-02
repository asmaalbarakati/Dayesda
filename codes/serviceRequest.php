<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start();
include_once 'dbconnect.php';

//check if the user is set or not..
if(!isset($_SESSION['user']))
{
	header("Location:home.html");
}

if(isset($_POST['request']))
{
	
    $oid = trim(mysql_real_escape_string($_SESSION['user']));
	$serChoice =trim(mysql_real_escape_string($_POST['service']));
	$today = date("Y.m.d"); 
	
	//insert into the request relation..
	$query = "INSERT INTO REQUEST(date,sid,oid) values('$today','$serChoice','$oid')";

	//execute the query and display error message for any error in execution.
	if( mysql_query($query)&& mysql_affected_rows()==1){	
		require("header.php");	
		echo ("<br><br><center><h2> your request is processing, we will contact you soon..</h2></center>");	
		echo ("<br><br><center><a id='butlink' href='organization.html'>Return to Organization page</a></center>");	
	}
	else{
		require("header.php");	
		echo ("<br><br><center><h2>Sorry.. Error is happened.. request the service again..</h2></center>");	
		echo ("<br><br><center><a id='butlink' href='organization.html'>Return to Organization page</a></center>");	
	}   
}     
else	
	echo "Error";	
		
?>
