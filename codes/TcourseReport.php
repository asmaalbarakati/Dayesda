<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php

include_once 'dbconnect.php';

if(isset($_POST['get']))
{

    $tid = trim(mysql_real_escape_string($_POST['tid']));
	
	//check if the trainee already exist, if not display error message, register first..
	$query1 = "SELECT * FROM Trainee WHERE tid='$tid'";
	
	if(@mysql_num_rows(mysql_query($query1)) == 0){
		require("header.html");	
		echo ("<br><br><center><h2>Sorry.. your user name not found, you need to register first..</h2></center>");
	}	
	else
	{
	
		//Got all the courses of this specific Trainee
		$query2 = "SELECT crname,yearofcom FROM Trainee t,Course c, COMPLETION cm WHERE t.tid='$tid' and t.tid=cm.tid and cm.crid=c.crid";
		$result = mysql_query($query2);
	
		if(@mysql_num_rows(mysql_query($query2)) != 0){
		
		//Display the Report..	
		require("header.html");	
		echo("<br><br><br>")
?>
		<table  border="2">
        <tr>
        <th>Course Name</th>
        <th>Year</th>
        </tr>
		<?php
			while($record = mysql_fetch_array($result)){
			$name=$record[0];
			$y=$record[1];
		?>	
		<tr>
					<td><?php echo $name; ?></td> 
					<td><?php echo $y; ?></td> 

					
		</tr>
<?php	
	    }//while
		}
		else
			echo ("<br><br><center><h2>Sorry, you did not enrolled in any courses..</h2></center>");		
	}
}	
else
  echo "Error in Form";	
		
?>