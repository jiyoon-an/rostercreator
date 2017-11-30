<?php
include('../session_dbinfo.php');
//From session
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];      
$PhoneNo= $_SESSION['PhoneNo'];      
$Level  = $_SESSION['Level']; 

if(!isset($_POST['Name']) || !isset($_POST['password'])) exit;

$newName  = $_POST['Name'];
$newPhone = $_POST['phone'];
$newId    = $_POST['id'];
$newPw    = $_POST['password'];


$sql = "select lpad(max(empID)+1, 4,'0') as newEmpId from tblEmp where status='1'";
$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
$row = mysqli_fetch_array($result);     

$newCreateId = $row['newEmpId']; 

$sql = "insert into tblEmp (Name, EmpID, EmpPw, PhoneNo, Level, Status, etc) 
                    values('$newName', '$newCreateId', '$newPw', '$newPhone', 'E', '1', '')";
$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
/*
echo $row['newEmpId'];

echo $newName ;
echo $newPhone;
echo $newId   ;
echo $newPw   ;
*/
?>
<meta http-equiv='refresh' content='0;url=workerInfo.php'>