<?php
include('../session_dbinfo.php');

//From session
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];      
$PhoneNo= $_SESSION['PhoneNo'];      
$Level  = $_SESSION['Level'];  
 
$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction

if(!$sidx) $sidx =1;

$sql=    "select A.WriterEmpID, A.ModifierEmpID, A.PlanStartDt, A.PlanEndDt, A.WeeklyKey
		, concat(DATE_FORMAT(A.PlanStartDt, '%d/%m/%Y'), '~', DATE_FORMAT(A.PlanEndDt, '%d/%m/%Y')) as Period
		, (select Name from tblEmp where EmpID = A.WriterEmpID) as WrtNm
		, ifnull((select Name from tblEmp where EmpID = A.ModifierEmpID),'') as MdfNm
		, Seq
		from tblWeeklyRoster A
		order by Seq desc;";

$result = mysqli_query($connect,$sql);

$responce = new stdClass(); 
$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;
$i=0;
while($row = mysqli_fetch_array($result)){
	$response->rows[$i]['id']=$row['WeeklyKey']; //id
    $response->rows[$i]['cell']=array
    ($row['Seq']
    ,$row['WeeklyKey']
    ,$row['WriterEmpID']
    ,$row['ModifierEmpID']
    ,$row['PlanStartDt']
    ,$row['PlanEndDt']
    ,$row['Period']
    ,$row['WrtNm']
    ,$row['MdfNm']);
    $i++;	    
} 
echo json_encode($response);
?>