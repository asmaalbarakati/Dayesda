<?php

include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{


	$oid = mysql_real_escape_string($_POST['oid']);
	$password = mysql_real_escape_string($_POST['password']);
	$orgName = mysql_real_escape_string($_POST['orgName']);
	$sector = mysql_real_escape_string($_POST['sector']);
	$location = mysql_real_escape_string($_POST['location']);
	$phone = mysql_real_escape_string($_POST['phone']);
	
	
//removing extra spaces
	$oid = trim($oid);
	$password = trim($password);
	$orgName = trim($orgName);
	$sector = trim($sector);
	$location = trim($location);
    $phone = trim($phone);

	// id  exist or not
	$query = "SELECT oid FROM ORGANIZATION WHERE oid='$oid'";
	$result = mysql_query($query);

	$count = mysql_num_rows($result); // if id not found then register

	if($count == 0){

		if(mysql_query("INSERT INTO ORGANIZATION(oid,password,orgName,sector,location,phone) VALUES('$oid','$password','$orgName','$sector','$location','$phone')"))
		{
			?>
			<script>alert('successfully registered ');</script>
			<?php
		}
		else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php  echo mysql_error();
		}
	}
	else{
			?>
			<script>alert('Sorry Organization ID already taken ...');</script>
			<?php
	}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
<ul>
  <li><a class="active" href="home.html">Home</a></li>
  <li><a class="active" href="about.html">About</a></li>    
</ul>
<br><br><br>

<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="oid" placeholder="Organization ID" required /></td>
</tr>
<td><input type="password" name="password" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><input type="text" name="orgName" placeholder="Organization Name" required /></td>
</tr>
<tr>
<td><input type="text" name="sector" placeholder="Sector" required /></td>
</tr>
<td><input type="text" name="location" placeholder="Location" required /></td>
</tr>
<td><input type="phone" name="phone" placeholder="Phone" required /></td>
</tr>
<tr>
<td><input type="submit" name="btn-signup" value="Sign in"></input></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
