<?php
include '../resource/config.php';
include '../db/dbFunctions.php';
$Name   = $_SESSION['Name'];   
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
	<?php
		$resultCategory = fnSelectFreeBoardCategory();
		$count = mysqli_num_rows($resultCategory);
	?>
		<div id="main" class="container-fluid">
			<div align="center"><h1>Write New Post</h1></div>
			<form method="post" action="insertPost.php">
				<center>
					<table width="800px" style="padding-top:20px">
						<tr class="tbl_bottom" style="border-top:2px solid #ddd">
							<td class="tdForm" width="25%">Title</td>
							<td class="tdForm" colspan=3 width="75%"><input type="text" name="title" style="width:93%" class="inputFrm"/></td>
						</tr>
						<tr class="tbl_bottom">
							<td class="tdForm" width="25%">Category</td>
							<td class="tdForm" width="30%">
								<select name="category" id="category" class="inputFrm" onchange="addCategory(<?php echo $count ?>);">
								<?php
									while($rowCategory = mysqli_fetch_array($resultCategory)){
										echo "<option value='$rowCategory[0]'>$rowCategory[0]</option>";
									}
								?>
									<option value="addCategory">Add New Category..</option>
								</select>
							</td>
							<td class="tdForm" width="10%" style="text-align:right">Date</td>
							<td class="tdForm" width="35%">
								<form name="selectDate">
									<select name="date" class="inputFrm"></select>
									<select name="month" class="inputFrm" onChange="setDate(this.form, this.form.year.value, this.value)"></select>
									<select name="year" class="inputFrm" onChange="setDate(this.form, this.value, this.form.month.value)"></script>
									</select>
								</form>
							</td>
						</tr>
						<tr class="tbl_bottom">
							<td class="tdForm" width="25%">Name</td>
							<td class="tdForm" width="30%"><input type="text" name="name" style="width:93%" value="<?php echo $Name; ?>" readonly="readonly" class="inputFrm"/></td>
							<td class="tdForm" width="10%" style="text-align:right;vertical-align:middle;padding-top:15px;">
								<input type="checkbox" name="secret" id="secret" class="inputFrm" value="1"/>
								<label for="secret"></label>
							</td>
							<td class="tdForm" width="35%">Secret Mode</td>
						</tr>
						<tr>
							<td class="tdForm" rowspan=2 width="25%">Message</td>
							<!--<td colspan=3 width="75%"><input type="file" name="addFile"></td>-->
							<td class="tdForm" colspan=3 width="75%"><textarea name="detail" style="width:93%; height:300px;" wrap="physical" class="inputFrm"></textarea></td>
						</tr>
						<!--<tr>
							<td colspan=3 width="75%">
								<div contentEditable="true" style="background-color:#fff;">
									
								</div>
							</td>
						</tr>-->
						<tr>
							<td class="tdForm" colspan=4 style="text-align:center">
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