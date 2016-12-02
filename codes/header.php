<html>
<head>
<title>Dayesda-Company</title>
<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

<ul>
	<li><a class="active" href="home.html">Home</a></li>
	<li><a class="active" href="about.html">About</a></li> 
	<?php
	if(isset($_SESSION['user']))
		echo("<li><a href='logout.php'>Log Out</a></li>");  
	else	
		echo("<li><a href='login.html'>Log In</a></li>");  
	?>
</ul>

</body>
</html>