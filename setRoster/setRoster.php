<?php
include('../session_dbinfo.php');
//From session
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];
$PhoneNo= $_SESSION['PhoneNo'];
$Level  = $_SESSION['Level'];

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="../css/setRoster.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewprt" content="width=device-width, initial-scale=1">
	
	<title>Weekly Roster List</title>
	<!-- java script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>    
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<!-- Install jQueryUI -->
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<!-- Install jqGrid -->
	<link rel="stylesheet" type="text/css" media="screen" href="http://trirand.com/blog/jqgrid/themes/ui.jqgrid.css" />
	<script src="http://trirand.com/blog/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="http://trirand.com/blog/jqgrid/js/jquery.jqGrid.js" type="text/javascript"></script>
	<!-- must be at last js file-->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script>
    	
	// and create the list
	$(document).ready(function() {
		jQuery("#list").jqGrid({
			url: 'data.php',
			datatype: "json",
			height: 400,
			colNames:["No", "WeeklyKey","WriterEmpID","ModifierEmpID","PlanStartDt","PlanEndDt", "Period", "WrtNm", "MdfNm"],
		    colModel:[
		    	{name:"Seq"           ,index:"Seq"          , width:80 , align:"center"},
		    	{name:"WeeklyKey"     ,index:"WeeklyKey"    , width:100, hidden:true},
		    	{name:"WriterEmpID"   ,index:"WriterEmpID"  , width:100, hidden:true},
		    	{name:"ModifierEmpID" ,index:"ModifierEmpID", width:100, hidden:true},
		    	{name:"PlanStartDt"   ,index:"PlanStartDt"  , width:100, hidden:true},
		    	{name:"PlanEndDt"     ,index:"PlanEndDt"    , width:100, hidden:true},
		    	{name:"Period"        ,index:"Period"       , width:500, align:"center"},
		    	{name:"WrtNm"         ,index:"WrtNm"        , width:175, align:"center"},
		    	{name:"MdfNm"         ,index:"MdfNm"        , width:175, align:"center"}
		    ],
			rowNum:20,
			rowList: [10,20,30],
			pager: "#pager",
			sortname: 'WeeklyKey',
			viewrecords: true,
			sortorder: "desc",
			loadonce: true,
			caption:"Weekly Roster List",
			onSelectRow: function(id){ 
				
				location.href='aRosterDetail.php?WeeklyKey='+id;
		        //	
			}
		});
	});
	</script>	
</head>

<body style="margin:8px;">
	<div class="container" style="font-family:Comic Sans MS">
		<h3>Shows the List of Shift Table!</h3>
		<form role="form" id="searchDt">
			<hr class="div_line">
			
		  	<table border="0" width="100%">
		  		<tr>
		  			<td width="600px">
					    <div class="row">
					        <div class='col-sm-6'>
					            <div class="form-group">
									<label for="searchDt">Search:</label>
					                <div class='input-group date' id='datetimepicker1'>
					                    <input type='text' class="form-control" id="searchDt" />
					                    <span class="input-group-addon">
					                        <span class="glyphicon glyphicon-calendar"></span>
					                    </span>
					                </div>
					            </div>
					        </div>
			  				<div style="padding-top:28px">
						    	<button type="button" class="btn btn-warning">Search</button>
						    </div>					        
					        <script type="text/javascript">
					            $(function () {
					                $('#datetimepicker1').datetimepicker();
					            });
					        </script>
					    </div>
		  			</td>
		  			<td align="right">    
			  			<div style="padding-top:18px">
					    	<a href="newRoster.php"><button type="button" class="btn btn-danger">New Roster</button></a>
		  				</div>
		  			</td>
		  		</tr>
		  	</table>
		</form>
			
		<hr class="div_line">  	
			
		<table style="font-size:170%" id="list"></table>
		<div id="pager"></div>
		
	</div>		  	
	
	
	
	
</body>
</html>