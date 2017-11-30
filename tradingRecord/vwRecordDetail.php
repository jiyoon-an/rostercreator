<?php
include '../resource/config.php';
include '../db/dbFunctions.php';
include '../common/commonFunctions.php';

$Name   = $_SESSION['Name'];      

if(isset($_GET['target'])){
	$target = $_GET['target'];
}
if(isset($_GET['number'])){
	$number = $_GET['number'];
}

$flag = 2;
			
if($target == 'Loan') {
	$resultSet = fnSelectLoanData();
} else if($target == 'Borrow') {
	$resultSet = fnSelectBorrowData();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
	<html lang="en" style="height:100%">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewprt" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/commonCSS.css">
		<script type="text/javascript" src="../js/commonJS.js"></script>
	</head>
	<body style="height:95%" onLoad="setDate(document.forms[0])">
		<div id="main">
			<div align="center"><h1><?php echo $target?> Record</h1></div>
			<form method="post" action="updateRecord.php?record=<?php echo $target?>">
				<input type="hidden" name="number" value="<?php echo $number ?>" />
				<center>
					<?php
						while($rowRecord = mysqli_fetch_array($resultSet)){
					?>
					<table width="600px" style="padding-top:20px">
						<tr class="tbl_bottom" style="border-top:2px solid #ddd">
							<td class="tdForm" width="30%">Category</td>
							<td class="tdForm" width="70%"><input type="text" name="category" style="width:98%" class="inputFrm" value="<?php echo $rowRecord[1] ?>"/></td>
						</tr>
						<tr class="tbl_bottom">
							<td class="tdForm" width="30%"><?php echo $target?> Amount</td>
							<td class="tdForm" width="70%"><input type="text" name="amount" style="width:98%" class="inputFrm" value="<?php echo $rowRecord[2] ?>"/></td>
						</tr>
						<tr class="tbl_bottom">
							<td class="tdForm" width="30%">Returned Amount</td>
							<td class="tdForm" width="70%"><input type="text" name="rtamount" style="width:98%" class="inputFrm" value="<?php echo $rowRecord[7] ?>"/></td>
						</tr>
						<tr class="tbl_bottom">
								<td class="tdForm" width="30%">Name</td>
							<td class="tdForm" width="70%"><input type="text" name="representative" style="width:98%" class="inputFrm" value="<?php echo $rowRecord[3] ?>" readonly="readonly"/></td>
						</tr>
						<tr class="tbl_bottom">
							<td class="tdForm" width="30%">Branch</td>
							<td class="tdForm" width="70%"><input type="text" name="branch" style="width:98%" class="inputFrm" value="<?php echo $rowRecord[4] ?>"/></td>
						</tr>
						<?php
							$date = bringDate($rowRecord[5]);
							$month = bringMonth($rowRecord[5]);
							$year = bringYear($rowRecord[5]);
						?>
						<tr class="tbl_bottom">
							<td class="tdForm" width="30%"><?php echo $target?> Date</td>
							<td class="tdForm" width="70%">
							<form name="abc">
								<select name="predate" disabled class="inputFrm"><option selected value="<?php echo $date ?>"><?php echo $date ?></option></select>
								<select name="premonth" disabled class="inputFrm"><option selected value="<?php echo $month ?>"><?php echo $month ?></option></select>
								<select name="preyear" disabled class="inputFrm"><option selected value="<?php echo $year ?>"><?php echo $year ?></option></script>
								</select>
								</form>
							</td>
						</tr>
						<tr class="tbl_bottom">
								<td class="tdForm" width="25%">Returned Date</td>
								<td class="tdForm" width="75%">
									<!--<form name="selectDate">-->
										<select name="date" class="inputFrm"></select>
										<select name="month" class="inputFrm" onChange="setDate(this.form, this.form.rtyear.value, this.value)"></select>
										<select name="year" class="inputFrm" onChange="setDate(this.form, this.value, this.form.rtmonth.value)"></script>
										</select>
									<!--</form>-->
								</td>
							</tr>
						<tr class="tbl_bottom">
							<td class="tdForm" width="30%">Status</td>
							<td class="tdForm" width="70%">
								<select name="status" class="inputFrm">
									<?php
										$arrStatus = array("Not Returned", "Partially Returned", "Returned");
										for($i=0; $i<3; $i++) {
											if($i == $rowRecord[6]) {
												echo "<option value='$i' selected>$arrStatus[$i]</option>";
											} else {
												echo "<option value='$i'>$arrStatus[$i]</option>";
											}
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td class="tdForm" width="30%">Description</td>
							<td class="tdForm" width="70%"><textarea name="detail" style="width:98%; height:100px;" wrap="physical" class="inputFrm" ><?php echo $rowRecord[8] ?></textarea></td>
						</tr>
						<tr>
							<td class="tdForm" colspan=2 style="text-align:center;padding-top:20px;">
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