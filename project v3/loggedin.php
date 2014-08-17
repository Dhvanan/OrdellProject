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
	
	//include'main.html';
	echo "<script type='text/javascript'> window.location.href='main.html'</script>";
	die();
}

?>



<!DOCTYPE html>
<html>
<head>
<title>Video analytics</title>



<script type="text/javascript">

    var start_time;
    var curr_time;

	function loadVideo1(txt,videoname) 
	{
 		var d = new Date();
   	    var n = d.getHours();
        var m = d.getMinutes();
        start_time=n+m/100;
 		var video=document.getElementById("video");
 		video.src=txt;
 		video.load();
 		document.getElementById("videoname").innerHTML=videoname;
	}
</script>

<script>
	
	function ajaxfunction(review)
	{
		  var video = document.getElementById("video");
		  var d = new Date();
   	      var n = d.getHours();
          var m = d.getMinutes();
          curr_time=n+m/100;
          var time_diff = curr_time - start_time;
          var video_time=video.currentTime;
		  if (window.XMLHttpRequest) 
		  {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				var xmlhttp = new XMLHttpRequest();
		  } 
		 else 
		 {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		 }
		  
		   xmlhttp.onreadystatechange = function()
									  {
										  if (xmlhttp.readyState==4 && xmlhttp.status==200) 
										  {
											  document.getElementById("test").innerHTML=xmlhttp.responseText;
										  } 
									  }

          



		  
		  
		  var video_src = video.src;
		  var video_time = video.currentTime|0;
		  var secs =video_time%60;
		  
		  var mins= video_time/60;
		  mins = mins % 60 ;
		  mins = mins | 0;

		  hours = (video_time / 3600)|0;
		  
		  var time = hours*10000 + mins*100 + secs;
		  //document.getElementById("test").innerHTML = time;
		  var user_id = <?php session_start(); echo json_encode($_SESSION['username']); ?>;
		  
		  //document.getElementById("test1").innerHTML=document.getElementById("video").src;
		  //document.getElementById("test").innerHTML=user_id;
		 //document.getElementById("test2").innerHTML=video_time;
		  
		  
		  var querystring = "?review=" + review + "&video_src=" + video_src + "&user_id=" + user_id + "&video_time=" + time ;
		    
		   
		   
			
				//document.getElementById("test2").innerHTML=querystring;
		  xmlhttp.open("GET", "sendreview.php" + querystring, true);
		  xmlhttp.send(null);  
		  
		  
		  
	}
	

</script>


<style>
	div.container
	{
		width:100%;
		margin:0px;
		border:1px solid gray;
		line-height:170%;
	}
	
	div.header,div.footer
	{
		padding:0.5em;
		color:white;
		background-color:gray;
		clear:left;
	}

	h1.header
	{
		padding:0;
		margin:0;
	}

	div.left
	{
		float:left;
		width:400px;
		margin:0;
		padding:1em;
	}

	div.content
	{
		margin-left:1000px;
		border-left:1px solid gray;
		border-bottom:1px solid gray;
		padding:1em;
	}



</style>

</head>

<body>

	<div class="container">

		<div class="header">

			<h1 class="header">
				<div style="text-align:center;">
					Education video analytics dataset
				</div>
			</h1>
		</div>


		<div class="left">
			<h1 style="padding-left:100px;" id="videoname">
			</h1> 
			<div>
				<video id="video" width="500" style="padding-left:100px;" controls autoplay>
  					<source src="media/videos/Aladdin1.mp4" type="video/mp4">
  
  					Your browser does not support the video tag.
				</video>
			</div>

			<div style="clear:left; padding-left:100px; padding-top:50px;">
				<div id="poll">
					<form>
						<fieldset>
							<legend>Love to have your views</legend>
				
							<!--input type="radio" name="sex" value="interesting" onclick="ajaxfunction(this.value)">Interesting
							<br-->
							<input type="radio" name="sex" value="LIKE" onclick="ajaxfunction(this.value)">LIKE
							<br>
							<input type="radio" name="sex" value="OK" onclick="ajaxfunction(this.value)">OK
							<br>
							<input type="radio" name="sex" value="DISLIKE" onclick="ajaxfunction(this.value)">DISLIKE
							<br>
							<br>
							<!--input type="text" name="comment" placeholder="COMMENT"-->
							<br>
							<br>  
				
							<!--input type="button" onclick="ajaxFunction()" value="/-->

						</fieldset>
					</form>
				</div>
			</div><p id="test"></p><p id="test1"></p><p id="test2"></p>

		
		</div>

		<div class="content">
			<h2>recommedations</h2>
			<h3>English movies</h3>
			<div>
			<img src="media/images/GOT.jpg" id="video1Btn" onclick="loadVideo1('media/videos/S04E09.mp4','Aladdin')" value="Load Video 1" width="100"/>
			<br><br>
			<img src="media/images/tbbt.jpg" id="video2Btn" onclick="loadVideo1('media/videos/tbbt.mp4','Pursuit')" value="Load Video 2" width="100"/>
			<br>			
		</div>
	
    	
		
	

	
	</div>
		<div class="footer">Copyright 2014-2024 by Bromigos
		</div>


	</div>

</body>
</html>
