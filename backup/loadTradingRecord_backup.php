<?php
session_start();
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
if(!isset($_SESSION['EmpID']) || !isset($_SESSION['Name'])) {
	echo "<meta http-equiv='refresh' content='0;url=login.php'>";
	exit;
}
$user_id = $_SESSION['EmpID'];
$user_name = $_SESSION['Name'];

$mysql_hostname = "localhost";
$mysql_user = "gloriajeans";
$mysql_password = "jjsoft";
$mysql_database = "rostercreator";

$connect = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);  
 
if(mysqli_connect_errno($connect)){
    echo "connection failure";
} else{
    //$resultBorrow = mysqli_query($connect, "select * from tblBorrow");
	while($rowBorrow = mysqli_fetch_array($resultBorrow)){
        echo $rowBorrow[0].", ".$rowBorrow[1].", ".$rowBorrow[2].", ".$rowBorrow[3].", ".$rowBorrow[4].", ".$rowBorrow[5].", ".$rowBorrow[6].", ".$rowBorrow[7].", ".$rowBorrow[8];
        echo "<br>";
    }

	$resultLoan = mysqli_query($connect, "select * from tblLoan");
    while($rowLoan = mysqli_fetch_array($resultLoan)){
        echo $rowLoan[0].", ".$rowLoan[1].", ".$rowLoan[2].", ".$rowLoan[3].", ".$rowLoan[4].", ".$rowLoan[5].", ".$rowLoan[6].", ".$rowLoan[7].", ".$rowLoan[8];
        echo "<br>";
    }
}
mysqli_close($connect)
?>	