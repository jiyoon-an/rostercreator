<?php
include '../resource/config.php';
include '../db/dbFunctions.php';

if(empty($_POST['title']) || empty($_POST['detail'])){
	if(empty($_POST['title'])) {
		echo "<script>alert('You have to write the title');history.back();</script>";
	} else if(empty($_POST['detail'])) {
		echo "<script>alert('You have to write message');history.back();</script>";
	}
	exit;
} else {
	$title = $_POST['title'];
	$category = $_POST['category'];
	$name= $_POST['name'];
	$detail = $_POST['detail'];
	if(empty($_POST['secret'])) {
		$secret = 0;
	} else {
		$secret = $_POST['secret'];
	}
	$number = $_POST['number'];
}

//to check variables
/*echo $title."<br>";
echo $category."<br>";
echo $name."<br>";
echo $detail."<br>";
echo $secret."<br>";
echo $number;*/


fnUpdatePost();

?>
<meta http-equiv='refresh' content='0;url=vwFreeBoard.php?flag=0'>