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
	$date = $_POST['date'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$detail = $_POST['detail'];
	$secret = $_POST['secret'];
}

if($secret != 1) {
	$secret = 0;
}

//temporary code to check variables
/*echo $title."<br>";
echo $category."<br>";
echo $name."<br>";
echo $date."<br>";
echo $month."<br>";
echo $year."<br>";
echo $detail."<br>";
echo $secret;
*/

fnInsertPost();
?>
<meta http-equiv='refresh' content='0;url=vwFreeBoard.php?flag=0'>