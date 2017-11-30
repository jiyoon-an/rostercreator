<?php
include('../session_dbinfo.php');
//From session
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];
$PhoneNo= $_SESSION['PhoneNo'];
$Level  = $_SESSION['Level'];


//fetch Date Infomation
include('newRosterInfo.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en">
<head>
	<!--CSS -->
	<link rel="stylesheet" type="text/css" href="../css/worker.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewprt" content="width=device-width, initial-scale=1">

	<title>Creating new Next</title>
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
 	#newRoster .form-inline {width:95%;}
 	#btnCreateTbl {margin-top: 25px}
 	
 	select.input-sm{
    	width:24px;
    	display:inline;
    	padding:3px 3px;
    	-webkit-appearance:none;
    }
 	</style> 
 	 	
	<script>
	function showEmps(dtSeq, tmSeq, inId) {   
		alert(inId);
		$document.getElementById("wk11nm").innerHTML= "<select class='form-control' style='margin-top:5px;width:126px;'><option>--</option><option value='01'>Amanda</option><option value='02'>Misun</option><option value='03'>Tony</option></select>"; 
		//document.getElementById("wk11nm").innerHTML = "<option value='01'>Amanda</option><option value='02'>Misun</option><option value='03'>Tony</option>"; 
		/*
	    if (str == "") {
	        document.getElementById("txtHint").innerHTML = "";
	        return;
	    } else { 
	        if (window.XMLHttpRequest) {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } else {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange = function() {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
	            }
	        };
	        xmlhttp.open("GET","getuser.php?q="+str,true);
	        xmlhttp.send();
	    }   
	    */
	}
	</script>

</head>

<body style="margin:8px;">
	
	<form role="form" id="newRoster" action="createDefaultNewRoster.php" method="post" >
		
	<input type="hidden" id='StDt' name='StDt' value='<?php echo $StDt ?>' />
	<input type="hidden" id='FnDt' name='FnDt' value='<?php echo $FnDt ?>' />	
	<input type="hidden" id='Mon'  name='Mon'  value='<?php echo $Mon  ?>' />
	<input type="hidden" id='Tue'  name='Tue'  value='<?php echo $Tue  ?>' />
	<input type="hidden" id='Wed'  name='Wed'  value='<?php echo $Wed  ?>' />
	<input type="hidden" id='Thr'  name='Thr'  value='<?php echo $Thr  ?>' />
	<input type="hidden" id='Fri'  name='Fri'  value='<?php echo $Fri  ?>' />
	<input type="hidden" id='Sat'  name='Sat'  value='<?php echo $Sat  ?>' />
	<input type="hidden" id='Sun'  name='Sun'  value='<?php echo $Sun  ?>' />
	
	<div class="container" style="font-family:Comic Sans MS">
		<h3>Create New Roster for Next week!</h3>
		<hr class="div_line">
		<div class='col-md-3'>
		    <div class="form-group">
		    	<label for="StDt">Start Date:</label>
		        <div class='input-group date' id='datetimepicker6' style="width:200px">
		            <input type='text' class="form-control" id="StDt"  value='<?php echo $tStDt?>' disabled/>
		            <span class="input-group-addon">
		                <span class="glyphicon glyphicon-calendar"></span>
		            </span>
		        </div>
		    </div>
		</div>
		
		<div class='col-md-3'>
		    <div class="form-group">
		    	<label for="FnDt">Up To Date:</label>
		        <div class='input-group date' id='datetimepicker7' style="width:200px">
		            <input type='text' class="form-control" di="FnDt" value='<?php echo $tFnDt?>' disabled/>
		            <span class="input-group-addon">
		                <span class="glyphicon glyphicon-calendar"></span>
		            </span>
		        </div>
		    </div>		   
		</div>
		<div class='col-sm-3' >
			 <button type="submit" class="btn btn-success" id="btnCreateTbl">Default Create Table</button>
		</div>
		<br>
		<h2>&nbsp;</h2>		
		
		<hr class="div_line">

		<table class="table table-bordered" style="background:rgb(243,242,236);" >
	    	<thead >		      	
		      	<tr>
					<th style="text-align:center;font-size:1.0em;width:10px;"></th>
					<th style="text-align:center;font-size:1.0em;">Mon<br>(<?php echo $tMon ?>)</th>
					<th style="text-align:center;font-size:1.0em;">Tue<br>(<?php echo $tTue ?>)</th>
					<th style="text-align:center;font-size:1.0em;">Wed<br>(<?php echo $tWed ?>)</th>
					<th style="text-align:center;font-size:1.0em;">Thu<br>(<?php echo $tThr ?>)</th>
					<th style="text-align:center;font-size:1.0em;">Fri<br>(<?php echo $tFri ?>)</th>
					<th style="text-align:center;font-size:1.0em;" bgcolor="#ffeb99">Sat<br>(<?php echo $tSat ?>)</th>
					<th style="text-align:center;font-size:1.0em;" bgcolor="#ffeb99">Sun<br>(<?php echo $tSun ?>)</th>
		    	</tr>
	    	</thead>
	    	<tbody>
	    		<!-- Start of 1 seq  -->
	    		<tr>
	    			<td>1</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" name="st11tm" onchange="showEmps(1,1,'wk11nm')"><?=getSlct($tmCd, $dfTmSetArr[1][1]); ?></select>
	    				<select class="form-control input-sm" name="st11mn" onchange="showEmps(1,1,'wk11nm')"><?=getSlct($mnCd, $dfTmSetArr[1][2]); ?></select> ~
	    				<select class="form-control input-sm" name="fn11tm" onchange="showEmps(1,1,'wk11nm')"><?=getSlct($tmCd, $dfTmSetArr[1][3]); ?></select>
	    				<select class="form-control input-sm" name="fn11mn" onchange="showEmps(1,1,'wk11nm')"><?=getSlct($mnCd, $dfTmSetArr[1][4]); ?></select><br>
	    				<div id="wk11nm"></span>
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st21tm"><?=getSlct($tmCd, $dfTmSetArr[7][1]); ?></select>
	    				<select class="form-control input-sm" id="st21mn"><?=getSlct($mnCd, $dfTmSetArr[7][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn21tm"><?=getSlct($tmCd, $dfTmSetArr[7][3]); ?></select>
	    				<select class="form-control input-sm" id="fn21mn"><?=getSlct($mnCd, $dfTmSetArr[7][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk21nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st31tm"><?=getSlct($tmCd, $dfTmSetArr[13][1]); ?></select>
	    				<select class="form-control input-sm" id="st31mn"><?=getSlct($mnCd, $dfTmSetArr[13][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn31tm"><?=getSlct($tmCd, $dfTmSetArr[13][3]); ?></select>
	    				<select class="form-control input-sm" id="fn31mn"><?=getSlct($mnCd, $dfTmSetArr[13][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk31nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st41tm"><?=getSlct($tmCd, $dfTmSetArr[19][1]); ?></select>
	    				<select class="form-control input-sm" id="st41mn"><?=getSlct($mnCd, $dfTmSetArr[19][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn41tm"><?=getSlct($tmCd, $dfTmSetArr[19][3]); ?></select>
	    				<select class="form-control input-sm" id="fn41mn"><?=getSlct($mnCd, $dfTmSetArr[19][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk41nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st51tm"><?=getSlct($tmCd, $dfTmSetArr[25][1]); ?></select>
	    				<select class="form-control input-sm" id="st51mn"><?=getSlct($mnCd, $dfTmSetArr[25][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn51tm"><?=getSlct($tmCd, $dfTmSetArr[25][3]); ?></select>
	    				<select class="form-control input-sm" id="fn51mn"><?=getSlct($mnCd, $dfTmSetArr[25][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk51nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st61tm"><?=getSlct($tmCd, $dfTmSetArr[31][1]); ?></select>
	    				<select class="form-control input-sm" id="st61mn"><?=getSlct($mnCd, $dfTmSetArr[31][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn61tm"><?=getSlct($tmCd, $dfTmSetArr[31][3]); ?></select>
	    				<select class="form-control input-sm" id="fn61mn"><?=getSlct($mnCd, $dfTmSetArr[31][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk61nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st71tm"><?=getSlct($tmCd, $dfTmSetArr[37][1]); ?></select>
	    				<select class="form-control input-sm" id="st71mn"><?=getSlct($mnCd, $dfTmSetArr[37][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn71tm"><?=getSlct($tmCd, $dfTmSetArr[37][3]); ?></select>
	    				<select class="form-control input-sm" id="fn71mn"><?=getSlct($mnCd, $dfTmSetArr[37][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk71nm"><option>--</option></select>	   	    				
	    			</td>
	    		</tr>
	    		<!-- End of 1 seq -->	
	    		<!-- Start of 2 seq  -->
	    		<tr>                
	    			<td>2</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st12tm"><?=getSlct($tmCd, $dfTmSetArr[2][1]); ?></select>
	    				<select class="form-control input-sm" id="st12mn"><?=getSlct($mnCd, $dfTmSetArr[2][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn12tm"><?=getSlct($tmCd, $dfTmSetArr[2][3]); ?></select>
	    				<select class="form-control input-sm" id="fn12mn"><?=getSlct($mnCd, $dfTmSetArr[2][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk12nm">
	    					<option>--</option><option>Tony</option><option>Misun</option><option>Amanda</option>
	    				</select>
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st22tm"><?=getSlct($tmCd, $dfTmSetArr[8][1]); ?></select>
	    				<select class="form-control input-sm" id="st22mn"><?=getSlct($mnCd, $dfTmSetArr[8][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn22tm"><?=getSlct($tmCd, $dfTmSetArr[8][3]); ?></select>
	    				<select class="form-control input-sm" id="fn22mn"><?=getSlct($mnCd, $dfTmSetArr[8][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk22nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st32tm"><?=getSlct($tmCd, $dfTmSetArr[14][1]); ?></select>
	    				<select class="form-control input-sm" id="st32mn"><?=getSlct($mnCd, $dfTmSetArr[14][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn32tm"><?=getSlct($tmCd, $dfTmSetArr[14][3]); ?></select>
	    				<select class="form-control input-sm" id="fn32mn"><?=getSlct($mnCd, $dfTmSetArr[14][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk32nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st42tm"><?=getSlct($tmCd, $dfTmSetArr[20][1]); ?></select>
	    				<select class="form-control input-sm" id="st42mn"><?=getSlct($mnCd, $dfTmSetArr[20][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn42tm"><?=getSlct($tmCd, $dfTmSetArr[20][3]); ?></select>
	    				<select class="form-control input-sm" id="fn42mn"><?=getSlct($mnCd, $dfTmSetArr[20][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk42nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st52tm"><?=getSlct($tmCd, $dfTmSetArr[26][1]); ?></select>
	    				<select class="form-control input-sm" id="st52mn"><?=getSlct($mnCd, $dfTmSetArr[26][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn52tm"><?=getSlct($tmCd, $dfTmSetArr[26][3]); ?></select>
	    				<select class="form-control input-sm" id="fn52mn"><?=getSlct($mnCd, $dfTmSetArr[26][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk52nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st62tm"><?=getSlct($tmCd, $dfTmSetArr[32][1]); ?></select>
	    				<select class="form-control input-sm" id="st62mn"><?=getSlct($mnCd, $dfTmSetArr[32][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn62tm"><?=getSlct($tmCd, $dfTmSetArr[32][3]); ?></select>
	    				<select class="form-control input-sm" id="fn62mn"><?=getSlct($mnCd, $dfTmSetArr[32][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk62nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st72tm"><?=getSlct($tmCd, $dfTmSetArr[38][1]); ?></select>
	    				<select class="form-control input-sm" id="st72mn"><?=getSlct($mnCd, $dfTmSetArr[38][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn72tm"><?=getSlct($tmCd, $dfTmSetArr[38][3]); ?></select>
	    				<select class="form-control input-sm" id="fn72mn"><?=getSlct($mnCd, $dfTmSetArr[38][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk72nm"><option>--</option></select>	   	    				
	    			</td>
	    		</tr>
	    		<!-- End of 2 seq -->	    		
	    		<!-- Start of 3 seq  -->
	    		<tr>
	    			<td>3</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st13tm"><?=getSlct($tmCd, $dfTmSetArr[3][1]); ?></select>
	    				<select class="form-control input-sm" id="st13mn"><?=getSlct($mnCd, $dfTmSetArr[3][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn13tm"><?=getSlct($tmCd, $dfTmSetArr[3][3]); ?></select>
	    				<select class="form-control input-sm" id="fn13mn"><?=getSlct($mnCd, $dfTmSetArr[3][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk13nm"><option>--</option></select>
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st23tm"><?=getSlct($tmCd, $dfTmSetArr[9][1]); ?></select>
	    				<select class="form-control input-sm" id="st23mn"><?=getSlct($mnCd, $dfTmSetArr[9][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn23tm"><?=getSlct($tmCd, $dfTmSetArr[9][3]); ?></select>
	    				<select class="form-control input-sm" id="fn23mn"><?=getSlct($mnCd, $dfTmSetArr[9][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk23nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st33tm"><?=getSlct($tmCd, $dfTmSetArr[15][1]); ?></select>
	    				<select class="form-control input-sm" id="st33mn"><?=getSlct($mnCd, $dfTmSetArr[15][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn33tm"><?=getSlct($tmCd, $dfTmSetArr[15][3]); ?></select>
	    				<select class="form-control input-sm" id="fn33mn"><?=getSlct($mnCd, $dfTmSetArr[15][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk33nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st43tm"><?=getSlct($tmCd, $dfTmSetArr[21][1]); ?></select>
	    				<select class="form-control input-sm" id="st43mn"><?=getSlct($mnCd, $dfTmSetArr[21][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn43tm"><?=getSlct($tmCd, $dfTmSetArr[21][3]); ?></select>
	    				<select class="form-control input-sm" id="fn43mn"><?=getSlct($mnCd, $dfTmSetArr[21][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk43nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st53tm"><?=getSlct($tmCd, $dfTmSetArr[27][1]); ?></select>
	    				<select class="form-control input-sm" id="st53mn"><?=getSlct($mnCd, $dfTmSetArr[27][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn53tm"><?=getSlct($tmCd, $dfTmSetArr[27][3]); ?></select>
	    				<select class="form-control input-sm" id="fn53mn"><?=getSlct($mnCd, $dfTmSetArr[27][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk53nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st63tm"><?=getSlct($tmCd, $dfTmSetArr[33][1]); ?></select>
	    				<select class="form-control input-sm" id="st63mn"><?=getSlct($mnCd, $dfTmSetArr[33][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn63tm"><?=getSlct($tmCd, $dfTmSetArr[33][3]); ?></select>
	    				<select class="form-control input-sm" id="fn63mn"><?=getSlct($mnCd, $dfTmSetArr[33][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk63nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st73tm"><?=getSlct($tmCd, $dfTmSetArr[39][1]); ?></select>
	    				<select class="form-control input-sm" id="st73mn"><?=getSlct($mnCd, $dfTmSetArr[39][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn73tm"><?=getSlct($tmCd, $dfTmSetArr[39][3]); ?></select>
	    				<select class="form-control input-sm" id="fn73mn"><?=getSlct($mnCd, $dfTmSetArr[39][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk73nm"><option>--</option></select>	   	    				
	    			</td>
	    		</tr>
	    		<!-- End of 3 seq -->
	    		<!-- Start of 4 seq  -->
	    		<tr>
	    			<td>4</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st14tm"><?=getSlct($tmCd, $dfTmSetArr[4][1]); ?></select>
	    				<select class="form-control input-sm" id="st14mn"><?=getSlct($mnCd, $dfTmSetArr[4][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn14tm"><?=getSlct($tmCd, $dfTmSetArr[4][3]); ?></select>
	    				<select class="form-control input-sm" id="fn14mn"><?=getSlct($mnCd, $dfTmSetArr[4][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk14nm"><option>--</option></select>
	    				</select>
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st24tm"><?=getSlct($tmCd, $dfTmSetArr[10][1]); ?></select>
	    				<select class="form-control input-sm" id="st24mn"><?=getSlct($mnCd, $dfTmSetArr[10][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn24tm"><?=getSlct($tmCd, $dfTmSetArr[10][3]); ?></select>
	    				<select class="form-control input-sm" id="fn24mn"><?=getSlct($mnCd, $dfTmSetArr[10][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk24nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st34tm"><?=getSlct($tmCd, $dfTmSetArr[16][1]); ?></select>
	    				<select class="form-control input-sm" id="st34mn"><?=getSlct($mnCd, $dfTmSetArr[16][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn34tm"><?=getSlct($tmCd, $dfTmSetArr[16][3]); ?></select>
	    				<select class="form-control input-sm" id="fn34mn"><?=getSlct($mnCd, $dfTmSetArr[16][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk34nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st44tm"><?=getSlct($tmCd, $dfTmSetArr[22][1]); ?></select>
	    				<select class="form-control input-sm" id="st44mn"><?=getSlct($mnCd, $dfTmSetArr[22][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn44tm"><?=getSlct($tmCd, $dfTmSetArr[22][3]); ?></select>
	    				<select class="form-control input-sm" id="fn44mn"><?=getSlct($mnCd, $dfTmSetArr[22][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk44nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st54tm"><?=getSlct($tmCd, $dfTmSetArr[28][1]); ?></select>
	    				<select class="form-control input-sm" id="st54mn"><?=getSlct($mnCd, $dfTmSetArr[28][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn54tm"><?=getSlct($tmCd, $dfTmSetArr[28][3]); ?></select>
	    				<select class="form-control input-sm" id="fn54mn"><?=getSlct($mnCd, $dfTmSetArr[28][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk54nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st64tm"><?=getSlct($tmCd, $dfTmSetArr[34][1]); ?></select>
	    				<select class="form-control input-sm" id="st64mn"><?=getSlct($mnCd, $dfTmSetArr[34][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn64tm"><?=getSlct($tmCd, $dfTmSetArr[34][3]); ?></select>
	    				<select class="form-control input-sm" id="fn64mn"><?=getSlct($mnCd, $dfTmSetArr[34][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk64nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st74tm"><?=getSlct($tmCd, $dfTmSetArr[40][1]); ?></select>
	    				<select class="form-control input-sm" id="st74mn"><?=getSlct($mnCd, $dfTmSetArr[40][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn74tm"><?=getSlct($tmCd, $dfTmSetArr[40][3]); ?></select>
	    				<select class="form-control input-sm" id="fn74mn"><?=getSlct($mnCd, $dfTmSetArr[40][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk74nm"><option>--</option></select>	   	    				
	    			</td>
	    		</tr>
	    		<!-- End of 4 seq -->
	    		<!-- Start of 5 seq  -->
	    		<tr>
	    			<td>5</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st15tm"><?=getSlct($tmCd, $dfTmSetArr[5][1]); ?></select>
	    				<select class="form-control input-sm" id="st15mn"><?=getSlct($mnCd, $dfTmSetArr[5][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn15tm"><?=getSlct($tmCd, $dfTmSetArr[5][3]); ?></select>
	    				<select class="form-control input-sm" id="fn15mn"><?=getSlct($mnCd, $dfTmSetArr[5][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk15nm"><option>--</option></select>
	    				</select>
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st25tm"><?=getSlct($tmCd, $dfTmSetArr[11][1]); ?></select>
	    				<select class="form-control input-sm" id="st25mn"><?=getSlct($mnCd, $dfTmSetArr[11][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn25tm"><?=getSlct($tmCd, $dfTmSetArr[11][3]); ?></select>
	    				<select class="form-control input-sm" id="fn25mn"><?=getSlct($mnCd, $dfTmSetArr[11][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk25nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st35tm"><?=getSlct($tmCd, $dfTmSetArr[17][1]); ?></select>
	    				<select class="form-control input-sm" id="st35mn"><?=getSlct($mnCd, $dfTmSetArr[17][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn35tm"><?=getSlct($tmCd, $dfTmSetArr[17][3]); ?></select>
	    				<select class="form-control input-sm" id="fn35mn"><?=getSlct($mnCd, $dfTmSetArr[17][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk35nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st45tm"><?=getSlct($tmCd, $dfTmSetArr[23][1]); ?></select>
	    				<select class="form-control input-sm" id="st45mn"><?=getSlct($mnCd, $dfTmSetArr[23][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn45tm"><?=getSlct($tmCd, $dfTmSetArr[23][3]); ?></select>
	    				<select class="form-control input-sm" id="fn45mn"><?=getSlct($mnCd, $dfTmSetArr[23][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk45nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st55tm"><?=getSlct($tmCd, $dfTmSetArr[29][1]); ?></select>
	    				<select class="form-control input-sm" id="st55mn"><?=getSlct($mnCd, $dfTmSetArr[29][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn55tm"><?=getSlct($tmCd, $dfTmSetArr[29][3]); ?></select>
	    				<select class="form-control input-sm" id="fn55mn"><?=getSlct($mnCd, $dfTmSetArr[29][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk55nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st65tm"><?=getSlct($tmCd, $dfTmSetArr[35][1]); ?></select>
	    				<select class="form-control input-sm" id="st65mn"><?=getSlct($mnCd, $dfTmSetArr[35][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn65tm"><?=getSlct($tmCd, $dfTmSetArr[35][3]); ?></select>
	    				<select class="form-control input-sm" id="fn65mn"><?=getSlct($mnCd, $dfTmSetArr[35][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk65nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st75tm"><?=getSlct($tmCd, $dfTmSetArr[41][1]); ?></select>
	    				<select class="form-control input-sm" id="st75mn"><?=getSlct($mnCd, $dfTmSetArr[41][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn75tm"><?=getSlct($tmCd, $dfTmSetArr[41][3]); ?></select>
	    				<select class="form-control input-sm" id="fn75mn"><?=getSlct($mnCd, $dfTmSetArr[41][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk75nm"><option>--</option></select>	   	    				
	    			</td>
	    		</tr>
	    		<!-- End of 5 seq -->
	    		<!-- Start of 6 seq  -->
	    		<tr>
	    			<td>6</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st16tm"><?=getSlct($tmCd, $dfTmSetArr[6][1]); ?></select>
	    				<select class="form-control input-sm" id="st16mn"><?=getSlct($mnCd, $dfTmSetArr[6][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn16tm"><?=getSlct($tmCd, $dfTmSetArr[6][3]); ?></select>
	    				<select class="form-control input-sm" id="fn16mn"><?=getSlct($mnCd, $dfTmSetArr[6][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk16nm"><option>--</option></select>
	    				</select>
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st26tm"><?=getSlct($tmCd, $dfTmSetArr[12][1]); ?></select>
	    				<select class="form-control input-sm" id="st26mn"><?=getSlct($mnCd, $dfTmSetArr[12][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn26tm"><?=getSlct($tmCd, $dfTmSetArr[12][3]); ?></select>
	    				<select class="form-control input-sm" id="fn26mn"><?=getSlct($mnCd, $dfTmSetArr[12][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk26nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st36tm"><?=getSlct($tmCd, $dfTmSetArr[18][1]); ?></select>
	    				<select class="form-control input-sm" id="st36mn"><?=getSlct($mnCd, $dfTmSetArr[18][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn36tm"><?=getSlct($tmCd, $dfTmSetArr[18][3]); ?></select>
	    				<select class="form-control input-sm" id="fn36mn"><?=getSlct($mnCd, $dfTmSetArr[18][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk36nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st46tm"><?=getSlct($tmCd, $dfTmSetArr[24][1]); ?></select>
	    				<select class="form-control input-sm" id="st46mn"><?=getSlct($mnCd, $dfTmSetArr[24][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn46tm"><?=getSlct($tmCd, $dfTmSetArr[24][3]); ?></select>
	    				<select class="form-control input-sm" id="fn46mn"><?=getSlct($mnCd, $dfTmSetArr[24][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk46nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px">
	    				<select class="form-control input-sm" id="st56tm"><?=getSlct($tmCd, $dfTmSetArr[30][1]); ?></select>
	    				<select class="form-control input-sm" id="st56mn"><?=getSlct($mnCd, $dfTmSetArr[30][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn56tm"><?=getSlct($tmCd, $dfTmSetArr[30][3]); ?></select>
	    				<select class="form-control input-sm" id="fn56mn"><?=getSlct($mnCd, $dfTmSetArr[30][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk56nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st66tm"><?=getSlct($tmCd, $dfTmSetArr[36][1]); ?></select>
	    				<select class="form-control input-sm" id="st66mn"><?=getSlct($mnCd, $dfTmSetArr[36][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn66tm"><?=getSlct($tmCd, $dfTmSetArr[36][3]); ?></select>
	    				<select class="form-control input-sm" id="fn66mn"><?=getSlct($mnCd, $dfTmSetArr[36][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk66nm"><option>--</option></select>	   	    				
	    			</td>
	    			<td style="padding:3px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st76tm"><?=getSlct($tmCd, $dfTmSetArr[42][1]); ?></select>
	    				<select class="form-control input-sm" id="st76mn"><?=getSlct($mnCd, $dfTmSetArr[42][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn76tm"><?=getSlct($tmCd, $dfTmSetArr[42][3]); ?></select>
	    				<select class="form-control input-sm" id="fn76mn"><?=getSlct($mnCd, $dfTmSetArr[42][4]); ?></select><br>
	    				<select class="form-control" style="margin-top:5px;width:126px;" id="wk76nm"><option>--</option></select>	   	    				
	    			</td>
	    		</tr>
	    		<!-- End of 6 seq --> 
	    	</tbody>
	    </table>
	    
	</div>
	</form>
	
</body>
</html>