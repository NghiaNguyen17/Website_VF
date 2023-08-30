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
    $sql = "UPDATE orders SET payment_status='Đã thanh toán' WHERE order_id=$order_id";
    if($connect->query($sql) == 'TRUE'){
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=dashboard.php\">";
    }
    mysqli_close($connect);
?>