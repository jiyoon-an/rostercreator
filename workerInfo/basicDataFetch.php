<?php
	$sql = "select Code as cdTm, CodeName as cdTmNm from tblCode
            where Category='004';";
            
    $result = mysqli_query($connect,$sql);
	//$tmCd = array();
	
	for($i=0; $row = mysqli_fetch_array($result); $i++) {	    
	    //echo $row['cdTm'];
	    //echo $row['cdTmNm'];
		//echo "<br>";		
		$tmCd[$i][0] = $row['cdTm'];
		$tmCd[$i][1] = $row['cdTmNm'];    
	    //echo $tmCd[$i][0];
	    //echo $tmCd[$i][1];		
	}
	
	$sql2 = "select Code as cdMn, CodeName as cdMnNm from tblCode
            where Category='005';";
            
    $result = mysqli_query($connect,$sql2);
	//$tmCd = array();
	
	for($i=0; $row = mysqli_fetch_array($result); $i++) {
		$mnCd[$i][0] = $row['cdMn'];
		$mnCd[$i][1] = $row['cdMnNm'];  
	}
	
	/*
	foreach($tmCd as $brr){
			echo $brr[0];
			echo $brr[1];
			echo "<br>";
	}
	foreach($tmCd as $brr){
		echo $$brr;
			echo "<br>";
	}
	/*
	if(!empty(mysqli_fetch_array($result))) {
		foreach (mysqli_fetch_array($result) as $brr){
			echo $brr['cdTm'];
			echo $brr['cdTmNm'];
			echo "<br>";
		}
	}
	
	
	$sql = "select EmpId, DayNo, AvailableYn, 
			substr(FromTime, 1, 2) stTm, 
			substr(FromTime, 3, 2) stMn, 
			substr(ToTime, 1, 2) fnTm, 
			substr(ToTime, 3, 2) fnMn
            from tblEmpWorkingDay
            where EmpId = '$EmpID'
            and  DayNo = '$dayGb'
            ;";
	$result = mysqli_query($connect,$sql);
	while($row = mysqli_fetch_array($result)){	
		$yesOrNo =$row['AvailableYn'];
		$stTm    =$row['stTm'];
		$stMn    =$row['stMn'];
		$fnTm    =$row['fnTm'];
		$fnMn  	 =$row['fnMn'];
		
		echo  $yesOrNo; 		
		echo 	$stTm ;   	
		echo 	$stMn ;   	
		echo 	$fnTm ;   	
		echo 	$fnMn ;	
	}
	*/
?>