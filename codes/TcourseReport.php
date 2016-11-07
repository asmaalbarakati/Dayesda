<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: home.html");
}

if(isset($_POST['get']))
{

    $tid = trim(mysql_real_escape_string($_SESSION['user']));
	
		//Got all the courses of this specific Trainee
		$query2 = "SELECT crname,yearofcom,fname,lname FROM Trainee t,Course c, COMPLETION cm, Employee e WHERE t.tid='$tid' and t.tid=cm.tid and cm.crid=c.crid and c.eid=e.eid";
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
		<th>Instructor Name</th>
        </tr>
		<?php
			while($record = mysql_fetch_array($result)){
			$name=$record[0];
			$y=$record[1];
			$fname=$record[2];
			$lname=$record[3];
		?>	
		<tr>
					<td><?php echo $name; ?></td> 
					<td><?php echo $y; ?></td> 
					<td><?php echo $fname." ".$lname; ?></td> 
					
		</tr>
<?php	
	    }//while
		}
		else
			echo ("<br><br><center><h2>Sorry, you did not enrolled in any courses..</h2></center>");		
	
}	
else
  echo "Error in Form";	
		
?>
