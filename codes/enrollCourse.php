<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}

if(isset($_POST['enroll']))
{
    $tid = trim(mysql_real_escape_string($_POST['tid']));
	
	//check if the Trainee already exist, if not display error message, register first..
	$query1 = "SELECT * FROM Trainee WHERE tid='$tid'";
	
	if(@mysql_num_rows(mysql_query($query1))!= 1 ){
		require("header.html");	
		echo ("<br><br><center><h2>Sorry.. your user name not found, you need to register first..</h2></center>");
		echo ("<br><br><center><a href='TraineeReqistration.php'>Register here</a></center>");
	}	
	else
	{
    $tid = trim(mysql_real_escape_string($_POST['tid']));
	$crChoice = trim(mysql_real_escape_string($_POST['course']));
	$year = date("Y"); 
	$card = trim(mysql_real_escape_string($_POST["card"]));
	$add = trim(mysql_real_escape_string($_POST["address"]));
	$ct = trim(mysql_real_escape_string($_POST["cardtype"]));
	
	//check if the card already exist, if not insert into the payemtn relation first..
	$query2 = "SELECT * FROM PAYMENT WHERE cardnumber=$card";
    if(@mysql_num_rows(mysql_query($query2)) != 1){	//not exist	insert it..
	$query3 = "INSERT INTO PAYMENT(cardnumber,type,address) values('$card','$ct','$add')";
	$result = mysql_query($query3)
	or die (mysql_error());}
		
	//insert into the completion relation second..	
	$query4 = "INSERT INTO COMPLETION(yearofcom,crid,tid,cardnumber) values('$year','$crChoice','$tid','$card')";
	$result = mysql_query($query4)
		or die (mysql_error());	
		
	require("header.html");	
    echo ("<br><br><center><h2> You are registerd in the course.. Good Luck</h2></center>");	
	}
}	
else
	
echo "Error";	
		
?>
