<?php

if(isset($_POST["reg"]))
{
	if(isset($_POST['radiobutton'])){
		
	$val=$_POST["radiobutton"];
	
	if($val=="org"){
		require("header.html");	
		echo ("<br><br><center><h3>Welcome to Orgainzation Registeration</h3></center>");
		echo ("<br><br><center><a id='butlink' href='OrganizationRegistration.php'>Register here</a></center>");
	}
	else if($val=="tra"){
		require("header.html");
		echo ("<br><br><center><h3>Welcome to Trainee Registeration</h3></center>");		
		echo ("<br><br><center><a id='butlink' href='TraineeReqistration.php'>Register here</a></center>");
	}	
	else{
		require("header.html");	
		echo ("<br><br><center><h3>Welcome to Employee Registeration</h3></center>");
		echo ("<br><br><center><a id='butlink' href='EmployeeRegistration.php'>Register here</a></center>");
	}	
  }//end radiobutton options 	
}
else
	header("Location: home.html");
?>