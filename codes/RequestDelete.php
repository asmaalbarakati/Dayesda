<?php
session_start();
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}

if(isset($_POST['delete']))
{

    $eid = trim(mysql_real_escape_string($_POST['eid']));
	$rn = intval(trim(mysql_real_escape_string($_POST['RN'])));
	
	//check if the Employee already exist, and he is a manger..
	$query1 = "SELECT * FROM Employee WHERE eid='$eid' and (jobtitle='Manager' or jobtitle='CEO')";
	
	if(@mysql_num_rows(mysql_query($query1)) == 0){
		require("header.html");	
		echo ("<br><br><center><h2>Sorry.. this service can just be done by Manager..</h2></center>");
	}	
	else
	{
	
		//Delete the rquest according to the number. 
		$query2 = "Delete FROM request WHERE reqnumber=$rn";
	
		if(mysql_query($query2) == true){
		
			//Display the Report..	
			require("header.html");	
			echo("<br><br><br>");
			echo ("<br><br><center><h2>Deleted the Request -# ".$rn." - Successfully..</h2></center>");		   
		}
		else
			echo ("<br><br><center><h2>No request have been found with this number..</h2></center>");		
	}
}	
else
  echo "Error in Form";	
		
?>
