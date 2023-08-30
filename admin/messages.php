<?php
$serverName = "MSI\SQLEXPRESS";
$connectionInfo = array(
    "Database" => "QLCH",
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
    <link rel="stylesheet" href="assets/css/messages.css">
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
                    <form action="search/messages_search.php">
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
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Danh sách căn hộ</h2>
                        <div class="abtn"><a href="messages copy.php">Thêm mới</a></div>
                    </div>

                    <table class="dshd">
                        <thead>
                            <tr>
                                <td>STT</td>
                                <td>Mã căn hộ</td>
                                <td>Tên căn hộ</td>
                                <td>Giá thuê</td>
                                <td>Địa chỉ</td>
                                <td>Mã loại</td>
                                <td>Hành động</td>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            // Đặt biến
                            $stt = 0;
                            $sql = "SELECT *
                            FROM CANHO
                            ORDER BY MACH DESC";
                            $result = sqlsrv_query($conn, $sql);
                            // Vòng lặp
                            while($rows = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                            { $stt++;
                        ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $rows['MACH'];?></td>
                            <td><?php echo $rows['TENCH'];?></td>
                            <td><?php echo $rows['GIATHUE'];?></td>
                            <td><?php echo $rows['DIACHI'];?></td>
                            <td><?php echo $rows['MALOAI'];?></td>
                            <td><a href="editMessages.php?id=<?php echo $rows['MACH']?>"><?php echo "Sửa"; ?></a>
                            <a href="dltMessages.php?id=<?php echo $rows['MACH']?>"><?php echo "Xóa"; ?></a></td>
                        </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
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