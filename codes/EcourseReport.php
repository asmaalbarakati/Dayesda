<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start();
include_once 'dbconnect.php';

//check if the user is set or not..
if(!isset($_SESSION['user']))
{
	header("Location: home.html");
}

if(isset($_POST['get']))
{
    $eid = trim(mysql_real_escape_string($_SESSION['user']));
	
		//Got all the courses that are teaching by this specific Employee
		$query1= "SELECT c.crname, cm.yearofcom, count( * ) AS totaltrainees
		FROM Course c, completion cm
		WHERE c.eid = '$eid'
		AND cm.crid = c.crid
		GROUP BY c.crid, c.crname, cm.yearofcom
		ORDER BY cm.yearofcom";
		$result = mysql_query($query1);
	
		if(@mysql_num_rows($result) != 0){
		
		//Display the Report..	
		require("header.php");			
		echo("<br><br><br>")
?>
		<table  border="2" align="center" width="40%">
        <tr>
        <th>Course Name</th>
		<th>Year</th>
		<th>Total Trainees</th>
        </tr>
		<?php
			while($record = mysql_fetch_array($result)){
			$name=$record[0];
			$y=$record[1];
			$total=$record[2];
		?>	
		<tr>
			<td><?php echo $name; ?></td> 
			<td><?php echo $y; ?></td> 
			<td><?php echo $total; ?></td> 
		</tr>
<?php	
	    }//while
		}
		else{
			require("header.php");	
			echo ("<br><br><center><h2>you don't not teach any course..</h2></center>");
		}
		echo ("<br><br><center><a id='butlink' href='employee.html'>Return to employee page</a></center>");	
		echo ("<br><br>");	
}	
else
  echo "Error in Form";	
		
?>
