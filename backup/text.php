<?php
$host = "localhost"; // 자신의 mysql
$user = "gloriajeans"; // 기본 사용자. 
$password = "jjsoft"; // apm 기본 암호
$DB_name = "rostercreator"; // 데이터베이스 이름 : test
 
$conn = mysqli_connect($host, $user, $password, $DB_name);
 
if(mysqli_connect_errno($conn)){
    echo "실패!";
}
 
else{
    $result = mysqli_query($conn, "select * from tblEmp");
    // person 테이블로부터 result를 가져온다.
    
    // 결과로부터 한 행씩 가져온다.
    while($row = mysqli_fetch_array($result)){
        // Name 열의 데이터를 가져온다.
        echo $row['EmpID'];
        echo "<br>";
    }
}
 
mysqli_close($conn)
?>