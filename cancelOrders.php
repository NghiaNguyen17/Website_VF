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
    $order_id = $_GET['order_id'];
    $sql = "DELETE FROM orders WHERE order_id='$order_id'";
    if($connect->query($sql) == 'TRUE'){
        header('location:trangchu.php');
    }
    mysqli_close($connect);
?>