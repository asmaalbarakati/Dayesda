<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
include_once 'dbconnect.php';
			
	require("header.html");
	$query = "SELECT cdescription FROM course";
	$result = mysql_query($query)
		or die (mysql_error());
	    
		echo("<br><br>");
		while($record = mysql_fetch_array($result)){
			echo ("<p>$record[0]</p> <br>");
		}	
		
?>