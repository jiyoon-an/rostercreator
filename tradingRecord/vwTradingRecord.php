<?php
include '../resource/config.php';
include '../db/dbFunctions.php';
include '../common/commonFunctions.php';

if(session_status()!=PHP_SESSION_ACTIVE) session_start();
if(!isset($_SESSION['EmpID']) || !isset($_SESSION['Name'])) {
	echo "<meta http-equiv='refresh' content='0;url=login.php'>";
	exit;
}
$flag = $_GET['flag'];
$loanstatus = 'nprt';
$borrowstatus = 'nprt';
if($flag==1) {
	$target = $_GET['target'];
	if($target=='loan') {
		$loanstatus = $_GET['status'];
	}else if($target=='borrow') {
		$borrowstatus = $_GET['status'];
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
	<html lang="en" style="height:100%">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewprt" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/commonCSS.css" />
		<script type="text/javascript" src="../js/commonJS.js"></script>
	</head>
	<body style="height:95%;">
		<div>
			<div id="loan">
				<form name="frmLoan">
					<div id="listTitle"> Loan </div>
					<div style="text-align:right">
						<select id="loanStatus" style="font-family:Comic Sans MS" onchange="changeStatus('loan');">
							<?php
								//if($flag==0 || ($flag==1 && $target=='loan')) {
									if($loanstatus=='all') { echo '<option value="all" selected>All</option>';}
									else {	echo '<option value="all">All</option>';}
									if($loanstatus=='nprt') { echo '<option value="nprt" selected>Not Returned + Partially Returned</option>';}
									else {	echo '<option value="nprt">Not Returned + Partially Returned</option>';}
									if($loanstatus=='rt') { echo '<option value="rt" selected>Returned</option>';}
									else {	echo '<option value="rt">Returned</option>';}
									if($loanstatus=='nrt') { echo '<option value="nrt" selected>Not Returned</option>';}
									else {	echo '<option value="nrt">Not Returned</option>';}
									if($loanstatus=='prt') { echo '<option value="prt" selected>Partially Returned</option>';}
									else {	echo '<option value="prt">Partially Returned</option>';}
								//}
							?>
						</select>
					</div>
					<table style="table-layout:fixed;width:100%;min-width:520px;" >
						<tr height="32px" style="font-weight:bold; text-align:center; background:url(../img/title_bg.gif) repeat-x;">
							<td class="tbl_bL tbl_bT tbl_bB" width="20%">Category</td>
							<td class="tbl_bT tbl_bB" width="12%">Amount</td>
							<td class="tbl_bT tbl_bB" width="17%">Name</td>
							<td class="tbl_bT tbl_bB" width="25%">Branch</td>
							<td class="tbl_bT tbl_bB" width="15%">Date</td>
							<td class="tbl_bR tbl_bT tbl_bB" width="11%">Status</td>
						</tr>
						<?php
							$resultLoan = fnSelectLoanData();
							if(mysqli_num_rows($resultLoan)>0) {
								while($rowLoan = mysqli_fetch_array($resultLoan)){
						?>
						<tr class="tbl_bB" onmouseover="this.style.backgroundColor='#d4cfba'" onmouseout="this.style.backgroundColor='#e5e5e5'" style="background-color:#e5e5e5;cursor:pointer;" height="30px">
							<td align="center" width="20%" onclick="goRecordDetail('Loan', <?php echo $rowLoan[0]?>)"> <?php echo $rowLoan[1] ?></td>
							<td align="center" width="10%"onclick="goRecordDetail('Loan', <?php echo $rowLoan[0]?>)"> <?php echo $rowLoan[2] ?></td>
							<td width="20%" style="padding-left:5px;padding-right:5px;" onclick="goRecordDetail('Loan', <?php echo $rowLoan[0]?>)"> <?php echo $rowLoan[3] ?></td>
							<td width="25%" style="padding-left:5px;padding-right:5px;" onclick="goRecordDetail('Loan', <?php echo $rowLoan[0]?>)"> <?php echo $rowLoan[4] ?></td>
							<td align="center" width="15%"onclick="goRecordDetail('Loan', <?php echo $rowLoan[0]?>)">
							<?php
								$date = convertDatetoString($rowLoan[5], 'tradingRecord');
								echo $date;
							?></td>
							<td align="center" width="10%"onclick="goRecordDetail('Loan', <?php echo $rowLoan[0]?>)"> <?php echo convertStatus($rowLoan[6]) ?> </td>
						</tr>
						<?php
								}
							}else {
						?>
						<tr class="tbl_bB" style="background-color:#e5e5e5;cursor:pointer;" height="30px">
							<td align="center" colspan="6">No Loan Record</td>
						</tr>
						<?php
							}
						?>
					</table>
					<div style="text-align:right;padding-top:10px;">
						<input type="button" class="btn" value="Add Loan Record" onclick="addRecord('Loan');" />
						<!--<a href="addRecord.php?record=Loan"><img src="../img/btnLoan.png" alt="Add new Record" /></a>-->
					</div>
				</form>
			</div>
			<div id="borrow">
				<form name="frmBorrow">
					<div id="listTitle"> Borrow </div>
					<div style="text-align:right">
						<select id="borrowStatus" style="font-family:Comic Sans MS" onchange="changeStatus('borrow');">
							<?php
								//if($flag==0 || ($flag==1 && $target=='borrow')) {
									if($borrowstatus=='all') { echo '<option value="all" selected>All</option>';}
									else {	echo '<option value="all">All</option>';}
									if($borrowstatus=='nprt') { echo '<option value="nprt" selected>Not Returned + Partially Returned</option>';}
									else {	echo '<option value="nprt">Not Returned + Partially Returned</option>';}
									if($borrowstatus=='rt') { echo '<option value="rt" selected>Returned</option>';}
									else {	echo '<option value="rt">Returned</option>';}
									if($borrowstatus=='nrt') { echo '<option value="nrt" selected>Not Returned</option>';}
									else {	echo '<option value="nrt">Not Returned</option>';}
									if($borrowstatus=='prt') { echo '<option value="prt" selected>Partially Returned</option>';}
									else {	echo '<option value="prt">Partially Returned</option>';}
								//}
							?>
						</select>
					</div>
					<table style="table-layout:fixed;width:100%;min-width:520px" >
						<tr height="32px" style="font-weight:bold; text-align:center; background:url(../img/title_bg.gif) repeat-x;">
							<td class="tbl_bL tbl_bT tbl_bB" width="20%">Category</td>
							<td class="tbl_bT tbl_bB" width="12%">Amount</td>
							<td class="tbl_bT tbl_bB" width="17%">Name</td>
							<td class="tbl_bT tbl_bB" width="25%">Branch</td>
							<td class="tbl_bT tbl_bB" width="15%">Date</td>
							<td class="tbl_bR tbl_bT tbl_bB" width="11%">Status</td>
						</tr>
						<?php
							$resultBorrow = fnSelectBorrowData();
							if(mysqli_num_rows($resultBorrow)>0) {
								while($rowBorrow = mysqli_fetch_array($resultBorrow)) {
						?>
						<tr class="tbl_bB" onmouseover="this.style.backgroundColor='#d4cfba'" onmouseout="this.style.backgroundColor='#e5e5e5'" style="background-color:#e5e5e5;cursor:pointer;" height="30px">
							<td align="center" width="20%" onclick="goRecordDetail('Borrow', <?php echo $rowBorrow[0]?>)"> <?php echo $rowBorrow[1] ?></td>
							<td align="center" width="10%" onclick="goRecordDetail('Borrow', <?php echo $rowBorrow[0]?>)"> <?php echo $rowBorrow[2] ?></td>
							<td width="20%" style="padding-left:5px;padding-right:5px;" onclick="goRecordDetail('Borrow', <?php echo $rowBorrow[0]?>)"> <?php echo $rowBorrow[3] ?></td>
							<td width="25%" style="padding-left:5px;padding-right:5px;" onclick="goRecordDetail('Borrow', <?php echo $rowBorrow[0]?>)"> <?php echo $rowBorrow[4] ?></td>
							<td align="center" width="15%" onclick="goRecordDetail('Borrow', <?php echo $rowBorrow[0]?>)">
							<?php
								$date = convertDatetoString($rowBorrow[5], 'tradingRecord');
								echo $date;
							?>
							</td>
							<td align="center" width="10%" onclick="goRecordDetail('Borrow', <?php echo $rowBorrow[0]?>)"> <?php echo convertStatus($rowBorrow[6]) ?> </td>
						</tr>
						<?php
								} 
							}else {
						?>
						<tr class="tbl_bB" style="background-color:#e5e5e5;cursor:pointer;" height="30px">
							<td align="center" colspan="6">No Borrow Record</td>
						</tr>
						<?php
							}
						//$flag = 1;
						?>
					</table>
					<div style="text-align:right;padding-top:10px;">
						<input type="button" class="btn" value="Add Borrow Record" onclick="addRecord('Borrow');" />
						<!--<a href="addRecord.php?record=Borrow"><img src="../img/btnBorrow.png" alt="Add new Record" /></a>-->
					</div>
				</form>
			</div>
		</div>
	</body>
</html>