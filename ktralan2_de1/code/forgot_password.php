<?php
include "connect.php";
if(($_SERVER["REQUEST_METHOD"] == "POST"))
{
    $username = $_POST['user'];
    $newpass = $_POST['new_pass'];
    try{
        $sqlString = "UPDATE user set password=? where username=?";
        $query = $conn->prepare($sqlString);
        $query->execute([$newpass,$username]);
    }
    catch (PDOException $e){
        echo 'Lỗi sửa dữ liệu:' .$e->getMessage();
    }
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Lấy lại mật khẩu<h1>
        <form class="was-validated" action="" method="post">
            <div class="form-group">
                <label for="user">Username</label>
                <input type="text" name="user" id="user" class="form-control" placeholder="Nhập tên tài khoản">
            </div>
            <div class="form-group">
                <label for="pass">New Password</label>
                <input type="text" name="new_pass" id="pass" class="form-control" placeholder="Nhập mật khẩu mới">
            </div>
            <button class="button" type="submit">Lưu</button>
        </form>
    </div>

    
</body>
</html>