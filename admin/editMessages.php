<?php
$serverName = "MSI\SQLEXPRESS";
$connectionInfo = array(
    "Database" => "QLCH_N7",
    "CharacterSet" => "UTF-8"
);
$conn = sqlsrv_connect($serverName, $connectionInfo);
header('Content-Type: text/html; charset=utf-8');

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/editMessages.css">
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

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div>
                <p class="tennguoidung">Xin chào, <strong>Nguyễn Hữu Nghĩa</strong></p>
                </div>
            </div>

            <section class="editpkg">
            <?php
            $MACH = $_GET['id'];

            $serverName = "MSI\SQLEXPRESS"; //serverName\instanceName, portNumber (default is 1433)
            $connectionInfo = array( "Database"=>"QLCH_N7");
            $conn = sqlsrv_connect( $serverName, $connectionInfo);

            $sql = "SELECT * FROM CANHO WHERE MACH='$MACH'";
            $result = sqlsrv_query($conn, $sql);
            $editPackage = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC); 
            ?>
            <div class="editPackage">
                <h2>Sửa thông tin căn hộ</h2>
                <form action="" method="POST">
                    <label>Mã căn hộ:</label>
                    <input type="text" name="altTen" value="<?php echo $editPackage['MACH']; ?>" readonly>
                    <label>Tên căn hộ:</label>
                    <input type="text" name="altGia" value="<?php echo $editPackage['TENCH']; ?>">
                    <label>Giá thuê:</label>
                    <input type="text" name="packageFeature1" value="<?php echo $editPackage['GIATHUE']; ?>">
                    <label>Địa chỉ:</label>
                    <input type="text" name="packageFeature2" value="<?php echo $editPackage['DIACHI']; ?>">
                    <label>Nhập mã loại căn hộ</label>
                <span><select class="loaich" name="packageFeature3">
                    <option value="<?php echo $editPackage['MALOAI']; ?>">Mã căn hộ hiện tại: <?php echo $editPackage['MALOAI']; ?></option>
                    <option value="1N1K">1N1K</option>
                    <option value="2N1K">2N1K</option>
                    <option value="3N1K">3N1K</option>
                    <option value="2N2K">2N2K</option>
                    <option value="3N2K">3N2K</option>
                </select></span>
                    <button name="submit" type="submit">Lưu thông tin</button>
                </form>
                <?php
            // tạo kết nối
            $serverName = "MSI\SQLEXPRESS";
            $connectionInfo = array("Database"=>"QLCH_N7");
            $conn = sqlsrv_connect($serverName, $connectionInfo);

            //Them vao bang
            if(isset($_POST['submit'])){
                if(isset($_POST['altTen']))
                    $altTen = $_POST['altTen'];
                if(isset($_POST['altGia']))
                    $altGia = $_POST['altGia'];
                if(isset($_POST['packageFeature1']))
                    $packageFeature1 = $_POST['packageFeature1'];
                if(isset($_POST['packageFeature2']))
                    $packageFeature2 = $_POST['packageFeature2'];
                if(isset($_POST['packageFeature3']))
                    $packageFeature3 = $_POST['packageFeature3'];
                    
                // Sử dụng tham số truyền vào để tránh tấn công SQL Injection
                $sql = "UPDATE CANHO SET MACH=?, TENCH=?, GIATHUE=?, DIACHI=?, MALOAI=? WHERE MACH=?";
                $params = array($altTen, $altGia, $packageFeature1, $packageFeature2, $packageFeature3, $MAKH);

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
    </section>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>