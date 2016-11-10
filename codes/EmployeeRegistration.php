<?php

include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{


	$eid = mysql_real_escape_string($_POST['eid']);
	$password = mysql_real_escape_string($_POST['password']);
	$fname = mysql_real_escape_string($_POST['fname']);
	$lname = mysql_real_escape_string($_POST['lname']);
	$address = mysql_real_escape_string($_POST['address']);
	$Phone = mysql_real_escape_string($_POST['phone']);
	$title = mysql_real_escape_string($_POST['title']);
	//employee will not insert the salary during registration, some of employee related to that will update.
	
	
//removing extra spaces
	$eid = trim($eid);
	$password = trim($password);
	$fname = trim($fname);
	$lname = trim($lname);
	$address = trim($address);
    $Phone = trim($Phone);
	$title = trim($title);

	// id exist or not
	$query = "SELECT eid FROM EMPLOYEE WHERE eid='$eid'";
	$result = mysql_query($query);

	$count = mysql_num_rows($result); // if id not found then register

	if($count == 0){

		if(mysql_query("INSERT INTO EMPLOYEE(eid,password,fname,lname,address,phone,jobtitle) VALUES('$eid','$password','$fname','$lname','$address','$Phone','$title')"))
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
			<script>alert('Sorry employee ID already taken ...');</script>
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
<td><input type="text" name="eid" placeholder="Employee ID" required /></td>
</tr>
<td><input type="password" name="password" placeholder="Your Password" required /></td>
<tr>
<td><input type="text" name="fname" placeholder="First Name" required /></td>
</tr>
<tr>
<td><input type="text" name="lname" placeholder="Last Name" required /></td>
</tr>
<td><input type="text" name="address" placeholder="Address" required /></td>
</tr>
<td><input type="phone" name="phone" placeholder="Phone" required /></td>
</tr>
<td><input type="text" name="title" placeholder="Title" required /></td>
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
