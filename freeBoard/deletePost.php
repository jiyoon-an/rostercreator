<?php
	include '../resource/config.php';
	include '../db/dbFunctions.php';
	
	$number = $_GET['number'];
	fnDeletePost($number);

?>
<meta http-equiv='refresh' content='0;url=vwFreeBoard.php?flag=0'>