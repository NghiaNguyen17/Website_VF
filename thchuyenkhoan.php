<?php

session_start();

?>
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
        $sql = "SELECT * FROM goi WHERE maGoi=$maGoi";
        $result = mysqli_query($connect, $sql);
        $editPackage = mysqli_fetch_array($result);
?>
<?php
$db= $connect;
$tableName2="orders";
$columns2= ['order_id', 'maGoi','giaGoi','name','email','phone_number','payment_status'];
$fetchData2 = fetch_data2($db, $tableName2, $columns2);

function fetch_data2($db, $tableName2, $columns2){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns2) || !is_array($columns2)) {
  $msg="columns2 Name must be defined in an indexed array";
 }elseif(empty($tableName2)){
   $msg= "Table2 Name is empty";
}else{

$columnName2 = implode(", ", $columns2);
$query2 = "SELECT ".$columnName2." FROM $tableName2"." ORDER BY order_id DESC";
$result2 = $db->query($query2);

if($result2== true){ 
 if ($result2->num_rows > 0) {
    $row= mysqli_fetch_all($result2, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found"; 
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}
?>
<?php
$order_id = $_GET['order_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="thchuyenkhoan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <section class="payment">
        <div class="paybox">
            <img src="logo-vietfinance.png">
            <table class="paydetail">
                <thead>
                    <tr>
                        <td>Mã đơn hàng</td>
                        <td>Giá trị đơn hàng</td>
                        <td>Phí giao dịch</td>
                        <td>Thành tiền</td>
                    </tr>
                </thead>
                <tbody class="bluebody">
                    <tr>
                        <td><?php echo $editPackage['maGoi']; ?></td>
                        <td><?php echo $editPackage['giaGoi']; ?></td>
                        <td>Miễn phí</td>
                        <td><?php echo $editPackage['giaGoi']; ?></td>
                    </tr>
                </tbody>
            </table>
            <h1>Hướng dẫn hoàn tất thanh toán</h1>
            <h2>Để hoàn tất quá trình thanh toán quý khách vui lòng thực hiện như sau:</h2>
            <div class="payform">
                <div class="payform_content">
                    <p>Vui lòng chuyển khoản Online (Hình thức chuyển NỘI BỘ/LIÊN ngân hàng) cho VietFinance bằng 1 trong 2 cách dưới đây để hoàn tất thanh toán đơn hàng</p>
                    <ul>
                        <li>1. Sử dụng ứng dụng (Mobile App) Mobile Banking trên điện thoại, hoặc</li>
                        <li>2. Đăng nhập vào Website Internet Banking của Ngân hàng TMCP Công thương Việt Nam</li>
                    </ul>
                </div>
                <form action="" method="POST">
                <table> 
                <tr>
                <th><label>Số tài khoản ủy nhiệm:</label></th>
                <td><p id="stk" class="stk">106868143615 <button onclick="copyToClipboard('#stk')"><img class="copysolid" src="copy-solid.png"></button></p></td>
                </tr>
                <tr>
                <th><label>Tên chủ tài khoản:</label></th>
                <td><p>Cong ty CP tai chinh VietFinance</p></td>
                </tr>
                <tr>
                <th><label>Ngân hàng:</label></th>
                <td><p>Ngân hàng Thương mại cổ phần Công Thương Việt Nam</p></td>
                </tr>
                <tr>
                <th><label>Số tiền:</label></th>
                <td><p><span id="moneyp" class="moneyp"><?php echo $editPackage['giaGoi']; ?></span> VND <button onclick="copyToClipboard('#moneyp')"><img class="copysolid" src="copy-solid.png"></button></p></td>
                </tr>
                <tr>
                <th><label>Nội dung chuyển khoản:</label></th>
                <td><p id="paycnt" class="paycnt">Thanh toan <span><?php echo $editPackage['maGoi']; ?></span> VietFinance <button onclick="copyToClipboard('#paycnt')"><img class="copysolid" src="copy-solid.png"></button></p></td>
                </tr>
                </table>
                <p class="alertpay"><i>(Vui lòng copy đúng nội dung chuyển khoản, để đảm bảo đơn hàng được xử lý NGAY)</i></p>
            </form>
            <div class="paybutton">
                <form action="" method="POST">
                <input id="submit" name="submit" type="submit" value="Hoàn tất"></form>
                <a href="cancelOrders.php?order_id=<?php echo $order_id?>"><input id="cancel" name="cancel" type="submit" value="Hủy đơn hàng"></a>
                </div>
            <?php
                if(isset($_POST['submit'])){
                    header('Location:trangchu.php');
                    };
                ?>
            </div>
        </div>
    </section>
    <script>
        function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</body>
</html>