<?php
include('../session_dbinfo.php');
//From session
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];
$PhoneNo= $_SESSION['PhoneNo'];
$Level  = $_SESSION['Level'];

include('basicDataFetch.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en">
<head>
	<!--CSS -->
	<link rel="stylesheet" type="text/css" href="../css/worker.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewprt" content="width=device-width, initial-scale=1">

	<title>New Employee Register</title>
	<!-- java script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<!-- Install jQueryUI -->
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<!-- must be at last js file-->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

 	<style>
 	#myModal .modal-dialog  {width:33%;}
 	#setWorkingModal .modal-dialog  {width:510px;}
 	</style>
</head>
<body style="margin:8px;">
	<div class="container" style="font-family:Comic Sans MS">
		<h3>Enter Your Infomation and available time!</h3>
		<form role="form">
			<hr class="div_line">
		  	<table border="0" width="100%">
		  		<tr>
		  			<td style="PADDING-LEFT:7px; PADDING-RIGHT:7px;">
		  				<div class="form-group" style="width:150px;">
							<label for="Name">Name:</label>
					        <input type="text" class="form-control" id="Name" value='<? echo $Name ?>'>
							<!--
							<select class="form-control" id="user">
								<option>Amanda</option>
								<option>Lina</option>
								<option>Danial</option>
								<option>Lu</option>
							</select>
							-->
						</div>
		  			</td>
		  			<td style="PADDING-LEFT:7px; PADDING-RIGHT:7px;">
		  				<div class="form-group" style="width:150px;">
					      <label for="phone">Phone:</label>
					      <input type="text" class="form-control" id="phone" value='<? echo $PhoneNo ?>'>
					    </div>
		  			</td>
		  			<td style="PADDING-LEFT:7px; PADDING-RIGHT:7px;">
		  				<div class="form-group" style="width:150px;">
					      <label for="idval">ID:</label>
					      <input type="text" class="form-control" id="idval" value='<? echo $EmpID ?>'>
					    </div>
		  			</td>
		  			<td style="PADDING-LEFT:7px; PADDING-RIGHT:7px;">
		  				<div class="form-group" style="width:150px;">
					      <label for="pwd">Password:</label>
					      <input type="password" class="form-control" id="password">
					    </div>
		  			</td>
		  			<td style="PADDING-LEFT:7px; PADDING-RIGHT:7px;padding-top:16px";">
		  				<button type="button" class="btn btn-info" id="myBtn">New</button>
		  			</td>
		  		</tr>
		  	</table>

			<hr class="div_line">

			<table class="table table-bordered" style="background:rgb(243,242,236);" >
	    	<thead >
		      	<tr>
					<th style="text-align:center;font-size:1.5em;width:10%">No</th>
					<th style="text-align:center;font-size:1.5em;width:20%">weekDay</th>
					<th style="text-align:center;font-size:1.5em;width:5%">Y/N</th>
					<th style="text-align:center;font-size:1.5em;width:*%">Hours</th>
					<th style="text-align:center;font-size:1.5em;width:15%">Button</th>
		    	</tr>
	    	</thead>
	    	<tbody>
		    	<?php
					$sql = "SELECT Code, weekDay, concat('') as button, chkBox, concat(FromTime, ' ~ ', ToTime) as availableHours
							from (
							select A.Code, A.CodeName as weekDay
							     , coalesce(B.AvailableYn, 'N') AS chkBox
							     , coalesce(concat(substr(B.FromTime, 1, 2), '.',substr(B.FromTime, 3, 2)), '') as FromTime 
                                 , coalesce(concat(substr(B.ToTime, 1, 2), '.',substr(B.ToTime, 3, 2)), '') as ToTime
							 from tblCode A left join (select * from  tblEmpWorkingDay where EmpID ='$EmpID') B
							 on A.Code = B.DayNo
							 WHERE A.Category='002') hour
							 order by 1
							 "
							;


					/*
					$result = mysqli_query($connect,$sql)or die(mysqli_error($connect));
					while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    */
					$result = mysqli_query($connect,$sql);
					while($row = mysqli_fetch_array($result)){
						/*
						echo $row['Code'];   
						echo $row['weekDay'];    
						echo $row['chkBox'];       
						echo $row['availableHours'];
						
						$arrTbl[$i][0] = $row['Code'];
						$arrTbl[$i][1] = $row['chkBox']; 
						$arrTbl[$i][2] = $row['availableHours'];
						echo '<br>';						
						echo $arrTbl[$i][0]; 
						echo $arrTbl[$i][1]; 
						echo $arrTbl[$i][2]; 
						echo '<br>';		
						*/				    
		    	?>
		    	<tr>                   
		    		<td style='font-size:1.2em;text-align:center;'> <?php echo $row['Code'] ?></td>
		    		<td style='font-size:1.2em;text-align:left;'>   <?php echo $row['weekDay'] ?></td>		    															  
		    		<td style='font-size:1.2em;text-align:center;'> <?php echo $row['chkBox'] ?></td>
		    		<td style='font-size:1.2em;text-align:center;'> <?php echo $row['availableHours'] ?></td>
		    		<td style='font-size:1.2em;text-align:center;'> <span><button type='button' class="btn btn-warning" id="setDayBtn<?php echo $row['Code']?>" onClick="setWork(<? echo $row['Code']?>,$('#Name').val(),$('#idval').val())">Update</button></span></td>
		    			
		    	</tr>
		    	<?php
		    		}
		    	?>
	    	</tbody>
	    	</table>
		</form>

<!-- New Employee Insert Modal Area -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header"">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4><span class="glyphicon glyphicon-user"></span> New Employee</h4>
			</div>
			<div class="modal-body" style="padding:5px 20px;">
				<form action="saveNewEmp.php" class="form-horizontal" role="form" method="post" id="frmNewEmp">
			    	<div class="form-group">
						<label for="Name" class="col-sm-2 control-label">Name:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="Name" name="Name">
						</div>
					</div>
					<div class="form-group">
						<label for="phone" class="col-sm-2 control-label">Phone:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="phone" name="phone">
						</div>
					</div>
					<div class="form-group">
						<label for="id" class="col-sm-2 control-label">ID:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="id" name="id">
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-2 control-label">PW:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="password" name="password">
						</div>
					</div>
			    	<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-ok"></span>Save</button>
			  	</form>
			</div>
			<div class="modal-footer">				
	        	<div class="pull-right">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
				</div>
			</div>
		</div>
	</div>
</div> <!-- modal area End -->



<div class="modal fade" id="setWorkingModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<form action="updatePersonalTmTbl.php" class="form-inline" role="form" method="post" id="frmUpdateDt">
				<div class="modal-header"">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 id="idStr"></h4>
				</div>
				<div class="modal-body" style="padding:5px 20px;">
				
<input type="hidden" id="dayGb" name="dayGb" value="">
<!--
<input type="text" id="yesNo" value="">
<input type="text" id="tmStr" value="">
-->
			    	<div class="form-group">
						<label for="nm">Name:</label>
						<input type="text" class="form-control" style="width:120px" id="nm" readOnly>
					</div>
					<div class="form-group">
						<label for="idm"> ID:</label>
						<input type="text" class="form-control" style="width:120px" id="idm" name="idm" readOnly>
					</div>					
					<div class="form-group">
						<label> Available:</label>
						<select class="form-control" id="avblYn" name="avblYn"><option value="N">No</option><option value="Y">Yes</option></select>						
					</div>
					<div class="form-group">
						<h3>&nbsp;</h3>
					</div>
					<div class="form-group" id="tmSet">
						<select class="form-control" id="stTm" name="stTm" style="width:80px;" ><option value="">--</option>
							<?php
				            	foreach($tmCd as $tmList){ ?>
				        		<option value="<? echo $tmList[0]?> "><? echo $tmList[1] ?></option>
				            <?}?>
						</select>	
						<select class="form-control" id="stMn" name="stMn" style="width:80px;" ><option value="">--</option>
							<?php
				            	foreach($mnCd as $mnList){ ?>
				        		<option value="<? echo $mnList[0]?> "><? echo $mnList[1] ?></option>
				            <?}?>
						</select>
						~
						<select class="form-control" id="fnTm" name="fnTm" style="width:80px;" ><option value="">--</option>
							<?php
				            	foreach($tmCd as $tmList){ ?>
				        		<option value="<? echo $tmList[0]?> "><? echo $tmList[1] ?></option>
				            <?}?>
						</select>
						<select class="form-control" id="fnMn" name="fnMn" style="width:80px;" ><option value="">--</option>
							<?php
				            	foreach($mnCd as $mnList){ ?>
				        		<option value="<? echo $mnList[0]?> "><? echo $mnList[1] ?></option>
				            <?}?>
						</select>	
					</div>				
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
							
				</div>
			</form>
		</div>
	</div>
</div> <!-- modal area End -->


</div> <!-- container class End -->
<script type="text/javascript">
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
    $("#setDayBtn1").click(function(){
    	
    	$("#dayGb").val(1);
    	$("#yesNo").val('Y');
    	$("#tmStr").val('0800~0530');
        $("#setWorkingModal").modal();
    });
    $("#setDayBtn2").click(function(){
    	$("#dayGb").val(2);
        $("#setWorkingModal").modal();
    });
    $("#setDayBtn3").click(function(){
    	$("#dayGb").val(3);
        $("#setWorkingModal").modal();
    });
    $("#setDayBtn4").click(function(){
    	$("#dayGb").val(4);
        $("#setWorkingModal").modal();
    });
    $("#setDayBtn5").click(function(){
    	$("#dayGb").val(5);
        $("#setWorkingModal").modal();
    });
    $("#setDayBtn6").click(function(){
    	$("#dayGb").val(6);
        $("#setWorkingModal").modal();
    });
    $("#setDayBtn7").click(function(){
    	$("#dayGb").val(7);
        $("#setWorkingModal").modal();
    });
    
    $('#avblYn').on("change",function() {
    	//alert($(this).val());
    	var gb = $("#avblYn option:selected").val();
    	
    	if(gb=='Y'){
    		$('#stTm').removeAttr('disabled');
    		$('#stMn').removeAttr('disabled');
    		$('#fnTm').removeAttr('disabled');
    		$('#fnMn').removeAttr('disabled');
    	}
    	else{
			$("#stTm option:eq(0)").attr("selected", "selected");
			$("#stMn option:eq(0)").attr("selected", "selected");
			$("#fnTm option:eq(0)").attr("selected", "selected");
			$("#fnMn option:eq(0)").attr("selected", "selected");
    		$('#stTm').attr('disabled', 'disabled');
    		$('#stMn').attr('disabled', 'disabled');
    		$('#fnTm').attr('disabled', 'disabled');
    		$('#fnMn').attr('disabled', 'disabled');
    		
    	}
    	
    	
	});
});



function setWork(cd, nm, idVal){
	//alert(cd + nm + idVal + yn);

	var str="";
	if(cd=="1")      str="On Monday";
	else if(cd=="2") str="On Tuesday";
	else if(cd=="3") str="On Wendsday";
	else if(cd=="4") str="On Thursday";
	else if(cd=="5") str="On Friday";
	else if(cd=="6") str="On Saturday";
	else if(cd=="7") str="On Sunday";
	$('#idStr').html(str);
	$('#nm').val(nm);
	$('#idm').val(idVal);
	$("#avblYn option:eq(1)").attr("selected", "selected");
	
}
</script>

</body>
</html>