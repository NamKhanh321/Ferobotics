<?php

$id_cart = [];
function addNav($a)
{
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        $a->logout();
    }
    echo '
    <nav class="roboto-regular">
        <div class="nav-logo">
            <div class="login">
                <span class="openbtn" onclick="openNav()">&#9776;</span>
                ';
    if ($a->isUserLogin() === true) {
        echo '
                <a href="?action=logout">LOGOUT</a>';
    } else {
        echo '<a href="login.php">LOGIN</a>';
    };
    echo '
            </div>
            <div class="logo roboto-medium">Alpha<img src="../img/robotic1.jfif" width="26px"><span>Robotics</span></div>
            <div class="shop-inf">
                <ul>
                    <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    
                </ul>
            </div>
            
            
        </div>
        <div class="nav-links">
            <ul class="links">
                <li><a href="home.php">TRANG CHỦ</a></li>
                <li><a href="shop.php">SHOP</a></li>
                <li><a href="contact.php">Ý KIẾN</a></li>
            </ul>
        </div>
        <div id="sideMenu" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="home.php">TRANG CHỦ</a>
            <a href="shop.php">SHOP</a>
            <a href="contact.php">Ý KIẾN</a>
        </div>
    </nav>
    <script>
        function openNav() {
            document.getElementById("sideMenu").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("sideMenu").style.width = "0";
        }
    </script>
    ';
}

function addFooter()
{
    echo '<footer>
        <div class="main-footer roboto-regular">
            <div class="left-box">
                <h2>Nguyễn Việt Hà</h2>
                <div class="footer-content">
                </div>
                 <h2>Vũ Bảo Long</h2>
                <div class="footer-content">
                </div>

            </div>
            <div class="right-box">
                <h2>Bùi Khánh Nam</h2>
                <div class="footer-content">
                </div>
                <h2>Đào Đình Đức</h2>
                <div class="footer-content">
                </div>
            </div>
        </div>
        <div class="all-right roboto-regular">
            <p>Thanks for shopping - © Alpha Robotics</p>
        </div>
    </footer>';
}

function addProgressBar()
{
    echo '<div id="progressbar"></div>
    <div id="scrollPath"></div>';
}

?>
