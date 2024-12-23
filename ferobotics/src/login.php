<?php
include "../back-end/DBclasses.php";
$db = new DBclasses();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/progressBar.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b872ab0b46.js" crossorigin="anonymous"></script>
    <title>Alpha · Robotics</title>
    <link rel="icon" href="../img/robotic2.jfif" type="image/x-icon">
    <?php require_once "php/echoHTML.php"; ?>
</head>

<body class="main-bg">
    <div id="progressbar"></div>
    <div id="scrollPath"></div>
    <?php addNav($db); ?>

    <?php

    $db->connect(); 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        $username = mysqli_real_escape_string($db->conn, $_POST['taikhoan']);
        $password = mysqli_real_escape_string($db->conn, $_POST['matkhau']);
        $sql = "SELECT * FROM user WHERE taikhoan = '$username'";
        $result = $db->query($sql);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            if ($password == $user['matkhau']) {
                if ($user['maquyen'] == 1) {
                    header("Location: home.php");
                    $_SESSION['user_id'] = $user['IDUSER'];
                    exit();
                } elseif ($user['maquyen'] == 2) {
                    header("Location: dashboard.php");
                    $_SESSION['user_id'] = $user['IDUSER'];
                    $_SESSION['user_maquyen'] = $user['maquyen'];
                    exit();
                }
            } else {
                echo "<script>alert('Mật khẩu không đúng.');</script>";
            }
        } else {
            echo "<script>alert('Tài khoản không tồn tại.');</script>";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
        $ho = mysqli_real_escape_string($db->conn, $_POST['ho']);
        $ten = mysqli_real_escape_string($db->conn, $_POST['ten']);
        $gioitinh = mysqli_real_escape_string($db->conn, $_POST['gioitinh']);
        $sdt = mysqli_real_escape_string($db->conn, $_POST['sdt']);
        $email = mysqli_real_escape_string($db->conn, $_POST['email']);
        $taikhoan = mysqli_real_escape_string($db->conn, $_POST['taikhoan']);
        $matkhau = mysqli_real_escape_string($db->conn, $_POST['matkhau']);
        $diachi = mysqli_real_escape_string($db->conn, $_POST['diachi']);
        


        $sql = "INSERT INTO user (ho, ten, gioitinh, sdt, email, diachi, taikhoan, matkhau, maquyen) 
                VALUES ('$ho', '$ten', '$gioitinh', '$sdt', '$email', '$diachi', '$taikhoan', '$matkhau', '1')";
        if ($db->query($sql)) {
            echo "<script>alert('Đăng kí thành công!');</script>";
        } else {
            echo "<script>alert('Có lỗi xảy ra khi đăng kí.');</script>";
        }
    }
    $db->disconnect(); 
    ?>

    <div class="wrapper login-container">

        <div id="login-form" class="container-content margin-t-md">
            <form method="post">
                <div class="text-c">
                     <div class="logo roboto-medium"><img src="../img/robotic1.jfif" width="26px"><span>Robotics</span></div>
                </div>
                <div class="form-tabs text-c margin-t-md">
                    <button type="button" onclick="showForm('login')" class="form-button margin-g-sm">Đăng Nhập</button>
                    <button type="button" onclick="showForm('register')" class="form-button margin-g-sm">Đăng Kí</button>
                </div>
                <div class="form-group">
                    <input type="text" name="taikhoan" class="form-control margin-b-md" placeholder="Tài Khoản" required>
                </div>
                <div class="form-group">
                    <input type="password" name="matkhau" class="form-control margin-b-md" placeholder="Mật Khẩu" required>
                </div>
                <button type="submit" name="login" class="form-button button-l margin-t-md">Đăng Nhập</button>
            </form>
        </div>
        <div id="register-form" class="container-content margin-t-md" style="display: none;">
            <form method="post" onsubmit="return validateRegisterForm()">
                <div class="text-c">
                    <div class="logo roboto-medium"><img src="../img/robotic1.jfif" width="26px"><span>Robotics</span></div>
                </div>
                <div class="form-tabs text-c margin-t-md">
                    <button type="button" onclick="showForm('login')" class="form-button margin-g-sm">Đăng Nhập</button>
                    <button type="button" onclick="showForm('register')" class="form-button margin-g-sm">Đăng Kí</button>
                </div>
                <div>
                    <input type="text" name="ho" class="form-control1 margin-b-md1" placeholder="Nhập họ" required>
                    <input type="text" name="ten" class="form-control1 margin-b-md1" placeholder="Nhập tên" required>
                    <select name="gioitinh" class="form-control1 margin-b-md1" required>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" name="taikhoan" class="form-control margin-b-md" placeholder="Nhập tên tài khoản" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control margin-b-md" placeholder="Nhập email" required>
                </div>
                <div class="form-group">
                    <input type="password" id="matkhau" name="matkhau" class="form-control margin-b-md" placeholder="Nhập mật khẩu" required>
                </div>
                <div class="form-group">
                    <input type="password" id="confirm-password" class="form-control margin-b-md" placeholder="Nhập lại mật khẩu" required>
                </div>
                <div class="form-group">
                    <input type="tel" id="sdt" name="sdt" class="form-control margin-b-md" placeholder="Nhập số điện thoại" required>
                </div>
                <div class="form-group">
                    <input type="text" name="diachi" class="form-control margin-b-md" placeholder="Nhập địa chỉ" required>
                </div>
                <button type="submit" name="register" class="form-button button-l margin-t-md">Đăng Kí</button>
            </form>
        </div>
    </div>


    <script>
        function showForm(formType) {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'none';

            if (formType === 'login') {
                document.getElementById('login-form').style.display = 'block';
            } else if (formType === 'register') {
                document.getElementById('register-form').style.display = 'block';
            }
        }

        window.onload = function() {
            showForm('login');
        }

        function validateRegisterForm() {
            const password = document.getElementById('matkhau').value;
            if (password.length < 6) {
                alert("Mật khẩu phải có ít nhất 6 ký tự.");
                return false;
            }
            if (password.includes(" ")) {
                alert("Mật khẩu khong duoc chua dau cach.");
                return false;
            }

            const confirmPassword = document.getElementById('confirm-password').value;
            if (password !== confirmPassword) {
                alert("Mật khẩu nhập lại không khớp.");
                return false;
            }

            const phone = document.getElementById('sdt').value;
            const phoneRegex = /^\d{10,}$/;
            if (!phoneRegex.test(phone)) {
                alert("Số điện thoại phải có ít nhất 10 chữ số.");
                return false;
            }
            return true;
        }
    </script>

    <footer><?php addFooter(); ?></footer>
    <script src="./home.js"></script>
</body>
</html>
