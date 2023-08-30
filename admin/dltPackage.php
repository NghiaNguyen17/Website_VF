<?php
    $db = array(
        'server' => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname' => 'viet_finance'
    );
    // tạo kết nối
    $connect = mysqli_connect($db['server'], $db['username'], $db['password'], $db['dbname']);
    mysqli_set_charset($connect,'utf8');
    if(!$connect){
        die("Kết nối thất bại: " . mysqli_connect_error());
    }
    $maGoi = $_GET['maGoi'];
    $sql = "DELETE FROM goi WHERE maGoi=$maGoi";
    if($connect->query($sql) == 'TRUE'){
        header('location:package.php');
    }
    mysqli_close($connect);
?>