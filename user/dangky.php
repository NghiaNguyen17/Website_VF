<?php

@include 'xuly.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = ($_POST['password']);
   $cpass = ($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM dulieu WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Tài khoản đã tồn tại !';

   }else{

      if($pass != $cpass){
         $error[] = 'Mật khẩu không khớp';
      }else{
         $insert = "INSERT INTO dulieu(name, email, password,user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:dangnhap.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đăng ký</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Đăng ký</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Họ và tên">
      <input type="email" name="email" required placeholder="Địa chỉ email">
      <input type="password" name="password" required placeholder="Mật khẩu">
      <input type="password" name="cpassword" required placeholder="Nhập lại mật khẩu">
      <select name="user_type" style="display: none;">
         <option value="user" checked>user</option> 
         <option value="admin">admin</option>
      </select>
      <div class="checkbox-container">
         <input type="checkbox" id="cb4">&nbsp;&nbsp;
         <label for="cb4">Tôi đã hiểu và đồng ý với <a href="https://www.meinvoice.vn/tra-cuu/Content/Document/Thoa_thuan_su_dung_phan_mem_MeInvoice.vn.pdf" target="_blank">Thỏa thuận dịch vụ</a> do VietFinance cung cấp</label>
      </div>
      <input type="submit" name="submit" value="Đăng ký " class="form-btn">
      <p>Đã có tài khoản ? <a href="dangnhap.php">Đăng nhập</a></p>
   </form>

</div>

</body>
</html>