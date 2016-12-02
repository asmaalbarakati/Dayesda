<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php

include_once 'dbconnect.php';
			
	require("header.html");
	$query = "SELECT crname,cdescription FROM COURSE";
	$result = mysql_query($query)
		or die (mysql_error());
	    
		echo("<br><br>");
		while($record = mysql_fetch_array($result)){
			echo ("<h4>$record[0]:</h4>");
			echo ("<p>$record[1]</p><br><hr><br>");
		}	
		
?>