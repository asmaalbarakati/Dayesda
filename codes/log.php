<?php
session_start();
include_once 'dbconnect.php';

if(isset($_POST['logIn']))
{
	if(isset($_POST['radiobutton'])){
		
	$val=$_POST["radiobutton"];
	
	if($val=="org"){
		
		$oid = trim(mysql_real_escape_string($_POST['name']));
		$pw = trim(mysql_real_escape_string($_POST['pw']));
		
		//check if the Organization inforamation correct, if not display error message..
		$query1 = "SELECT * FROM organization WHERE oid='$oid' and password='$pw'";
	
	if(@mysql_num_rows(mysql_query($query1))!= 1 ){
		require("header.html");	
		echo ("<br><br><center><h2>Sorry.. your user name not found or incorrect password, log in again or register first..</h2></center>");
		echo ("<br><br><center><a href='login.html'>login</a></center>");
		echo ("<br><br><center><a href='OrganizationRegistration.php'>Register here</a></center>");
	}	
	else{
		$_SESSION['user'] = $oid;
		require("organization.html");	
	}}
	else if($val=="tra"){
		
		$tid = trim(mysql_real_escape_string($_POST['name']));
		$pw = trim(mysql_real_escape_string($_POST['pw']));
		
		//check if the Trainee information correct, if not display error message..
		$query1 = "SELECT * FROM Trainee WHERE tid='$tid' and password='$pw'";
	
	if(@mysql_num_rows(mysql_query($query1))!= 1 ){
		require("header.html");	
		echo ("<br><br><center><h2>Sorry.. your user name not found or incorrect password, log in again or register first..</h2></center>");
		echo ("<br><br><center><a href='login.html'>login</a></center>");
		echo ("<br><br><center><a href='TraineeReqistration.php'>Register here</a></center>");
	}	
	else{
		$_SESSION['user'] = $tid;
		require("Trainee.html");	
	}}
	else if($val=="emp"){
		
		$eid = trim(mysql_real_escape_string($_POST['name']));
		$pw = trim(mysql_real_escape_string($_POST['pw']));
		
		//check if the Trainee information correct, if not display error message..
		$query1 = "SELECT * FROM Employee WHERE eid='$eid' and password='$pw'";
	
	if(@mysql_num_rows(mysql_query($query1))!= 1 ){
		require("header.html");	
		echo ("<br><br><center><h2>Sorry.. your user name not found or incorrect password, log in again or register first..</h2></center>");
		echo ("<br><br><center><a href='login.html'>login</a></center>");
		echo ("<br><br><center><a href='EmployeeRegistration.php'>Register here</a></center>");
	}	
	else{
		$_SESSION['user'] = $eid;
		require("employee.html");
	}}
  }//end radiobutton options 	
}
else
	echo "Error";	
?>