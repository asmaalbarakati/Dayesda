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
	
	//Get all the courses of this specific Trainee
	$query2 = "SELECT crname,yearofcom,grade,fname,lname FROM Course c, COMPLETION cm, Employee e WHERE cm.tid='$tid' and cm.crid=c.crid and c.eid=e.eid order by yearofcom";
	$result = mysql_query($query2);
	
	if(@mysql_num_rows($result) != 0){
		
	//Display the Report..	
	require("header.html");	
	echo("<br><br><br>")
?>
		<table  border="2" align="center" width="60%">
        <tr>
        <th>Course Name</th>
        <th>Year</th>
		<th>Grade</th>
		<th>Instructor Name</th>
        </tr>
		<?php
			while($record = mysql_fetch_array($result)){
			$name=$record[0];
			$y=$record[1];
			$g=$record[2];
			$fname=$record[3];
			$lname=$record[4];
		?>	
		<tr>
					<td><?php echo $name; ?></td> 
					<td><?php echo $y; ?></td> 
					<td><?php echo $g; ?></td> 
					<td><?php echo $fname." ".$lname; ?></td> 
					
		</tr>
<?php	
	 }//while
	}
	else{
			require("header.html");	
			echo ("<br><br><center><h2>Sorry, you did not enroll in any courses..</h2></center>");
		}
		
	echo ("<br><br><center><a id='butlink' href='Trainee.html'>Return to Trainee page</a></center>");
	echo ("<br><br>");	
}	
else
  echo "Error in Form";	
		
?>
