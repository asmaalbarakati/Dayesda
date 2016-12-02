<?php
session_start();
include_once 'dbconnect.php';

//check if the user is set or not..
if(!isset($_SESSION['user']))
{
	header("Location: home.html");
}

if(isset($_POST['delete']))
{

    $eid = trim(mysql_real_escape_string($_SESSION['user']));
	$tid = trim(mysql_real_escape_string($_POST['tid']));
	$cid = trim(mysql_real_escape_string($_POST['cid']));
	$y = trim(mysql_real_escape_string($_POST['yr']));
	
	//check if the Employee already exist, and he is a manger..
	$query1 = "SELECT * FROM Employee WHERE eid='$eid' and (jobtitle='Manager' or jobtitle='CEO')";
	
	if(@mysql_num_rows(mysql_query($query1)) == 0){
		require("header.php");	
		echo ("<br><br><center><h2>Sorry.. this service can be done by Manager..</h2></center>");
	}	
	else
	{
	
		//Delete the course registration according to the form input. 
		$query2 = "Delete FROM completion WHERE yearofcom=$y and crid='$cid' and tid='$tid'";
	
		if(mysql_query($query2)&& mysql_affected_rows()==1){
		
			//Display the Report..	
			require("header.php");	
			echo("<br><br><br>");
			echo ("<br><br><center><h2>Deleted Successfully..</h2></center>");		   
		}
		else{
			require("header.php");	
			echo ("<br><br><center><h2>Sorry.. No record found with these information..</h2></center>");
		}		
	}
	echo ("<br><br><center><a id='butlink' href='employee.html'>Return to employee page</a></center>");	
}	
else
  echo "Error in Form";	
		
?>
