<?php
$host = "localhost"; // �ڽ��� mysql
$user = "gloriajeans"; // �⺻ �����. 
$password = "jjsoft"; // apm �⺻ ��ȣ
$DB_name = "rostercreator"; // �����ͺ��̽� �̸� : test
 
$conn = mysqli_connect($host, $user, $password, $DB_name);
 
if(mysqli_connect_errno($conn)){
    echo "����!";
}
 
else{
    $result = mysqli_query($conn, "select * from tblEmp");
    // person ���̺�κ��� result�� �����´�.
    
    // ����κ��� �� �྿ �����´�.
    while($row = mysqli_fetch_array($result)){
        // Name ���� �����͸� �����´�.
        echo $row['EmpID'];
        echo "<br>";
    }
}
 
mysqli_close($conn)
?>