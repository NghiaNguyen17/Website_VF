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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="thanhtoan.css">
</head>
<body>
    <section class="payment">
        <div class="paybox">
            <img src="logo-vietfinance.png">
            <table class="paydetail">
                <thead>
                    <tr>
                        <td>Mã gói</td>
                        <td>Giá trị gói</td>
                        <td>Phí giao dịch</td>
                        <td>Thành tiền</td>
                    </tr>
                </thead>
                <tbody class="bluebody">
                    <tr>
                        <td><?php echo $editPackage['maGoi']; ?></td>
                        <td><?php echo $editPackage['giaGoi']; ?></td>
                        <td>Miễn phí</td>
                        <td><?php echo $editPackage['giaGoi']; ?> VND</td>
                    </tr>
                </tbody>
            </table>
            <h1>Thanh toán chuyển khoản Internet Banking hoặc nộp tiền tại quầy giao dịch ngân hàng</h1>
            <h2>Thông tin người đặt hàng</h2>
            <div class="payform">
                <form action="" method="POST">
                <table> 
                <tr style="display: none;">
                <th><label>Mã Gói</label></th>
                <td><input id="inputsearch" type="text" name="pkgcode" placeholder="Họ và tên...." value="<?php echo $editPackage['maGoi']; ?>"></td>
                </tr>
                <tr style="display: none;">
                <th><label>Giá gói</label></th>
                <td><input id="inputsearch" type="text" name="pkgprice" placeholder="Họ và tên...." value="<?php echo $editPackage['giaGoi']; ?>"></td>
                </tr>
                <tr>
                <th><label>Họ và tên</label></th>
                <td><input id="inputsearch" type="text" name="fullname" placeholder="Họ và tên...."></td>
                </tr>
                <tr>
                <th><label>Email</label></th>
                <td><input id="inputsearch" type="text" name="email" placeholder="Email...."></td>
                </tr>
                <tr>
                <th><label>Số điện thoại</label></th>
                <td><input id="inputsearch" type="text" name="phonenumber" placeholder="Số điện thoại...."></td>
                </tr>
                </table>
                <div class="paybutton">
                <input id="submit" type="submit" name="submit" value="Thanh toán">
                <input id="cancel" type="submit" name="cancel" value="Hủy đơn hàng">
                </div>
                </form>
                <?php
                if(isset($_POST['submit'])){
                    if(isset($_POST['pkgcode']))
                    $pkgcode = $_POST['pkgcode'];
                    if(isset($_POST['pkgprice']))
                    $pkgprice = $_POST['pkgprice'];
                    if(isset($_POST['fullname']))
                        $fullname = $_POST['fullname'];
                    if(isset($_POST['email']))
                        $email = $_POST['email'];
                    if(isset($_POST['phonenumber']))
                        $phonenumber = $_POST['phonenumber'];
                    $sql = "INSERT INTO orders (maGoi, giaGoi, name, email, phone_number) 
                    VALUES ('$pkgcode','$pkgprice','$fullname','$email','$phonenumber')";
                    if(mysqli_query($connect, $sql)){
                        $order_id = mysqli_insert_id($connect);
                        header('Location:thchuyenkhoan.php?maGoi='.$editPackage['maGoi'].'&order_id='.$order_id);
                    };
                }
                if(isset($_POST['cancel'])){
                    header('location:trangchu.php');
                }
                ?>
            </div>
        </div>
    </section>
</body>
</html>