<?php

session_start();
header('Content-Type: text/html; charset=utf-8');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/edithelp.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li class="logov">
                    <a href="#">
                        <span class="icon">
                            <img src="assets/imgs/vlogo.png">
                        </span>
                        <span class="title">QLCH_n7</span>
                    </a>
                </li>

                <li class="dashboard">
                    <a href="dashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Trang chủ</span>
                    </a>
                </li>

                <li class="package">
                    <a href="package.php">
                        <span class="icon">
                            <ion-icon name="folder-open-outline"></ion-icon>
                        </span>
                        <span class="title">Quản lý hợp đồng</span>
                    </a>
                </li>

                <li class="customers">
                    <a href="customers.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Quản lý khách hàng</span>
                    </a>
                </li>

                <li class="messages">
                    <a href="messages.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Quản lý căn hộ</span>
                    </a>
                </li>

                <li class="help">
                    <a href="help.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Quản lý nhân viên</span>
                    </a>
                </li>

                <li class="setting">
                    <a href="setting.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Cài đặt</span>
                    </a>
                </li>

                <li>
                    <a href="../user/dangxuat.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </div>
        
    <section class="dashboard">
        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search" style="display: none;">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div>
                <p class="tennguoidung">Xin chào, <strong>Nguyen Huu Nghia</strong></p>
                </div>
            </div>

            <section class="new_package">
    <!-- Show giao diện các gói đang có -->
    <!-- Button thêm/xoá/sửa gói -->
    <!-- Thêm gói -->
    <form action="" method="POST">
        <h2>Sửa thông tin nhân viên</h2>
        <div class="formbox">
        <?php
        $MANV = $_GET['id'];

        $serverName = "MSI\SQLEXPRESS"; //serverName\instanceName, portNumber (default is 1433)
        $connectionInfo = array( "Database"=>"QLCH_N7");
        $conn = sqlsrv_connect( $serverName, $connectionInfo);

        $sql = "SELECT MANV, HODEM, TEN, GIOITINH, CONVERT(varchar, NGAYSINH, 103) AS NGAYSINH, SDT, CCCD, DIACHI
        FROM NHANVIEN 
        WHERE MANV='$MANV'";
        $result = sqlsrv_query($conn, $sql);
        $editPackage = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC); 
        ?>
        <div class="container">
        <div class="name">
                <label>Nhập mã nhân viên: </label>
                <span><input type="text" value="<?php echo $editPackage['MANV']; ?>" name="packageName" class="input"></span>
            </div>
            <div class="price">
                <label>Nhập họ đệm: </label>
                <span><input type="text" value="<?php echo $editPackage['HODEM']; ?>" name="packageCost" class="input"></span>
            </div>
            <div class="price">
                <label>Nhập tên: </label>
                <span><input type="text" value="<?php echo $editPackage['TEN']; ?>" name="packageFeature1" class="input"></span>
            </div>
            <div class="packageFeature">
                <label>Nhập giới tính</label>
                <span><select class="loaich" name="packageFeature2">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select></span>
                <label>Nhập ngày sinh</label>
                <span><input type="date" value="<?php echo $editPackage['NGAYSINH']; ?>" name="packageFeature3" class="Feature"></span>
                <label>Nhập số điện thoại</label>
                <span><input type="text" value="<?php echo $editPackage['SDT']; ?>" name="packageFeature4" class="Feature"></span>
                <label>Nhập căn cước công dân</label>
                <span><input type="text" value="<?php echo $editPackage['CCCD']; ?>" name="packageFeature5" class="Feature"></span>
                <label>Nhập địa chỉ</label>
                <span><input type="text" value="<?php echo $editPackage['DIACHI']; ?>" name="packageFeature6" class="Feature"></span>
            </div>
            <input class="submit" type="submit" name="submit" value="Cập nhật">
            <?php
            // tạo kết nối
            $serverName = "MSI\SQLEXPRESS";
            $connectionInfo = array("Database"=>"QLCH_N7");
            $conn = sqlsrv_connect($serverName, $connectionInfo);

            //Them vao bang
            if(isset($_POST['submit'])){
                if(isset($_POST['packageName']))
                    $packageName = $_POST['packageName'];
                if(isset($_POST['packageCost']))
                    $packageCost = $_POST['packageCost'];
                if(isset($_POST['packageFeature1']))
                    $packageFeature1 = $_POST['packageFeature1'];
                if(isset($_POST['packageFeature2']))
                    $packageFeature2 = $_POST['packageFeature2'];
                if(isset($_POST['packageFeature3']))
                    $packageFeature3 = $_POST['packageFeature3'];
                if(isset($_POST['packageFeature4']))
                    $packageFeature4 = $_POST['packageFeature4'];
                if(isset($_POST['packageFeature5']))
                    $packageFeature5 = $_POST['packageFeature5'];
                if(isset($_POST['packageFeature6']))
                    $packageFeature6 = $_POST['packageFeature6'];
                // Sử dụng tham số truyền vào để tránh tấn công SQL Injection
                $sql = "UPDATE NHANVIEN SET MANV=?, HODEM=?, TEN=?, GIOITINH=?, NGAYSINH=?, SDT=?, CCCD=?, DIACHI=? WHERE MANV=?";
                $params = array($packageName, $packageCost, $packageFeature1, $packageFeature2, $packageFeature3, $packageFeature4, $packageFeature5, $packageFeature6, $MANV);

                $stmt = sqlsrv_prepare($conn, $sql, $params);
                if( !$stmt ) {
                    echo "Lỗi trong quá trình chuẩn bị câu lệnh SQL: ";
                    die( print_r( sqlsrv_errors(), true));
                }

                if(sqlsrv_execute($stmt)){
                    echo "<p class=\"alert\">Cập nhật thành công</p>";
                    echo '<a href="package.php">Hoàn thành</a>';
                }
                else {
                    echo "Lỗi khi thực thi câu lệnh SQL: ";
                    die( print_r( sqlsrv_errors(), true));
                }

                sqlsrv_free_stmt($stmt);
                sqlsrv_close($conn);
            }
            ?>
        </div>
        </div>
    </form>
    </section>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>