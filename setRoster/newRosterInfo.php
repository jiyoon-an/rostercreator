<?php

 	$sql = "select  DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +1 day), '%Y%m%d') as StDt,
		    		DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +7 day), '%Y%m%d') as FnDt,
	        		DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +1 day), '%d/%m/%Y') as tmpStDt,
		   			DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +7 day), '%d/%m/%Y') as tmpFnDt,
			        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +1 day), '%d/%m/%Y') as tMon,
			        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +2 day), '%d/%m/%Y') as tTue,
			        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +3 day), '%d/%m/%Y') as tWed,
			        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +4 day), '%d/%m/%Y') as tThr,
			        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +5 day), '%d/%m/%Y') as tFri,
			        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +6 day), '%d/%m/%Y') as tSat,
			        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +7 day), '%d/%m/%Y') as tSun,
			        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +1 day), '%Y%m%d')   as Mon ,
			        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +2 day), '%Y%m%d')   as Tue ,
			        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +3 day), '%Y%m%d')   as Wed ,
			        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +4 day), '%Y%m%d')   as Thr ,
			        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +5 day), '%Y%m%d')   as Fri ,
			        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +6 day), '%Y%m%d')   as Sat ,
			        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +7 day), '%Y%m%d')   as Sun 
			from   tblWeeklyRoster;";
			
	echo '<br>';
	$result = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect));
	while($row = mysqli_fetch_array($result)){	
		$StDt   =$row[0];
		$FnDt   =$row[1];
		$tStDt  =$row[2];
		$tFnDt  =$row[3];
		$tMon 	=$row[4];
		$tTue 	=$row[5];
		$tWed 	=$row[6];
		$tThr 	=$row[7];
		$tFri 	=$row[8];
		$tSat 	=$row[9];
		$tSun 	=$row[10];
		$Mon  	=$row[11];
		$Tue  	=$row[12];
		$Wed  	=$row[13];
		$Thr  	=$row[14];
		$Fri  	=$row[15];
		$Sat  	=$row[16];
		$Sun  	=$row[17];
	}
	
	//fetching hour
	$sql = "select Code as cdTm, CodeName as cdTmNm from tblCode
            where Category='004';";
            
    $result = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect));
	$tmCd = array();
	while($row =mysqli_fetch_assoc($result)){
		$tmCd[$row['cdTm']]=$row['cdTmNm'];
	}
	/*
	foreach($tmCd as  $key => $val){
		echo $key ." is " . $val . " years old.";
		echo '<br>';
	}
	*/
	
	//fetching mins
	$sql2 = "select Code as cdMn, CodeName as cdMnNm from tblCode
            where Category='005';";
    
    $result = mysqli_query($connect,$sql2)or die("Error: ".mysqli_error($connect));
	$mnCd = array();
	while($row = mysqli_fetch_assoc($result)) {
		$mnCd[$row['cdMn']]=$row['cdMnNm'];
	}
	
	function getSlct($arr, $selected, $is_key=1){
		$str="<option>--</option>";
		foreach($arr as $key => $val){
			$option_value = ($is_key)? $key : $val;
			$option_text = $val;
			$slctd = ($option_value == $selected)? "selected='selected'":"";
			$str .= "<option value='{$option_value}'{$slctd}>{$option_text}</option>/n";
		}
    	return $str;
	}

$sqlNewWeekTmTbl = 
           "select concat('nm',DayNo,DateIDSeq) as Nm
				, substr(TmTableFrom, 1, 2)     as stTm
                , substr(TmTableFrom, 3, 2)     as stMn
                , substr(TmTableTo  , 1, 2)     as fnTm
                , substr(TmTableTo  , 3, 2)     as fnMn
                , EmpID                         as tmpEmp
				, Date                          as dt
            from tblDailyRosterPlans where Date='$Mon'           
			union all
            select concat('nm',DayNo,DateIDSeq) as Nm
				, substr(TmTableFrom, 1, 2)     as stTm
                , substr(TmTableFrom, 3, 2)     as stMn
                , substr(TmTableTo  , 1, 2)     as fnTm
                , substr(TmTableTo  , 3, 2)     as fnMn
                , EmpID                         as tmpEmp
				, Date                          as dt
            from tblDailyRosterPlans where Date='$Tue'
            union all
            select concat('nm',DayNo,DateIDSeq) as Nm
				, substr(TmTableFrom, 1, 2)     as stTm
                , substr(TmTableFrom, 3, 2)     as stMn
                , substr(TmTableTo  , 1, 2)     as fnTm
                , substr(TmTableTo  , 3, 2)     as fnMn
                , EmpID                         as tmpEmp
				, Date                          as dt
            from tblDailyRosterPlans where Date='$Wed'
            union all
            select concat('nm',DayNo,DateIDSeq) as Nm
				, substr(TmTableFrom, 1, 2)     as stTm
                , substr(TmTableFrom, 3, 2)     as stMn
                , substr(TmTableTo  , 1, 2)     as fnTm
                , substr(TmTableTo  , 3, 2)     as fnMn
                , EmpID                         as tmpEmp
				, Date                          as dt
            from tblDailyRosterPlans where Date='$Thr'
            union all
            select concat('nm',DayNo,DateIDSeq) as Nm
				, substr(TmTableFrom, 1, 2)     as stTm
                , substr(TmTableFrom, 3, 2)     as stMn
                , substr(TmTableTo  , 1, 2)     as fnTm
                , substr(TmTableTo  , 3, 2)     as fnMn
                , EmpID                         as tmpEmp
				, Date                          as dt
            from tblDailyRosterPlans where Date='$Fri'
            union all
            select concat('nm',DayNo,DateIDSeq) as Nm
				, substr(TmTableFrom, 1, 2)     as stTm
                , substr(TmTableFrom, 3, 2)     as stMn
                , substr(TmTableTo  , 1, 2)     as fnTm
                , substr(TmTableTo  , 3, 2)     as fnMn
                , EmpID                         as tmpEmp
				, Date                          as dt
            from tblDailyRosterPlans where Date='$Sat'
            union all
            select concat('nm',DayNo,DateIDSeq) as Nm
				, substr(TmTableFrom, 1, 2)     as stTm
                , substr(TmTableFrom, 3, 2)     as stMn
                , substr(TmTableTo  , 1, 2)     as fnTm
                , substr(TmTableTo  , 3, 2)     as fnMn
                , EmpID                         as tmpEmp
				, Date                          as dt
            from tblDailyRosterPlans where Date='$Sun'
            order by 1;
            ";
        
