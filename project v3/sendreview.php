<?php

session_start();

error_reporting (E_ALL ^ E_NOTICE);
if($_SESSION['username'])
{
	require'connect.php';
	
	$review = $_GET['review'];
	$video_src = $_GET['video_src'];
	$user_id = $_GET['user_id'];
	$video_time = $_GET['video_time'];


	
	$review = mysql_real_escape_string($review);
	$video_src = mysql_real_escape_string($video_src);
	$user_id = mysql_real_escape_string($user_id);
	$video_time = mysql_real_escape_string($video_time);
	
	//$querystring =$review . $video_src .  $user_id .  $video_time ;
	//echo $querystring;
	
	$res = mysql_query("INSERT INTO analytics.reviews (`user_id`, `video_src`,`time`,`review`) VALUES ('$user_id','$video_src','$video_time','$review')");

	echo "Thats right bitch!";
}

else
{
	
	echo "<script type='text/javascript'>alert('you must be logged in first')</script>";
	
	//include'main.html';
	echo "<script type='text/javascript'> window.location.href='main.html'</script>";
	die();
}









?>