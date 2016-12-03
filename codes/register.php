<?php

if(isset($_POST["reg"]))
{
	if(isset($_POST['radiobutton'])){
		
	$val=$_POST["radiobutton"];
	
	if($val=="org"){
		require("header.php");	
		echo ("<br><br><center><h3>Welcome to Orgainzation Registration</h3></center>");
		echo ("<br><br><center><a id='butlink' href='OrganizationRegistration.php'>Register here</a></center>");
	}
	elseif($val=="tra"){
		require("header.php");
		echo ("<br><br><center><h3>Welcome to Trainee Registration</h3></center>");		
		echo ("<br><br><center><a id='butlink' href='TraineeReqistration.php'>Register here</a></center>");
	}	
	else{
		require("header.php");	
		echo ("<br><br><center><h3>Welcome to Employee Registration</h3></center>");
		echo ("<br><br><center><a id='butlink' href='EmployeeRegistration.php'>Register here</a></center>");
	}	
  }//end radiobutton options 	
}
else
	header("Location: home.html");
?>