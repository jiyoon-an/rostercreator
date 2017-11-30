<?php
	include '../resource/config.php';
	include '../db/dbFunctions.php';

	$mode = $_GET['mode'];
	
	if($mode == 'modify') {
		$number = $_GET['number'];
	}

	$category = $_GET['category'];
	$count = $_GET['count'];
	fnAddCategory($category, $count);

	if($mode=='write') {
?>
<meta http-equiv='refresh' content='0;url=addPost.php'>
<?php
	} else{
?>
<meta http-equiv='refresh' content='0;url=vwModifyPost.php?number=<?php echo $number?>'>
<?php
}
?>