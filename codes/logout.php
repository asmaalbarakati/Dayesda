<?php
session_start();

if(!isset($_SESSION['user'])!="")
{
	header("Location: home.html");
}
else
{
	unset($_SESSION['user']);
	header("Location: home.html");
}
?>