//echo $sqlNewWeekTmTbl; 

$resultNewWeekTmTbl = mysqli_query($connect,$sqlNewWeekTmTbl)or die("Error: ".mysqli_error($connect));
$dfTmSetArr = array();	

if (mysqli_num_rows($resultNewWeekTmTbl) > 0) {
    // output data of each row
	for($i = 1; $row = mysqli_fetch_array($resultNewWeekTmTbl); $i++) {
		
		//mon:1->6
		//tue:7->12
		//wed:13->18
		//thr:19->24
		//fir:25->30
		//sat:31->36
		//sun:37->42
		$dfTmSetArr[$i][0] = $row['Nm'];
		$dfTmSetArr[$i][1] = $row['stTm'];
		$dfTmSetArr[$i][2] = $row['stMn'];
		$dfTmSetArr[$i][3] = $row['fnTm'];
		$dfTmSetArr[$i][4] = $row['fnMn'];	
		$dfTmSetArr[$i][5] = $row['tmpEmp']; //tmpEmp
		$dfTmSetArr[$i][6] = $row['dt']; 
		/*
		$tmpDt   = $row['dt'];
		$dtSeq   = trim(substr($row['Nm'], 3,1)); //from 'nm21'
		
		$sqlFetchAvailabledEmp = 
			"select A.EmpID, (select Name from tblEmp where EmpID = A.EmpID) as EmpNm
             from   tblEmpWorkingDay A 
             		inner join 
             		(select DayNo, TmTableFrom, TmTableTo from tblDailyRosterPlans where Date ='$tmpDt' and DateIDSeq='$dtSeq') B
             on A.DayNo = B.DayNo
             where A.AvailableYn ='Y'
             and   A.FromTime <= B.TmTableFrom and A.ToTime>=B.TmTableTo;
            ";
        */
	}
	
	
} else {
    echo "0 results";
}

//$result = mysqli_query($connect, $sqlCopyLastWeek);
/*
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	//Data copy from last week
    	$DayNo1 = $row["DayNo1"];
		$DayNo2 = $row["DayNo2"];
		$DayNo3 = $row["DayNo3"];
		$DayNo4 = $row["DayNo4"];
		$DayNo5 = $row["DayNo5"];
		$DayNo6 = $row["DayNo6"];
		$DayNo7 = $row["DayNo7"];    
		
		
		
    	$sqlInsert = "INSERT INTO tblDailyRosterPlans 
    				  VALUES ('$tmpDt1' 
    				  		, '$tmpDt2' 
    				  		, '$tmpDt3' 
    				  		, '$tmpDt4' 
    				  		, '$tmpDt5' 
    				  		, '$tmpDt6' 
    				  		)
					 ON DUPLICATE KEY UPDATE
					 TmTableFrom='$tmpDt4', TmTableTo='$tmpDt5', EmpID='$tmpDt6';
		";
		echo $sqlInsert;
		echo '<br>';
		///$resultInsert = mysqli_query($connect,$sqlInsert) or die( mysqli_error($connect));
    }
} else {
    echo "0 results";
}
*/


	
	
		
	/*
	
	FETCHING AVAILABLE EMPLOYEE

            select A.EmpID, (select Name from tblEmp where EmpID = A.EmpID) as EmpNm
            from tblEmpWorkingDay A inner join (select DayNo, TmTableFrom, TmTableTo from tblDailyRosterPlans where Date ='20160808' and DateIDSeq=1) B
            on A.DayNo = B.DayNo
            where A.AvailableYn ='Y'
            and   A.FromTime <= B.TmTableFrom and A.ToTime>=B.TmTableTo
	*/
?>