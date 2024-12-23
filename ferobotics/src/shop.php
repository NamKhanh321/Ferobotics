<?php
include "../back-end/DBclasses.php";

$db = new DBclasses();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shop.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/progressBar.css">
    <link rel="stylesheet" href="css/font.css">

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

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
<?php addNav($db) ?>
<section id="shop">
    <div class="container">
        <div class="showcase">
            <div class="filters roboto-regular">
                <div class="left-filters">
                    <span class="span">Sắp xếp theo</span>
                    <div class="sort-by-options">
                        <a href="shop.php?filter=1">
                            <button class="<?= isset($_GET['filter']) && $_GET['filter'] == 1 ? 'active-filter' : '' ?>">
                                Phổ Biến
                            </button>
                        </a>
                        <a href="shop.php?filter=2">
                            <button class="<?= isset($_GET['filter']) && $_GET['filter'] == 2 ? 'active-filter' : '' ?>">
                                Mới Nhất
                            </button>
                        </a>
                        
                        <a href="shop.php?filter=3">
                            <button class="<?= isset($_GET['filter']) && $_GET['filter'] == 3 ? 'active-filter' : '' ?>">
                                Bán Chạy
                            </button>
                        </a>
                                           
                    </div>
                    <form method="GET" action="shop.php">
                        <input class="input" type="text" name="search" placeholder="Tìm kiếm sản phẩm...">
                        <button class="button" type="submit">
  <span>
    <svg viewBox="0 0 24 24" height="18" width="18" xmlns="http://www.w3.org/2000/svg"><path
                d="M9.145 18.29c-5.042 0-9.145-4.102-9.145-9.145s4.103-9.145 9.145-9.145 9.145 4.103 9.145 9.145-4.102 9.145-9.145 9.145zm0-15.167c-3.321 0-6.022 2.702-6.022 6.022s2.702 6.022 6.022 6.022 6.023-2.702 6.023-6.022-2.702-6.022-6.023-6.022zm9.263 12.443c-.817 1.176-1.852 2.188-3.046 2.981l5.452 5.453 3.014-3.013-5.42-5.421z"></path></svg>
  </span>
                        </button>
                    </form>
                </div>
                <div class="right-filters"><?php if (isset($_GET['category']) || isset($_GET['filter']) || isset($_GET['search'])): ?>

                        <a href="shop.php" class="clear-filter roboto-regular">
                            <button><i class="fa-solid fa-filter-circle-xmark"></i></button>
                        </a>
                    <?php endif; ?></div>
            </div>
            <div class="showcase-items">
                <?php

                $Filter = '';
                if (isset($_GET['filter'])) {
                    $filterhang = $_GET['filter'];
                    $Filter = "WHERE phanloaihang = '$filterhang'";
                }
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $Filter = "WHERE ten LIKE '%$search%'";
                }
                $sql = "SELECT * FROM sanpham $Filter";
                $result = $db->query($sql);
                $total_items = mysqli_num_rows($result);
                $limit = 12;
                $total_pages = ceil($total_items / $limit);
                while ($row = mysqli_fetch_assoc($result)) {
                    $truncatedtem = htmlspecialchars((mb_strlen($row['ten'], 'UTF-8') > 18) ? mb_substr($row['ten'], 0, 18, 'UTF-8') . '..' : $row['ten']);
                    $formatted_price = number_format($row['gia'], 0, '', '.');
                    echo '<div class="item">
                        <img src="' . $row['hinhanh'] . '" alt="hoa">
                        <div class="des roboto-regular">
                            <a class="h3" href="chitietsanpham.php?id=' . $row['ID'] . '">' . $truncatedtem . '</a>
                            <h4>' . $formatted_price . ' ₫</h4>
                            <form method="post">
                            <button type="submit" name="product_id" value="' . $row['ID'] . '"><i class="fa-solid fa-cart-shopping"></i></button>
                            </form>
                        </div>
                    </div>';
                }

                ?>

            </div>
            <ul class="listPage roboto-regular">
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li onclick="changePage(<?= $i ?>)" class="<?= $i === 1 ? 'active' : '' ?>"><?= $i ?></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    function showAlert() {
        Swal.fire({
            title: 'THÔNG BÁO',
            text: 'Thêm sản phẩm thành công',
            icon: 'success',
            timer: 1500,
            showConfirmButton: false,
            customClass: {
                popup: 'roboto-regular'
            }
        });
    }


</script>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    echo '<script type="text/javascript">showAlert();</script>';
    $productId = $_POST['product_id'];
    if (!isset($_SESSION['productIds'])) {
        $_SESSION['productIds'] = [];
    }
    $_SESSION['productIds'][] = $productId;
    error_log(print_r($_SESSION['productIds'], true));
}
?>
<?php addFooter() ?>
<script src="shop.js"></script>

</body>
</html>