<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start();
include_once 'dbconnect.php';

//check if the user is set or not..
if(!isset($_SESSION['user']))
{
	header("Location: home.html");
}

if(isset($_POST['enroll']))
{

    $tid =  trim(mysql_real_escape_string($_SESSION['user']));
	$crChoice = trim(mysql_real_escape_string($_POST['course']));
	$year = date("Y"); 
	$card = trim(mysql_real_escape_string($_POST["card"]));
	$add = trim(mysql_real_escape_string($_POST["address"]));
	$ct = trim(mysql_real_escape_string($_POST["cardtype"]));
	
	//check if the card already exist, if not insert into the payemtn relation first..
	$query1 = "SELECT * FROM PAYMENT WHERE cardnumber=$card";
    if(@mysql_num_rows(mysql_query($query1)) != 1){	//not exist	insert it..
		$query2 = "INSERT INTO PAYMENT(cardnumber,type,address) values('$card','$ct','$add')";
		$result = mysql_query($query2)
		or die (mysql_error());
	}
		
	//insert into the completion relation second..	
	$query3 = "INSERT INTO COMPLETION(yearofcom,crid,tid,cardnumber) values('$year','$crChoice','$tid','$card')";

	//check in case if trainee try to register in the same year.. or for any error in execution..
	if( mysql_query($query3)&& mysql_affected_rows()==1){	
		require("header.php");	
		echo ("<br><br><center><h2> You are registerd in the course.. See you soon..</h2></center>");	
		echo ("<br><br><center><a id='butlink' href='Trainee.html'>Return to Trainee page</a></center>");
	}
	else{
		require("header.php");	
		echo ("<br><br><center><h2>Sorry.. Error is happend..</h2></center>");	
		echo ("<br><br><center><a id='butlink' href='Trainee.html'>Return to Trainee page</a></center>");
	}
}	
else
	echo "Error";	
		
?>
