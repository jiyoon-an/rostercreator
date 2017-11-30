<?php
include '../resource/config.php';
include '../db/dbFunctions.php';
include '../common/commonFunctions.php';

$Name   = $_SESSION['Name'];
$EmpID  = $_SESSION['EmpID'];
$flag = $_GET['flag'];
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
	<body>
		<div id="main" class="container-fluid">
			<div style="padding-bottom:30px;">
				<div id="listTitle"> Free Bulletin Board </div>	
				<?php
					$resultFreeBoard = fnSelectFreeBoardData();
					$count = mysqli_num_rows($resultFreeBoard);
				?>
				<div style="text-align:right;padding-right:20px;padding-bottom:10px;font-size:18px;font-weight:bold;">Total : <?php echo $count ?></div>
				<table style="table-layout:fixed;width:100%;" >
					<tr height="32px" style="font-weight:bold; text-align:center; background:url(../img/title_bg.gif) repeat-x;">
						<td class="tbl_bL tbl_bT tbl_bB" width="5%">no</td>
						<td class="tbl_bT tbl_bB" width="15%">Category</td>
						<td class="tbl_bT tbl_bB" width="45%">Title</td>
						<td class="tbl_bT tbl_bB" width="20%">Name</td>
						<td class="tbl_bT tbl_bB" width="10%">Date</td>
						<td class="tbl_bR tbl_bT tbl_bB" width="5%">Views</td>
					</tr>
					<?php
							$resultFreeBoard = fnSelectFreeBoardData();
							if(mysqli_num_rows($resultFreeBoard)>0) {
								$count = mysqli_num_rows($resultFreeBoard);
								while($rowFreeBoard = mysqli_fetch_array($resultFreeBoard)){
					?>
					<tr class="tbl_bB" onmouseover="this.style.backgroundColor='#d4cfba'" onmouseout="this.style.backgroundColor='#e5e5e5'" style="background-color:#e5e5e5;cursor:pointer;" height="30px">
						<td align="center" width="5%" onclick="goPostDetail(<?php echo $rowFreeBoard[0]?>, '<?php echo $rowFreeBoard[4]?>', <?php echo $rowFreeBoard[7]?>, '<?php echo $Name ?>', '<?php echo $EmpID ?>')"><?php echo $count--; ?></td>
						<td align="center" width="15%" onclick="goPostDetail(<?php echo $rowFreeBoard[0]?>, '<?php echo $rowFreeBoard[4]?>', <?php echo $rowFreeBoard[7]?>, '<?php echo $Name ?>', '<?php echo $EmpID ?>')"><?php echo $rowFreeBoard[1] ?></td>
						<td width="45%" style="padding-left:5px;padding-right:5px" onclick="goPostDetail(<?php echo $rowFreeBoard[0]?>, '<?php echo $rowFreeBoard[4]?>', <?php echo $rowFreeBoard[7]?>, '<?php echo $Name ?>', '<?php echo $EmpID ?>')"><?php setLockinTitle($rowFreeBoard[7], $rowFreeBoard[2], $rowFreeBoard[4], $Name); ?></td>
						<td width="20%" style="padding-left:5px;padding-right:5px" onclick="goPostDetail(<?php echo $rowFreeBoard[0]?>, '<?php echo $rowFreeBoard[4]?>', <?php echo $rowFreeBoard[7]?>, '<?php echo $Name ?>', '<?php echo $EmpID ?>')"><?php setLockinName($rowFreeBoard[7], $rowFreeBoard[4], $Name); ?></td>
						<td align="center" width="10%" onclick="goPostDetail(<?php echo $rowFreeBoard[0]?>, '<?php echo $rowFreeBoard[4]?>', <?php echo $rowFreeBoard[7]?>, '<?php echo $Name ?>', '<?php echo $EmpID ?>')">
						<?php
								$date = convertDatetoString($rowFreeBoard[5], 'freeBoard');
								echo $date;
							?>
						</td>
						<td align="center" width="5%" onclick="goPostDetail(<?php echo $rowFreeBoard[0]?>, '<?php echo $rowFreeBoard[4]?>', <?php echo $rowFreeBoard[7]?>, '<?php echo $Name ?>', '<?php echo $EmpID ?>')"><?php echo $rowFreeBoard[6] ?></td>
					</tr>
					<?php
								}
							}else {
					?>
					<tr class="tbl_bB" style="background-color:#e5e5e5;cursor:pointer;" height="30px">
						<td align="center" colspan="6">No Free Board Record</td>
					</tr>
					<?php
						}
					?>
				</table>
				<div align="right" style="padding:10px">
					<input type="button" class="btn" value="Write" onclick="addPost();" />
				</div>
			</div>
		</div>
	</body>
</html>