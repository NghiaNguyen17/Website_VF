<?php

@include 'user\xuly.php';

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
    <link rel="stylesheet" href="assets/css/editsetting.css">
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
                        <span class="title">VietFinance</span>
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
                        <span class="title">Quản lý gói</span>
                    </a>
                </li>

                <li class="customers">
                    <a href="customers.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Khách hàng</span>
                    </a>
                </li>

                <li class="messages">
                    <a href="messages.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Yêu cầu tư vấn</span>
                    </a>
                </li>

                <li class="help">
                    <a href="help.php">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Câu hỏi từ khách hàng</span>
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
                <p class="tennguoidung">Xin chào, <strong><?php echo $_SESSION['name'] ?></strong></p>
                </div>
            </div>

            <section class="editpkg">
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
        $iduser = $_GET['id'];
        $sql = "SELECT * FROM dulieu WHERE id=$iduser";
        $result = mysqli_query($connect, $sql);
        $editPackage = mysqli_fetch_array($result);
    ?>
    <div class="editPackage">
        <h2>Cập nhật thông tin tài khoản</h2>
        <form action="" method="POST">
            <label>Họ và tên:</label>
            <input type="text" name="altTen" value="<?php echo $_SESSION['name'] ?>">
            <label>Email:</label>
            <input type="text" name="altGia" value="<?php echo $_SESSION['email'] ?>">
            <label>Mật khẩu:</label>
            <input type="password" name="altPassword" value="<?php echo $_SESSION['password'] ?>">
            <label>Quyền truy cập:</label>
            <input type="text" name="altUsertype" value="<?php echo $_SESSION['user_type']; ?>">
            <button name="submit" type="submit">Lưu thông tin</button>
        </form>
        <?php
        if(isset($_POST['submit'])){
            if(isset($_POST['altTen']))
                $altTen = $_POST['altTen'];
            if(isset($_POST['altGia']))
                $altGia = $_POST['altGia'];
            if(isset($_POST['altPassword']))
                $altPassword = $_POST['altPassword'];
            if(isset($_POST['altUsertype']))
                $altUsertype = $_POST['altUsertype'];
            $sql = "UPDATE dulieu SET name='$altTen', email='$altGia', password='$altPassword', user_type='$altUsertype' WHERE id=$iduser";
            if(mysqli_query($connect, $sql)){
                echo '<p class=pkgalert>Lưu thông tin thành công</p>';
                echo "<a class=\"goback\" href=\"../user/dangxuat.php\">Hoàn thành</a>";
            }
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