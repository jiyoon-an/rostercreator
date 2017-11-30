<?php
include('../session_dbinfo.php');
//From session
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];
$PhoneNo= $_SESSION['PhoneNo'];
$Level  = $_SESSION['Level'];

$WeeklyKey = $_GET['WeeklyKey'];
//echo $WeeklyKey ;

//fetch Date Infomation
include('detailDateInfo.php');
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
    
</head>

<body style="margin:8px;">
	<input type="hidden" id='StDt' value='<?php echo $StDt ?>' />
	<input type="hidden" id='FnDt' value='<?php echo $FnDt ?>' />
	<input type="hidden" id='dt1'  value='<?php echo $dt1  ?>' />
	<input type="hidden" id='dt2'  value='<?php echo $dt2  ?>' />
	<input type="hidden" id='dt3'  value='<?php echo $dt3  ?>' />
	<input type="hidden" id='dt4'  value='<?php echo $dt4  ?>' />
	<input type="hidden" id='dt5'  value='<?php echo $dt5  ?>' />
	<input type="hidden" id='dt6'  value='<?php echo $dt6  ?>' />
	<input type="hidden" id='dt7'  value='<?php echo $dt7  ?>' />
	
	<form role="form" id="newRoster">
	<div class="container" style="font-family:Comic Sans MS">
		<h3>Shows 01/08/2016~07/08/2016 Detail </h3>
		<hr class="div_line">
		<div class='col-md-3'>
		    <div class="form-group">
		    	<label for="StDt">Start Date:</label>
		        <div class='input-group date' id='datetimepicker6' style="width:200px">
		            <input type='text' class="form-control" id="StDt"  value='<?php echo $tStDt ?>' disabled/>
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
		            <input type='text' class="form-control" di="FnDt" value='<?php echo $tFnDt ?>' disabled/>
		            <span class="input-group-addon">
		                <span class="glyphicon glyphicon-calendar"></span>
		            </span>
		        </div>
		    </div>		   
		</div>
		<br>
		<h2>&nbsp;</h2>		
		
		<hr class="div_line">
		
		<table width="100px" class="table table-bordered" style="background:rgb(243,242,236);" >
	    	<thead >
		      	<tr>
					<th style="text-align:center;font-size:1.0em;">No</th>
					<th style="text-align:center;font-size:1.0em;">Mon<br>(<?php echo $tDt1 ?>)</th>
					<th style="text-align:center;font-size:1.0em;">Tue<br>(<?php echo $tDt2 ?>)</th>
					<th style="text-align:center;font-size:1.0em;">Wed<br>(<?php echo $tDt3 ?>)</th>
					<th style="text-align:center;font-size:1.0em;">Thu<br>(<?php echo $tDt4 ?>)</th>
					<th style="text-align:center;font-size:1.0em;">Fri<br>(<?php echo $tDt5 ?>)</th>
					<th style="text-align:center;font-size:1.0em;">Sat<br>(<?php echo $tDt6 ?>)</th>
					<th style="text-align:center;font-size:1.0em;">Sun<br>(<?php echo $tDt7 ?>)</th>
		    	</tr>
	    	</thead>
	    	<tbody>
	    		<?php
					foreach($arr as $brr){
						echo '<tr>';
						foreach($brr as $crr){
							echo '<td>';
							echo $crr;
							echo '</td>';
						}
						echo '</tr>';		
					}
	    		?>
	    	</tbody>
	    </table>
	    
	</div>
	</form>
	
	

</body>
</html>