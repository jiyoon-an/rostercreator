<?php
include '../resource/config.php';
include '../db/dbFunctions.php';
include '../common/commonFunctions.php';

$Name   = $_SESSION['Name'];   

if(isset($_GET['number'])){
	$number = $_GET['number'];
}
$flag=1;
$resultSet = fnSelectFreeBoardData();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
	<html lang="en" style="height:100%">
	<head>		
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewprt" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/commonCSS.css">
	</head>
	<body style="height:95%">
		<div id="main">
			<div style="padding-bottom:30px;">
				<div id="freeBoardTitle"> Free Bulletin Board </div>	
				<form method="post" action="updatePost.php">
					<input type="hidden" name="number" value="<?php echo $number?>" />
					<center>
						<?php
							while($rowDetail = mysqli_fetch_array($resultSet)){
								if($Name != $rowDetail[4]) {
									fnUpdateViews($rowDetail[0], $rowDetail[6]);
								}
						?>
						<table id="tblPostDetail">
							<tr class="tbl_bottom" style="border-top:2px solid #A6A6A6">
								<td class="tdForm" width="25%" style="text-align:center;">Title</td>
								<td class="tdForm" colspan=3 width="75%"><?php echo $rowDetail[2]; ?></td>
							</tr>
							<tr class="tbl_bottom">
								<td class="tdForm" width="25%" style="text-align:center">Category</td>
								<td class="tdForm" width="40%"><?php echo $rowDetail[1]?>
								</td>
								<?php
									/*$date = bringDate($rowDetail[5]);
									$month = bringMonth($rowDetail[5]);
									$year = bringYear($rowDetail[5]);*/
								?>
								<td class="tdForm" width="10%" style="text-align:center">Date</td>
								<td class="tdForm" width="25%"><?php /*echo $date."/".$month."/".$year*/ $date = convertDatetoString($rowDetail[5], 'freeBoard');echo $date ?></td>
							</tr>
							<tr class="tbl_bottom">
								<td class="tdForm" width="25%" style="text-align:center">Name</td>
								<td class="tdForm" width="40%"><?php echo $rowDetail[4]; ?></td>
								<td class="tdForm" width="10%" style="text-align:center">Views</td>
								<td class="tdForm" width="25%">
								<?php 
									if($Name != $rowDetail[4]) {
										echo $rowDetail[6]+1;
									} else {
										echo $rowDetail[6];
									}
								?>
								</td>
							</tr>
							<tr style="border-bottom:2px solid #A6A6A6">
								<td class="tdForm" width="25%" style="text-align:center">Message</td>
								<td class="tdForm" colspan=3 width="75%"><textarea name="detail" style="width:93%; height:300px;" readonly wrap="physical" class="inputFrm"><?php echo $rowDetail[3]; ?></textarea></td>
							</tr>
							<tr>
								<td class="tdForm" colspan=4 style="text-align:center;padding:20px;">
								<?php
									if($Name == $rowDetail[4]) {
								?>
									<input type="button" class="btn" value="MODIFY" onclick="location.href='vwModifyPost.php?number=<?php echo$rowDetail[0]?>'"/>
									<input type="button" class="btn" value="DELETE" onclick="location.href='deletePost.php?number=<?php echo $rowDetail[0] ?>'"/>
									<input type="button" class="btn" value="LIST" onclick="location.href='vwFreeBoard.php?flag=0'" />
								<?php
									} else {
								?>
									<input type="button" class="btn" value="LIST" onclick="location.href='vwFreeBoard.php?flag=0'" />
								<?php
									}
								?>
									
								</td>
							</tr>
						</table>
						<?php
							}
						?>
					</center>
				</form>
			</div>
		</div>
	</body>
</html>