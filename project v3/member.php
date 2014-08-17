<?php


session_start();
error_reporting (E_ALL ^ E_NOTICE);
if($_SESSION['username'])
{
	echo "welcome!";
	echo $_SESSION['username'];
	echo "<a href='logout.php'>logout</a>";
}

else
{
	echo "<script type='text/javascript'>alert('you must be logged in first')</script>";
	echo "<script type='text/javascript'> window.location.href='main.html'</script>";
}


?>