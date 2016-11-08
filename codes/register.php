<?php
session_start();
include_once 'dbconnect.php';

if(isset($_POST['reg']))
{
	if(isset($_POST['radiobutton'])){
		
	$val=$_POST["radiobutton"];
	
	if($val=="org"){
		require("header.html");
		echo ("<br><br><center><a href='OrganizationRegistration.php'>Register here</a></center>");
	}
	else if($val=="tra"){
		require("header.html");
		echo ("<br><br><center><a href='TraineeReqistration.php'>Register here</a></center>");
	}	
	else{
		require("header.html");
		echo ("<br><br><center><a href='EmployeeRegistration.php'>Register here</a></center>");
	}	
  }//end radiobutton options 	
}
else
	echo "Error";	
?>