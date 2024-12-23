<?php
include "../back-end/DBclasses.php";

$db = new DBclasses();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Flomer · Shop hoa tươi</title>
    <link rel="icon" href="../img/icon-flower-tab.png" type="image/x-icon">
    <?php require_once "php/echoHTML.php"; ?>
</head>
<body>
<?php addProgressBar() ?>
<?php addNav($db) ?>
<section id="cart">
    <div class="container">

        <div class="cart-items ">
            <h2 class="roboto-medium">Giỏ hàng</h2>
            <div class="item-container">
                <?php


                $productIds = isset($_SESSION['productIds']) ? $_SESSION['productIds'] : [];
                $productIds = array_unique($productIds);
                $_SESSION['productIds'] = $productIds;


                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
                    $deleteId = $_POST['delete'];
                    if (($key = array_search($deleteId, $_SESSION['productIds'])) !== false) {
                        unset($_SESSION['productIds'][$key]);
                        $_SESSION['productIds'] = array_values(array_unique($_SESSION['productIds']));
                    }
                }
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantity']) && isset($_POST['product_id'])) {
                    $productId = $_POST['product_id'];
                    $quantity = $_POST['quantity'];

                    if (!isset($_SESSION['quantities'])) {
                        $_SESSION['quantities'] = [];
                    }
                    $_SESSION['quantities'][$productId] = $quantity;
                }
                $productQuantities = isset($_SESSION['quantities']) ? $_SESSION['quantities'] : [];

                if (!empty($productIds)) {
                    $productIds = array_unique($productIds);
                    $ids = implode(',', $productIds);
                    $sql = "SELECT * FROM sanpham WHERE ID IN ($ids)";
                    $result = $db->query($sql);
                    if ($result) {
                        while ($row = $result->fetch_assoc()) {
                            $productId = $row['ID'];
                            $makhuyenmai = $row['makhuyenmai'];
                            $sqlkm = "SELECT * FROM khuyenmai WHERE makhuyenmai = $makhuyenmai";
                            $formatted_price = number_format($row['gia'], 0, '', '.');
                            $resultkm = $db->query($sqlkm);
                            $giatrikm = mysqli_fetch_assoc($resultkm);
                            $quantity = isset($productQuantities[$productId]) ? $productQuantities[$productId] : 1;
                            if ($makhuyenmai == 1) {
                                echo '<div class="item" data-price="' . $row['gia'] . '">
                            <div class="item-img"><img src="' . $row['hinhanh'] . '" alt="hoa"></div>
                            
                            <div class="des roboto-regular">
                                <h3>' . $row['ten'] . ' </h3>
                                <span class="classify">Phân loại: ' . $row['loai'] . '</span>
                                <span class="price-new">' . $formatted_price . ' ₫</span>
                                <form action="cart.php" method="post" class="delete-form">
                                    <input type="hidden" name="delete" value="' . $row['ID'] . '">
                                    <button type="submit" class="delete"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                                <form action="cart.php" method="post" class="quantity-form">
                                        <div class="quantity">
                                            <button type="button" class="decrease-btn">-</button>
                                            <input type="number" name="quantity" class="quantity-num" value="' . $quantity . '">
                                            <button type="button" class="increase-btn">+</button>
                                            <input type="hidden" name="product_id" value="' . $productId . '">
                                        </div>
                                </form>
                            </div>
                          </div>';
                            } else {
                                echo '<div class="item" data-price="' . $row['gia'] - $giatrikm['giatrikm'] . '" data-price-sale="' . $giatrikm['giatrikm'] . '" id="' . $row['ID'] . '" data-id="' . $row['ID'] . '">
                            <div class="item-img"><img src="' . $row['hinhanh'] . '" alt="hoa"></div>
                            
                            <div class="des roboto-regular">
                                <h3>' . $row['ten'] . ' </h3>
                                <span class="classify">Phân loại: ' . $row['loai'] . '</span>
                                <span class="price-old">' . $formatted_price . ' ₫</span>
                                <span class="price-new">' . number_format($row['gia'] - $giatrikm['giatrikm'], 0, ',', '.') . '  ₫</span>
                                <form action="cart.php" method="post" class="delete-form">
                                    <input type="hidden" name="delete" value="' . $row['ID'] . '">
                                    <button type="submit" class="delete"><i class="fa-regular fa-trash-can"></i></button>
                                </form>                          
                                <form action="cart.php" method="post" class="quantity-form">
                                        <div class="quantity">
                                            <button type="button" class="decrease-btn">-</button>
                                            <input type="number" name="quantity" class="quantity-num" value="' . $quantity . '">
                                            <button type="button" class="increase-btn">+</button>
                                            <input type="hidden" name="product_id" value="' . $productId . '">
                                        </div>
                                </form>
                            </div>
                          </div>';
                            }

                        }
                    } else {
                        echo '<p>Không có sản phẩm nào.</p>';
                    }
                } else {
                    echo '<p>Không có sản phẩm nào.</p>';
                }
                ?>
            </div>
        </div>
        <div class="right-container">
            <div class="total-amount">
                <h2 class="roboto-medium">Chi tiết thanh toán</h2>
                <?php
                if (!empty($productIds)) {
                    echo '<div class="des roboto-regular">
                    <div class="detail">
                        <span>Tổng tiền hàng</span>
                        <span id="total-price"></span>
                    </div>
                    <div class="detail">
                        <span>Tổng tiền phí vận chuyển</span>
                        <span>50.000</span>
                    </div>
                    <div class="detail last">
                        <span>Giảm giá</span>
                        <span id="total-sale"></span>
                    </div>
                    <div class="total">
                        <span>Tổng thanh toán</span>
                        <span style="font-weight: 600" id="total"></span>
                    </div>
                </div>
            </div>
            <div class="payment-method roboto-regular">
                <span>Phương thức thanh toán</span>
                <div class="method">
                    Thanh toán khi nhận hàng
                    

                </div>

            </div>
            <form method="POST">
            <div class="message roboto-regular">
                <p>Lời nhắn cho Shop</p>
                <textarea type="text" id="message" name="message" rows="2" placeholder="Để lại lời nhắn cho shop"></textarea>
            </div>
            
                <input type="hidden" name="action" value="confirm_payment">
                <button type="submit" class="confirm roboto-regular">Xác nhận thanh toán</button>
            </form>
        ';
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php addFooter() ?>

<script src="cart.js"></script>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'confirm_payment') {
    if (isset($_SESSION['user_id'])) {
        $productIds = isset($_SESSION['productIds']) ? $_SESSION['productIds'] : [];
        $productQuantities = isset($_SESSION['quantities']) ? $_SESSION['quantities'] : [];

        if (empty($productIds)) {
            echo "Cart is empty.";
        } else {
            $user_id = isset($_SESSION['user_id']);
            $date = date('Y-m-d H:i:s');
            $order_id = 0;
            $total_value = 0;
            $sql = "SELECT * FROM hoadon ORDER BY IDHD";
            $result = $db->query($sql);
            $row = $result->fetch_assoc();
            while ($row = $result->fetch_assoc()) {
                $order_id = $row['IDHD'];
            }
            $order_id +=1;
            $note = $_POST['message'];
            foreach ($productIds as $productId) {
                $quantity = isset($productQuantities[$productId]) ? $productQuantities[$productId] : 1;
                $sql = "SELECT * FROM sanpham WHERE ID = $productId";
                $result = $db->query($sql);
                $row = $result->fetch_assoc();
                if ($row['makhuyenmai'] == 2) {
                    $total_value += ($row['gia'] - 300000) * $quantity;
                } else {
                    $total_value += $row['gia'] * $quantity;
                }
            }
            $total_value += 50000;


            $sql = "INSERT INTO hoadon (IDHD,IDUSER,tongtien,note, ngaylap) VALUES (?,?,?,?,? )";
            $stmt = $db->prepare($sql);
            $stmt->bind_param('iiiss', $order_id, $user_id, $total_value, $note, $date);
            $stmt->execute();
            if ($db->prepare($sql)) {
                foreach ($productIds as $productId) {
                    $quantity = isset($productQuantities[$productId]) ? $productQuantities[$productId] : 1;
                    $sql = "INSERT INTO chitiethoadon (IDHD, ID, soluong) VALUES (?,?,?)";

                    $stmt = $db->prepare($sql);
                    $stmt->bind_param('iii', $order_id, $productId, $quantity);
                    $stmt->execute();
                }
                unset($_SESSION['productIds']);
                unset($_SESSION['quantities']);

            } else {
                echo "Error";
            }
            echo '<script>showAlert()</script>';
            echo '<meta http-equiv="refresh" content="2">';

        }
    } else {
        echo '<script>showErrorAlert()</script>';
    }

}?>
</body>
</html>