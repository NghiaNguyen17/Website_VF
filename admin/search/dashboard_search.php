<?php

session_start();
$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "viet_finance";
 $conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<?php
$db= $conn;
$tableName="dulieu";
$columns= ['id', 'name','email','password','user_type'];
$fetchData = fetch_data($db, $tableName, $columns);

function fetch_data($db, $tableName, $columns){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{

$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName"." ORDER BY id DESC";
$result = $db->query($query);

if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
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
$db= $conn;
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
    <link rel="stylesheet" href="dashboard.css">
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
                    <form action="dashboard_search.php">
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
                <p class="tennguoidung">Xin chào, <strong><?php echo $_SESSION['name'] ?></strong></p>
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">125</div>
                        <div class="cardName">Người truy cập</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <?php
                            $query = "SELECT COUNT(order_id) c FROM orders";
                            $result = $conn->query($query);
                            $row = mysqli_fetch_assoc($result);
                        ?>
                        <div class="numbers"><?php echo $row['c']; ?></div>
                        <div class="cardName">Đơn hàng</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <?php
                            $countMembers = "SELECT COUNT(id) id FROM members";
                            $resultMembers = $conn->query($countMembers);
                            $rowMembers = mysqli_fetch_assoc($resultMembers);
                        ?>
                        <div class="numbers"><?php echo $rowMembers['id']; ?></div>
                        <div class="cardName">Yêu cầu tư vấn</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <?php
                            $sumIncome = "SELECT SUM(giaGoi) income FROM orders WHERE payment_status='Đã thanh toán'";
                            $sumresultIncome = $conn->query($sumIncome);
                            $rowIncome = mysqli_fetch_assoc($sumresultIncome);
                        ?>
                        <div class="numbers"><?php echo $rowIncome['income']; ?></div>
                        <div class="cardName">Doanh thu</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Đơn hàng gần đây</h2>
                        <!-- <a href="#" class="btn">View All</a> -->
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>STT</td>
                                <td>Họ và tên</td>
                                <td>Mã gói</td>
                                <td>Thành tiền</td>
                                <td>Trạng thái</td>
                                <td>Hành động</td>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            $search='%'.$search.'%';
                            require_once('xuly.php');
                            $sql='select * from orders where maGoi like "'.$search.'" or giaGoi like "'.$search.'" or name like "'.$search.'" or email like "'.$search.'" or phone_number like "'.$search.'" or payment_status like "'.$search.'"  order by order_id';
                            $stm=mysqli_prepare($conn,$sql);
                            $a=1;
                            if(mysqli_stmt_execute($stm)){
                                $result=mysqli_stmt_get_result($stm);
                                if(mysqli_num_rows($result)>0){
                                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                    echo '<tr>';
                                    echo '<td>'.$a++.'</td>';
                                    echo '<td>'.$row['name'].'</td>';
                                    echo '<td>'.$row['maGoi'].'</td>';
                                    echo '<td>'.$row['giaGoi'].'</td>';
                                    echo '<td>'.$row['payment_status'].'</td>';
                                    echo '<td>'.'<a href="../editOrders.php?order_id='.$row['order_id'].'">'.'Hoàn thành'.'</a>'.'</td>';
                                    echo '</tr>';
                                    }
                                }	
                            }	
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Khách hàng mới đăng ký</h2>
                    </div>

                    <table>
                    <?php
                            if(is_array($fetchData)){      
                            $sn=1;
                            foreach($fetchData as $data){
                            ?>
                            <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../assets/imgs/person_circle_icon_159926.png" alt=""></div>
                            </td>
                            <td><h4><?php echo $data['name']??''; ?></h4>
                            <span style="font-size: 11pt;"><?php echo $data['email']??''; ?></span>
                        </td>
                            </td>
                            </tr>
                            <?php
                            $sn++;}}else{ ?>
                            <tr>
                                <td colspan="8">
                            <?php echo $fetchData; ?>
                        </td>
                            <tr>
                            <?php
                            }?>
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