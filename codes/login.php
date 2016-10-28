<?php

//include_once 'dbconnect.php';
if(isset($_POST['btn-login']))
{
	$name = mysql_real_escape_string($_POST['name']);
	$password = mysql_real_escape_string($_POST['pw']);

	$name = trim($email);
	$password = trim($password);

	//$res=mysql_query("SELECT user_id, user_name, user_pass FROM users WHERE user_email='$email'");
	$res=mysql_query("SELECT * FROM trainee WHERE tid='$name' && password='$password '");
	$row=mysql_fetch_array($res);

	$count = mysql_num_rows($res); // if name/pass correct it returns must be 1 row

	if($count == 1 && $row['password']==md5($password))
	{
		$_SESSION['user'] = $row['fName'];
		header("Location: ../trainee.php");
	}
	else
	{
		?>
        <script>alert('Username / Password Seems Wrong !');</script>
        <?php
	}

}
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> </script>
<script type="text/javascript">
 function idForm(){
   var selectvalue = $('input[name=choice]:checked', '#idForm').val();


if(selectvalue == "org"){
window.open('organization.php','_self');
return true;
}
else if(selectvalue == "tra"){
window.open('trainee.php','_self');
return true;
}else if(selectvalue == 'emp'){
window.open('employee.php','_self');
return true;
}
return false;
};


</script>
<title>Dayesda-Company</title>
<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

<ul>
  <li><a class="active" href="home.html">Home</a></li>
</ul>

<br><br><br>
<div>
	<form id="idForm">
		Name:<br>
	    <input type="text" id="name" name="name" ></input><br><br>
		Password:<br>
		<input type="text" id="pw" name="pw" ></input><br><br>
		Are you:<br>
		<input type="radio" name="radiobutton" value="org">Organization</input><br>
		<input type="radio" name="radiobutton" value="tra">Trainer</input><br>
        <input type="radio" name="radiobutton" value="emp">Employee</input><br><br>
		<input type="submit" value="logIn" ></input>
	</form>
</div>
</body>
</html>