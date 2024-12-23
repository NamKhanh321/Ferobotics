<?php
include "../back-end/DBclasses.php";
$db = new DBclasses();
?>
<!DOCTYPE html>
<html lang="en">

<?php
phpinfo();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
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
    <title>Alpha · Robotics</title>
    <link rel="icon" href="../img/robotic2.jfif" type="image/x-icon">
    <?php require_once "php/echoHTML.php"; ?>
</head>

<body>
<?php addProgressBar() ?>
<div class="loading-screen">
    <div class="loader">
        <div class="loader-1 bar"></div>

    </div>
</div>
<?php addNav($db) ?>

    <div class="slider roboto-regular">
        <div class="carousel">
            <div class="carousel-bg-wrapper"></div>
            <div class="carousel-inner">
                <div class="carousel-indicators">
                    <span class="line"></span>
                    <span class="number"></span>
                    <span class="number"></span>
                    <span class="number"></span>
                    <span class="number"></span>
                    <span class="number"></span>
                </div>
                <div class="carousel-control">
                    <button class="prev"><span class="fa-solid fa-arrow-left"></span></button>
                    <button class="next"><span class="fa-solid fa-arrow-right"></span></button>
                </div>
                <div class="content-wrapper"></div>
                <div class="slide-wrapper">
                    <div class="slide"></div>
                </div>
            </div>
        </div>
    </div>

<section id="feature">
    <div class="fe-box oswald-regular">
        <img src="../img/f1.png" alt="#">
        <p>Free Ship</p>
    </div>
    <div class="fe-box oswald-regular">
        <img src="../img/f2.png" alt="#">
        <p>Đặt Hàng Online</p>
    </div>
    <div class="fe-box oswald-regular">
        <img src="../img/f3.png" alt="#">
        <p>Tiết Kiệm</p>
    </div>
    <div class="fe-box oswald-regular">
        <img src="../img/f4.png" alt="#">
        <p>Ưu Đãi</p>
    </div>
    <div class="fe-box oswald-regular">
        <img src="../img/f5.png" alt="#">
        <p>Vui Vẻ</p>
    </div>
</section>
<section id="hot-pro">
    <h2 class="oswald-bold">Sản Phẩm Nổi Bật</h2>
    <p class="oswald-regular">Alpha Robotics</p>
    <div class="pro-container">
        <?php

        $sql = "SELECT * FROM sanpham where phanloaihang=1";
        $result = $db->query($sql);
        $total_items = mysqli_num_rows($result);
        $limit = 4;
        $total_pages = ceil($total_items / $limit);
        while ($row = mysqli_fetch_assoc($result)) {
            $formatted_price = number_format($row['gia'], 0, '', '.');
            echo '<a class="pro" href="shop.php">
                        <img src="' . $row['hinhanh'] . '" alt="hoa">
                        <div class="des roboto-regular">
                            <h3>' . $row['ten'] . '</h3>
                            <h4>' . $formatted_price . ' ₫</h4>
                        </div>
                    </a>';
        }
        ?>

    </div>
</section>
<section id="hot-pro">
    <h2 class="oswald-bold">Sản Phẩm Mới Ra</h2>
    <p class="oswald-regular">Alpha Robotics</p>
    <div class="pro-container1">
        <?php
        $sql = "SELECT * FROM sanpham where phanloaihang=2";
        $result = $db->query($sql);
        $total_items = mysqli_num_rows($result);
        $limit = 4;
        $total_pages = ceil($total_items / $limit);
        while ($row = mysqli_fetch_assoc($result)) {
        $formatted_price = number_format($row['gia'], 0, '', '.');
        echo '<a class="pro" href="shop.php">
            <img src="' . $row['hinhanh'] . '" alt="hoa">
            <div class="des roboto-regular">
                <h3>' . $row['ten'] . '</h3>
                <h4>' . $formatted_price . ' ₫</h4>
            </div>
        </a>';
        }
        ?>

    </div>
</section>
<section id="banner">
    <div class="container">
        <div class="banner-cover">
            <div class="banner-item">
                <a href="#"><img src="https://ecovacsvietnam.vn/wp-content/uploads/2022/12/Ecovacs-2.jpg" alt=""></a>
            </div>
        </div>
    </div>
</section>
<section id="customer-op">
    <h2 class="oswald-bold">Ý Kiến Khách Hàng</h2>
    <div class="op-items">
        <div class="item roboto-regular">
            <div class="star">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill">
                    <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill">
                    <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill">
                    <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill">
                    <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill">
                    <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>

            </div>
            <p class="item-content">"Robot lau nhà giúp tôi tiết kiệm rất nhiều thời gian và công sức. Chỉ cần bật máy, tôi có thể làm việc khác mà không cần phải lo lắng về việc lau dọn hay hút bụi trong nhà. Thật tiện lợi!"</p>
            <p class="author ">- Nguyễn Văn A</p>
        </div>
        <div class="item roboto-regular">
            <div class="star">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill">
                    <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill">
                    <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill">
                    <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill">
                    <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill">
                    <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>

            </div>
            <p class="item-content">"Tôi rất hài lòng với khả năng hút bụi và lau sàn của robot. Nó làm sạch rất kỹ lưỡng và có thể di chuyển đến những khu vực khó tiếp cận, giúp ngôi nhà luôn sạch sẽ mà không cần phải làm gì nhiều."</p>
            <p class="author ">- Nguyễn Thị B</p>
        </div>
        <div class="item roboto-regular">
            <div class="star">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill">
                    <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill">
                    <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill">
                    <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill">
                    <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill">
                    <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>

            </div>
            <p class="item-content">"Robot hút bụi này rất thông minh, có thể tự động điều chỉnh chế độ làm việc tuỳ theo bề mặt sàn. Nó biết cách tránh vật cản và quay lại sạc khi pin yếu, rất tiện lợi và dễ sử dụng."</p>
            <p class="author ">- Nguyễn Văn C</p>
        </div>
    </div>

</section>
<section id="brand-logo">
    <div class="container" style="display: flex; justify-content: flex-start; align-items: center;">
        <div class="brand-item">
            <img src="../img/robotic1.jfif" alt="#" style="width: 50px; height: auto;">
        </div>
    
        <div class="brand-item" style="flex-grow: 1; text-align: center;">
            <img src="../img/robotic2.jfif" alt="#" style="width: 50px; height: auto;">
        </div>
             <div class="brand-item">
            <img src="../img/robotic1.jfif" alt="#" style="width: 50px; height: auto;">
        </div>
        </div>
</section>

<?php addFooter() ?>
<script src="./home.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script>
    gsap.from(".loader-1", {
        width: 0,
        duration: 1.1,
        ease: "power2.inOut",
    });
    gsap.to(".loader", {
        opacity: 0,
        duration: 0.5,
        delay: 1,
        ease: "power2.inOut",
    });
    gsap.to(".loading-screen", {
        top: -2000,
        opacity: 0,
        duration: 1,
        delay: 1,
        ease: "power4.inOut",
    });
    gsap.to("#slider", {
        opacity: 1,
        duration: 1,
        delay: 1.6,
        ease: "power2.inOut",
    });
    gsap.fromTo(".logo", {
        opacity: 0
    }, {
        opacity: 1,
        duration: 0.3,
        delay: 2,
        ease: "power2.inOut",
    });

</script>

</body>

</html>