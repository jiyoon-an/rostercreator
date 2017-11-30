<?php
include '../resource/config.php';
$Name   = $_SESSION['Name'];   

if(isset($_GET['record'])){
	$record = $_GET['record'];
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
			<div align="center"><h1>Add New <?php echo $record?> Record</h1></div>
			<form method="post" action="insertRecord.php?record=<?php echo $record?>">
				<center>
					<table width="600px" style="padding-top:20px">
						<tr class="tbl_bottom" style="border-top:2px solid #ddd">
							<td class="tdForm" width="25%">Category</td>
							<td class="tdForm" width="75%"><input type="text" name="category" style="width:98%" class="inputFrm"/></td>
						</tr>
						<tr class="tbl_bottom">
							<td class="tdForm" width="25%">Amount</td>
							<td class="tdForm" width="75%"><input type="text" name="amount" style="width:98%" class="inputFrm"/></td>
						</tr>
						<tr class="tbl_bottom">
								<td class="tdForm" width="25%">Name</td>
							<td class="tdForm" width="75%"><input type="text" name="representative" style="width:98%" value="<?php echo $Name; ?>" readonly="readonly" class="inputFrm"/></td>
						</tr>
						<tr class="tbl_bottom">
							<td class="tdForm" width="25%">Branch</td>
							<td class="tdForm" width="75%"><input type="text" name="branch" style="width:98%" class="inputFrm"/></td>
						</tr>
						<tr class="tbl_bottom">
							<td class="tdForm" width="25%">Date</td>
							<td class="tdForm" width="75%">
								<form name="selectDate">
									<select name="date" class="inputFrm"></select>
									<select name="month" onChange="setDate(this.form, this.form.year.value, this.value)" class="inputFrm"></select>
									<select name="year" onChange="setDate(this.form, this.value, this.form.month.value)" class="inputFrm"></script>
									</select>
								</form>
							</td>
						</tr>
						<tr class="tbl_bottom">
							<td class="tdForm" width="25%">Status</td>
							<td class="tdForm" width="75%">
								<select name="status" disabled class="inputFrm">
									<option value="0" selected>Not Returned</option>
									<option value="1">Returned</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="tdForm" width="25%">Description</td>
							<td class="tdForm" width="75%"><textarea name="detail" style="width:98%; height:100px;" wrap="physical" class="inputFrm"></textarea></td>
						</tr>
						<tr>
							<td class="tdForm"></td>
							<td class="tdForm" style="text-align:center;padding-top:20px;">
								<input type="submit" class="btn" value="OK" />
								<input type="button" class="btn" value="CANCEL" onclick="javascript:history.back();" />
							</td>
						</tr>
					</table>
				</center>
			</form>
		</div>
	</body>
</html>