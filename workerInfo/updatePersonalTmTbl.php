<?php
include('../session_dbinfo.php');
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];      
$PhoneNo= $_SESSION['PhoneNo'];      
$Level  = $_SESSION['Level']; 

echo $EmpID  ;
echo $EmpPw  ;
echo $Name   ;
echo $PhoneNo;
echo $Level  ;
echo '<br>';

$dayGb    = $_POST['dayGb'];
$idm      = $_POST['idm'];
$AbleYn   = $_POST['avblYn'];
$stTm     = trim($_POST['stTm']);
$stMn     = trim($_POST['stMn']);
$fnTm     = trim($_POST['fnTm']);
$fnMn     = trim($_POST['fnMn']);
$dbStTm   = $stTm.$stMn;
$dbFnTm   = $fnTm.$fnMn;

echo $dayGb;
echo $idm;
echo $AbleYn;

echo '<br>';
echo $dbStTm;
echo '<br>';
echo $dbFnTm;
echo '<br>';


if($AbleYn == 'Y'){
	if($dbStTm=="" || $dbFnTm==""){
		echo "<script>alert('Enter The Working Available Time');history.back();</script>";
        exit;
	}
}
	$sql =  "INSERT INTO tblEmpWorkingDay VALUES ('$idm', $dayGb, '$AbleYn', '$dbStTm', '$dbFnTm')
			ON DUPLICATE KEY UPDATE
			AvailableYn='$AbleYn', FromTime='$dbStTm', ToTime='$dbFnTm';
	";
echo $sql;

$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));

?>
<meta http-equiv='refresh' content='0;url=workerInfo.php'>