<?php

$serverName = "MSI\SQLEXPRESS"; //serverName\instanceName, portNumber (default is 1433)
$connectionInfo = array( "Database"=>"QLCH");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

session_start();

?>
<?php 
$search=$_GET['search'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="package.css">
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
                    <form action="messages_search.php">
                    <label>
                        <input id="inputsearch" type="text" name="search" value="<?php echo $search; ?>">
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
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Thông tin hợp đồng</h2>
                    </div>

                    <table class="user_list">
                        <thead>
                            <tr>
                                <td>STT</td>
                                <td>Mã hợp đồng</td>
                                <td>Ngày bắt đầu</td>
                                <td>Ngày kết thúc</td>
                                <td>Mã khách hàng</td>
                                <td>Mã căn hộ</td>
                                <td>Hành động</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $search='%'.$search.'%';
                        $sql="SELECT MAHD, CONVERT(varchar, NGAYBD, 103) AS NGAYBD, CONVERT(varchar, NGAYKT, 103) AS NGAYKT, THOIGIAN, MAKH, MACH  FROM HOPDONG WHERE MAHD LIKE '%$search%' OR MAKH LIKE '%$search%' OR MACH LIKE '%$search%' OR NGAYBD LIKE '%$search%' OR NGAYKT LIKE '%$search%' ORDER BY MAHD";
                        $stmt = sqlsrv_query($conn, $sql);
                        $a=1;
                        if($stmt){
                            while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
                                echo '<tr>';
                                echo '<td>'.$a++.'</td>';
                                echo '<td>'.$row['MAHD'].'</td>';
                                echo '<td>'.$row['NGAYBD'].'</td>';
                                echo '<td>'.$row['NGAYKT'].'</td>';
                                echo '<td>'.$row['MACH'].'</td>';
                                echo '<td>'.$row['MAKH'].'</td>';
                                echo '<td>'.'<a href="../editpackage.php">'.'Sửa'.'</a>'.'</td>';
                                echo '</tr>';
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>