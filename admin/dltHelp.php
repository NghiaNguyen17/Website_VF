<?php
$serverName = "MSI\\SQLEXPRESS";
$connectionInfo = array(
    "Database" => "QLCH_N7",
    "CharacterSet" => "UTF-8"
);
$conn = sqlsrv_connect($serverName, $connectionInfo);

if (!$conn) {
    die("Connection failed: " . sqlsrv_errors());
}

$iddata = $_GET['id'];

$sql = "DELETE FROM NHANVIEN WHERE MANV=?";
$params = array($iddata);

$stmt = sqlsrv_prepare($conn, $sql, $params);

if (!$stmt) {
    die("Error in query preparation: " . sqlsrv_errors());
}

if (sqlsrv_execute($stmt) === false) {
    die("Error in query execution: " . print_r(sqlsrv_errors(), true));
} else {
    header('location:help.php');
}


sqlsrv_close($conn);

?>