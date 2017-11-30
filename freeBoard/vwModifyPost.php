<?php
include '../resource/config.php';
include '../db/dbFunctions.php';
include '../common/commonFunctions.php';

$Name   = $_SESSION['Name'];   

if(isset($_GET['number'])){
	$number = $_GET['number'];
}
$flag = 1;			
$resultSet = fnSelectFreeBoardData();
$resultCategory = fnSelectFreeBoardCategory();
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
			<div align="center"><h1>Modify My Post</h1></div>
			<form method="post" action="updatePost.php">
				<input type="hidden" name="number" value="<?php echo $number?>" />
				<center>
					<?php
						while($rowDetail = mysqli_fetch_array($resultSet)){
					?>
					<table width="800px" style="padding-top:20px">
						<tr class="tbl_bottom" style="border-top:2px solid #ddd">
							<td class="tdForm" width="25%">Title</td>
							<td class="tdForm" colspan=3 width="75%"><input type="text" name="title" style="width:93%" class="inputFrm" value="<?php echo $rowDetail[2]; ?>"/></td>
						</tr>
						<tr class="tbl_bottom">
							<td class="tdForm" width="25%">Category</td>
							<td class="tdForm" width="30%">
								<select name="category" class="inputFrm">
								<?php
									while($rowCategory = mysqli_fetch_array($resultCategory)){
										if($rowCategory[0] == $rowDetail[1]) {
											echo "<option selected value='$rowCategory[0]'>$rowCategory[0]</option>";
										} else {
											echo "<option value='$rowCategory[0]'>$rowCategory[0]</option>";
										}

									}
								?>
								</select>
							</td>
							<?php
								$date = bringDate($rowDetail[5]);
								$month = bringMonth($rowDetail[5]);
								$year = bringYear($rowDetail[5]);
							?>
							<td class="tdForm" width="10%" style="text-align:right">Date</td>
							<td class="tdForm" width="35%">
								<select name="date" disabled class="inputFrm"><option selected value="<?php echo $date ?>"><?php echo $date ?></option></select>
								<select name="month" disabled class="inputFrm"><option selected value="<?php echo $month ?>"><?php echo $month ?></option></select>
								<select name="year" disabled class="inputFrm"><option selected value="<?php echo $year ?>"><?php echo $year ?></option></script>
								</select>
							</td>
						</tr>
						<tr class="tbl_bottom">
							<td class="tdForm" width="25%">Name</td>
							<td class="tdForm" width="30%"><input type="text" name="name" style="width:93%" value="<?php echo $rowDetail[4]; ?>" readonly="readonly" class="inputFrm"/></td>
							<td class="tdForm" width="10%" style="text-align:right;vertical-align:middle;padding-top:15px;">
							<?php
								if($rowDetail[7] == 1) {
									echo '<input type="checkbox" name="secret" id="secret" checked class="inputFrm" value="1"/>';
									echo '<label for="secret"></label>';
								} else {
									echo '<input type="checkbox" name="secret" id="secret" class="inputFrm" value="1"/>';
									echo '<label for="secret"></label>';
								}
							?>
							</td>
							<td class="tdForm" width="35%">Secret Mode</td>
						</tr>
						<tr>
							<td class="tdForm" width="25%">Message</td>
							<td class="tdForm" colspan=3 width="75%"><textarea name="detail" style="width:93%; height:300px;" wrap="physical" class="inputFrm"><?php echo $rowDetail[3]; ?></textarea></td>
						</tr>
						<tr>
							<td class="tdForm"></td>
							<td class="tdForm" colspan=3 style="text-align:center">
								<input type="submit" class="btn" value="OK" />
								<input type="button" class="btn" value="CANCEL" onclick="javascript:history.back();" />
							</td>
						</tr>
					</table>
					<?php
						}
					?>
				</center>
			</form>
		</div>
	</body>
</html>