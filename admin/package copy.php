<?php

$serverName = "MSI\SQLEXPRESS"; //serverName\instanceName, portNumber (default is 1433)
$connectionInfo = array( "Database"=>"QLCH");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

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
    <link rel="stylesheet" href="./assets/css/package.css">
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
                    <form action="search/dashboard_search.php">
                    <label>
                        <input id="inputsearch" type="text" name="search" placeholder="Tìm kiếm....">
                        <input id="submit" type="submit" value="search" style="display: none;">
                        <ion-icon name="search-outline"></ion-icon>
                        <script>
                            var input = document.getElementById("inputsearch");
                            input.addEventListener("keypress", function(event) {
                            if (event.key === "Enter") {
                                event.preventDefault();
                                document.getElementById("submit").click();
                            }
                            });
                        </script>
                    </label>
                    </form>
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
        <h2>Thêm hợp đồng</h2>
        <div class="formbox">
        <div class="container">
            <div class="name">
                <label>Nhập mã hợp đồng: </label>
                <span><input type="text" placeholder="HD..." name="packageName" class="input"></span>
            </div>
            <div class="price">
                <label>Nhập ngày bắt đầu: </label>
                <span><input type="date" placeholder="" name="packageCost" pattern="\d{1,2}/\d{1,2}/\d{4}" class="input"></span>
            </div>
            <div class="price">
                <label>Nhập ngày kết thúc: </label>
                <span><input type="date" placeholder="" name="packageFeature1" pattern="\d{1,2}/\d{1,2}/\d{4}" class="input"></span>
            </div>
            <div class="price">
                <label>Nhập ngày ký: </label>
                <span><input type="date" placeholder="" name="packageFeature1" pattern="\d{1,2}/\d{1,2}/\d{4}" class="input"></span>
            </div>
            <div class="packageFeature">
                <label>Nhập mã khách hàng</label>
                <span><input type="text" placeholder="KH..." name="packageFeature2" class="Feature"></span>
                <label>Nhập mã căn hộ</label>
                <span><input type="text" placeholder="CH..." name="packageFeature3" class="Feature"></span>
            </div>
            <input class="submit" type="submit" name="submit" value="Thêm mới">
            <?php
                // tạo kết nối
                $serverName = "MSI\SQLEXPRESS"; //serverName\instanceName, portNumber (default is 1433)
                        $connectionInfo = array( "Database"=>"QLCH");
                        $conn = sqlsrv_connect( $serverName, $connectionInfo);
                
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
                    
                $sql = "INSERT INTO HOPDONG (MAHD, NGAYBD, NGAYKT, MAKH, MACH) 
                VALUES ('$packageName','$packageCost','$packageFeature1','$packageFeature2','$packageFeature3')";
                if(sqlsrv_query($conn, $sql)){
                    echo "<p class=\"alert\">Thêm mới thành công</p>";
                    echo '<a href="package.php">Hoàn thành</a>';
                }
                else
                sqlsrv_close($conn);}
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