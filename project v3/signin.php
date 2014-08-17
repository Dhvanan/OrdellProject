<?php

//connecting with the database
require 'connect.php';

//starting the session of the user
session_start();

//fetching data from form
$name=mysql_real_escape_string($_POST['name']);
$password=mysql_real_escape_string($_POST['password']);

//checking first whether name and password fields in the form are filled
if($name && $password)
{
	//quering the database
	$sql=mysql_query("SELECT * FROM analytics.user WHERE user_id='$name'");
	$result2 = mysql_fetch_array( $sql);
	
	
	//storing students password and email-id in variables              
	$pass=$result2['password'];
	$username=$result2['user_id'];
	
	//checking whether username matches with the user_id stored in the database 
	if($name==$username)
	{	
		//comparing user password stored in the database with the password entered by the user in the signup form
		if($pass==$password)
		{
			
			$_SESSION['password']=$pass;                                        //storing password in session global variable//
			$_SESSION['username']=$username;                                   //storing user_id in session global variable //
			//echo $_SESSION['password'];
			// echo"<a href='member.php'>click</a>";
			
			//call the user logged in page
			//include'loggedin.php';
			echo "<script type='text/javascript'> window.location.href='loggedin.php'</script>";
		}
		
		//displaying password incorrect message
		else 
		{
			echo "<script type='text/javascript'>alert('password incorrect')</script>";
			echo "<script type='text/javascript'> window.location.href='main.html'</script>";
		}
	}
	
	//displaying message if email id user entered is wrong or not registered
	else
		{
			echo "<script type='text/javascript'>alert('Email id you entered is wrong or you are not signed up for our site ')</script>";
			echo "<script type='text/javascript'> window.location.href='main.html'</script>";
		}
}

//displaying message if user didn't entered anything
else
{
	echo "<script type='text/javascript'>alert('Please enter both the fields')</script>";
	echo "<script type='text/javascript'> window.location.href='main.html'</script>";
}

?>