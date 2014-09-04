<?php

session_start();

session_destroy();

//header("location : main.html");

//include'main.html';

echo "<script type='text/javascript'> window.location.href='main.html'</script>";


?>