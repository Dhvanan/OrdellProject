
<?php

require'connect.php';

$name=mysql_real_escape_string($_POST['name']);
$password=mysql_real_escape_string($_POST['password']);
$repassword=mysql_real_escape_string($_POST['repassword']);

if($password==$repassword && $password != "" &&  $name != "")
{
		
	$check_dublicate_id = mysql_query("select * from analytics.user where user_id='$name'");
	$var=mysql_fetch_array($check_dublicate_id );
	
	$testvar=$var['user_id'];
	
	if(!($testvar))
	{


		$res=mysql_query("INSERT INTO analytics.user (`user_id`, `password`) VALUES ('$name','$password')");	
								   
		if(!$res)
		{
			die("lid query:".mysql_error());
		}

		echo "<script type='text/javascript'>alert('Account created successfully!')</script>";
		echo "<script type='text/javascript'> window.location.href='main.html'</script>";
	}
	else
	{
		echo "<script type='text/javascript'>alert('Email-id already in use')</script>";
		echo "<script type='text/javascript'> window.location.href='main.html'</script>";
	}
}

else
{
	if($name=="")
	{
		echo "<script type='text/javascript'>alert('please enter the email-id')</script>";
	}
	if($password != $repassword || $password=="" || $repassword=="")
	{
		echo "<script type='text/javascript'>alert('Enter password correctly')</script>";
 	}
	echo "<script type='text/javascript'> window.location.href='main.html'</script>";
}
?>