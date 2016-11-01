<?php

include_once 'dbconnect.php';

if(isset($_POST['delete']))
{

    $eid = trim(mysql_real_escape_string($_POST['eid']));
	$tid = trim(mysql_real_escape_string($_POST['tid']));
	$cid = trim(mysql_real_escape_string($_POST['cid']));
	$y = trim(mysql_real_escape_string($_POST['yr']));
	
	//check if the Employee already exist, and he is a manger..
	$query1 = "SELECT * FROM Employee WHERE eid='$eid' and (jobtitle='Manager' or jobtitle='CEO')";
	
	if(@mysql_num_rows(mysql_query($query1)) == 0){
		require("header.html");	
		echo ("<br><br><center><h2>Sorry.. this service can just be done by Manager..</h2></center>");
	}	
	else
	{
	
		//Delete the course according to the form input. 
		$query2 = "Delete FROM completion WHERE yearofcom=$y and crid='$cid' and tid='$tid'";
	
		if(mysql_query($query2) == true){
		
			//Display the Report..	
			require("header.html");	
			echo("<br><br><br>");
			echo ("<br><br><center><h2>Deleted Successfully..</h2></center>");		   
		}
		else
			echo ("<br><br><center><h2>No Course have been found with this information..</h2></center>");		
	}
}	
else
  echo "Error in Form";	
		
?>
