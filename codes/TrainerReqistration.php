<?php

include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
	

	$tid = mysql_real_escape_string($_POST['tid']);
	$password = mysql_real_escape_string($_POST['password']);
	$phone = mysql_real_escape_string($_POST['phone']);
	$tfname = md5(mysql_real_escape_string($_POST['tfname']));
	$tlname = md5(mysql_real_escape_string($_POST['tlname']));

	$tid = trim($tid);
	$password = trim($password);
	$phone = trim($phone);
	$tfname = trim($tfname);
	$tlname = trim($tlname);

	// id exist or not
	$query = "SELECT tid FROM trainee WHERE tid='$tid'";
	$result = mysql_query($query);

	$count = mysql_num_rows($result); // if id not found then register

	if($count == 0){

		if(mysql_query("INSERT INTO trainee(tid,tfname,tlname,phone,password) VALUES('$tid','tfname','$tlname','$phone','password')"))
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
			<script>alert('Sorry ID already taken ...');</script>
			<?php
	}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="tid" placeholder="Trainer ID" required /></td>
</tr>
<td><input type="password" name="password" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><input type="phone" name="phone" placeholder="Your phone" required /></td>
</tr>
<tr>
<td><input type="text" name="tfname" placeholder="Your First Name" required /></td>
</tr>
<td><input type="text" name="tlname" placeholder="Your Last Name" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr>
<td><a href="login.php">Sign In Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
