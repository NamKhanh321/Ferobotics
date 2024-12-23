<?php
include "../back-end/DBclasses.php";
$db = new DBclasses();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$sql = "SELECT * FROM `ykien`";
$result = $db->query($sql);
while ($row = $result->fetch_assoc()) {
    $lastid = $row['IDYK'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/progressBar.css">
    <link rel="stylesheet" href="css/font.css">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">

    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/b872ab0b46.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <title>Alpha · Robotics</title>
    <link rel="icon" href="../img/robotic2.jfif" type="image/x-icon">
    <?php require_once "php/echoHTML.php"; ?>
</head>
<body>
<?php addProgressBar() ?>
<?php addNav($db) ?>
<main>
    <div class="container roboto-regular">
        <div class="content">
            <div class="left-content">
                <h2>Nêu Ý Kiến</h2>
                <p>Đừng ngại ngần nêu ý kiến của bạn! Chúng tôi rất sẵn lòng đón nhận.</p>
                <form method="post">
                    <textarea name="ykien" id="ykien" cols="30" rows="14" placeholder="Ý kiến của bạn.."></textarea>
                    <input type="submit">
                </form>
            </div>
            <div class="right-content">
                <img src="../img/contact.png">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40" color="#000000"
                         fill="none">
                        <path d="M6.14839 5.67914C6.82645 4.85343 7.16547 4.44058 7.62894 4.22029C8.09241 4 8.62199 4 9.68114 4H15V11H9.68114C8.62199 11 8.09241 11 7.62894 10.7797C7.16547 10.5594 6.82645 10.1466 6.14839 9.32086L5.87979 8.99376C5.29326 8.27951 5 7.92239 5 7.5C5 7.07761 5.29326 6.72048 5.87979 6.00624L6.14839 5.67914Z"
                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15 21L15 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M11 21H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                    Số 284 Lạch Tray, Hải Phòng
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40" color="#000000"
                         fill="none">
                        <path d="M4.74038 14.3685L6.69351 12.9816C7.24445 12.5904 7.80305 12.3282 8.44034 12.1585C9.17201 11.9636 9.5 11.5644 9.5 10.711C9.5 8.54628 14.5 8.31594 14.5 10.711C14.5 11.5644 14.828 11.9636 15.5597 12.1585C16.202 12.3295 16.7599 12.5934 17.3065 12.9816L19.2596 14.3685C20.1434 14.9961 20.5547 15.2995 20.7842 15.7819C21 16.2358 21 16.768 21 17.8324C21 19.7461 21 20.703 20.4642 21.3164C19.8152 22.0593 18.128 21.9955 17.0917 21.9955H6.90833C5.87197 21.9955 4.21909 22.0986 3.5358 21.3164C3 20.703 3 19.7461 3 17.8324C3 16.768 3 16.2358 3.21584 15.7819C3.44526 15.2995 3.85662 14.9961 4.74038 14.3685Z"
                              stroke="currentColor" stroke-width="1.5"/>
                        <path d="M14 17C14 18.1046 13.1046 19 12 19C10.8954 19 10 18.1046 10 17C10 15.8954 10.8954 15 12 15C13.1046 15 14 15.8954 14 17Z"
                              stroke="currentColor" stroke-width="1.5"/>
                        <path d="M6.96014 3.69772C5.6417 4.07415 4.69384 4.54112 3.82645 5.10455C2.45318 5.9966 1.86443 7.60404 2.02607 9.15513C2.09439 9.81068 2.62064 10.1241 3.23089 9.95455C3.69451 9.82571 4.15888 9.7003 4.61961 9.56364C5.96706 9.16397 6.28399 8.67812 6.47124 7.29885L6.96014 3.69772ZM6.96014 3.69772C10.2186 2.76743 13.7814 2.76743 17.0399 3.69772M17.0399 3.69772C18.3583 4.07415 19.3062 4.54112 20.1735 5.10455C21.5468 5.9966 22.1356 7.60404 21.9739 9.15513C21.9056 9.81068 21.3794 10.1241 20.7691 9.95455C20.3055 9.82571 19.8411 9.7003 19.3804 9.56364C18.0329 9.16397 17.716 8.67812 17.5288 7.29885L17.0399 3.69772Z"
                              stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                    </svg>
                    +84 977189670
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40" color="#000000"
                         fill="none">
                        <path d="M7.00235 7.75L9.94437 9.48943C11.6596 10.5035 12.3451 10.5035 14.0603 9.48943L17.0023 7.75"
                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21.9977 10.75V9.77844C21.9323 6.71114 21.8996 5.17749 20.7679 4.04141C19.6361 2.90532 18.061 2.86574 14.9107 2.78659C12.9692 2.73781 11.0467 2.7378 9.10511 2.78658C5.95487 2.86573 4.37975 2.9053 3.24799 4.04139C2.11624 5.17748 2.08353 6.71113 2.01812 9.77843C1.99709 10.7647 1.99709 11.7451 2.01812 12.7314C2.08354 15.7987 2.11624 17.3323 3.248 18.4684C4.37975 19.6045 5.95487 19.6441 9.10512 19.7232C9.57337 19.735 10.5358 19.7439 11.0024 19.75"
                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20.8546 13.6893L21.547 14.3817C22.1327 14.9675 22.1327 15.9172 21.547 16.503L17.9196 20.1987C17.6342 20.484 17.2692 20.6764 16.8725 20.7505L14.6244 21.2385C14.2694 21.3156 13.9533 21.0004 14.0294 20.6452L14.5079 18.4099C14.582 18.0132 14.7743 17.6482 15.0597 17.3629L18.7333 13.6893C19.3191 13.1036 20.2688 13.1036 20.8546 13.6893Z"
                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    alpha.robotics@gmail.com
                </div>
            </div>
        </div>
    </div>
</main>
<?php addFooter() ?>

<script src="contact.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    function showErrorAlert() {
        swal({
            title: "Không thành công!",
            text: "Vui lòng đăng nhập.",
            icon: "error",
            timer: 2000,
        });
    }
    function showAlert() {
        swal({
            title: "Thành công!",
            text: "Ý kiến của bạn đã được gửi tới cho shop.",
            icon: "success",
            timer: 2000,
        });
    }
</script>
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($db->isUserLogin()===false){
        echo '<script>showErrorAlert()</script>';
    }else{
        echo '<script>showAlert()</script>';
        $ykien = $_POST['ykien'];
        $lastid =$lastid+1;
        $sql = "INSERT INTO ykien (`IDYK`,`IDUSER`, `thongtin`) VALUES ('$lastid','$user_id','$ykien ')";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }
}
?>
</body>
</html>
