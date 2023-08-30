<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['fullname'] ?? '';
        $email = $_POST['email'] ?? '';
        $number = $_POST['number'] ?? '';
        $citizenId = $_POST['citizenId'] ?? '';

        $isValid = true;

        if (empty($name)) {
            ?>
            <script>
                alert("Gửi câu hỏi thành công");
            </script>
            <?php

            $isValid = false;
        }

        if (empty($citizenId) && $isValid) {
            ?>
            <script>
                alert("Vui lòng nhập số chứng minh thư");
            </script>
            <?php

            $isValid = false;
        }

        if (empty($email) && $isValid) {
            ?>
            <script>
                alert("Vui lòng nhập email");
            </script>
            <?php

            $isValid = false;
        }

        if (empty($number) && $isValid) {
            ?>
            <script>
                alert("Vui lòng nhập số điện thoại");
            </script>
            <?php

            $isValid = false;
        }

        if (strlen($name) < 5  && $isValid) {
            ?>
            <script>
                alert("Tên quá ngắn");
            </script>
            <?php

            $isValid = false;
        }

        if (!preg_match('/^[0-9]{9,13}$/', $citizenId) && $isValid) {
            ?>
            <script>
                alert("Số chứng minh nhân dân/căn cước công dân không hợp lệ");
            </script>
            <?php

            $isValid = false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL) && $isValid) {
            ?>
            <script>
                alert("Email không hợp lệ");
            </script>
            <?php

            $isValid = false;
        }

        if (!preg_match('/^0[0-9]{9,11}$/', $number) && $isValid) {
            ?>
            <script>
                alert("Số điện thoại không hợp lệ");
            </script>
            <?php

            $isValid = false;
        }

        if ($isValid) {
            $sql = "INSERT INTO members (`name`, `email`, `phone`, `card_id`) VALUES ('$name', '$email', '$number', '$citizenId')";
            $result = $conn->query($sql);

            if ($result) {
                ?>
                <script>
                    alert("Đăng ký tư vấn thành công");
                    if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );}
                    header('location:trangchu.php');
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("Đăng ký tư vấn thất bại");
                    if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );}
                    header('location:trangchu.php');
                </script>
                <?php
            }
        }
    }
?>
