<?php
include('resource/config.php');
//session_start();
if(!isset($_SESSION['EmpID']) || !isset($_SESSION['Name'])) {
	echo "<meta http-equiv='refresh' content='0;url=login.php'>";
	exit;
}
$EmpID = $_SESSION['EmpID'];
$Name = $_SESSION['Name'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html>
<head>	
    <title>Roster Creator</title>
    <script src="js/menuFrame.js"></script>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
</head>

<body>	
<div class="container-fluid">
	<div class="row" style="min-width:1100px;">
    	<div class="col-xs-12 col-sm-12 col-md-12">
    		<table>
    		<tr>
    			<td>
    				<marquee behavior="alternate" scrollAbount="8">Hello! <?php echo $Name ?> in Gloria Jeans' Lorne ST !! </marquee>
    			</td>
    			<td class="logout">
    				<a href='logout.php'><img src="img/logout.gif"/></a>
    			</td>
    		</tr>
    		</table>
    	</div>
	</div>	
	<div class="row" style="BACKGROUND:#2d2929;min-width:1100px;">    	  	
    	<div class="col-md-6" style="display:inline">
			<a href="home/vwHome.php" target="sexybody"><img src="img/menuLogo.png" /></a>
		</div>
		<div class="col-md-6" id="header" style="display:inline;float:right;padding-right:15px;">
			 <ul class="nav navbar-nav navbar-right">
				<li id="home" class="current" onClick="changeCSS('home')"><a href="home/vwHome.php" target="sexybody">Home<br>&nbsp;</a></li>
				<li id="workerInfo" class="" onClick="changeCSS('workerInfo')"><a href="workerInfo/vwWorkerInfo.php" target="sexybody">Worker's<br>Infomation</a></li>
				<li id="setRoster" class="" onClick="changeCSS('setRoster')"><a href="setRoster/vwSetRoster.php" target="sexybody">Setting<br>Roster</a></li>
				<li id="record" class="" onClick="changeCSS('record')"><a href="tradingRecord/vwTradingRecord.php?flag=0" target="sexybody">Record<br>Trading</a></li>
				<li id="freeBoard" class="" onClick="changeCSS('freeBoard')"><a href="freeBoard/vwFreeBoard.php?flag=0" target="sexybody">Free<br>Board</a></li>				 
			 </ul>				 
						 
		</div>
    </div>
    
	<div class="row">
	    <div class="col-md-12"  style="width:100%;height:90vh;overflow:auto;min-height:750px;min-width:1100px;">
			<iframe src="home/vwHome.php"  name="sexybody"  style="width:100%;height:100%"  scrolling="no" frameborder="0"></iframe>
	
		</div>
	</div>
</div>
</body>
</html>