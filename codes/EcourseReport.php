<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user'])!="")
{
	header("Location: home.html");
}

if(isset($_POST['get']))
{

    $eid = trim(mysql_real_escape_string($_SESSION['user']));
	
	//check if the Employee already exist, if not display error message, register first..
	$query1 = "SELECT * FROM Employee WHERE eid='$eid'";
	
	if(@mysql_num_rows(mysql_query($query1)) == 0){
		require("header.html");	
		echo ("<br><br><center><h2>Sorry.. your user name not found, you need to register first..</h2></center>");
	}	
	else
	{
	
		//Got all the courses that are teaching by this specific Employee
		$query2 = "SELECT crname FROM Course WHERE eid='$eid' order by crname ";
		$result = mysql_query($query2);
	
		if(@mysql_num_rows(mysql_query($query2)) != 0){
		
		//Display the Report..	
		require("header.html");	
		echo("<br><br><br>")
?>
		<table  border="2">
        <tr>
        <th>Course Name</th>
        </tr>
		<?php
			while($record = mysql_fetch_array($result)){
			$name=$record[0];
		?>	
		<tr>
					<td><?php echo $name; ?></td> 					
		</tr>
<?php	
	    }//while
		}
		else{
			require("header.html");	
			echo ("<br><br><center><h2>you don't not teach any courses..</h2></center>");
		}
	}
}	
else
  echo "Error in Form";	
		
?>
