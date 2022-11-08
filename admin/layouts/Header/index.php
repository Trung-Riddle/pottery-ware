<link rel="stylesheet" href="./style/Header.css">
<header>
    <div class="Logo">
        <div class="avatarLogo">
            <img src="../asset/image/amphora.png" alt="Pottery Ware">
        </div>
        <div class="contentLogo">
            <h2>Pottery ware</h2>
            <p>Admin</p>
        </div>
    </div>
    <div class="Menu">
        <li>
            <ion-icon name="home-outline"></ion-icon>
            <a href="<?= $_SERVER["PHP_SELF"] ?>?act=dashboard">
                <span>Tổng quát</span>
            </a>
        </li>
        <li>
            <ion-icon name="cart-outline"></ion-icon>
            <a href="<?= $_SERVER["PHP_SELF"] ?>?act=order">
                <span>Đơn hàng</span>
            </a>
        </li>
        <li>
            <ion-icon name="newspaper-outline"></ion-icon>
            <a href="<?= $_SERVER["PHP_SELF"] ?>?act=posts">
                <span>Bài viết</span>
            </a>
        </li>
        <li>
            <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
            <a href="<?= $_SERVER["PHP_SELF"] ?>?act=comment">
                <span>Bình luận</span>
            </a>
        </li>
        <li>
            <ion-icon name="list-outline"></ion-icon>
            <a href="<?= $_SERVER["PHP_SELF"] ?>?act=category">
                <span>Danh mục</span>
            </a>
        </li>
        <li>
            <ion-icon name="clipboard-outline"></ion-icon>
            <a href="<?= $_SERVER["PHP_SELF"] ?>?act=product">
                <span> Sản phẩm</span>
            </a>
        </li>
        <li>
            <ion-icon name="pie-chart-outline"></ion-icon>
            <a href="<?= $_SERVER["PHP_SELF"] ?>?act=charts">
                <span>Thống kê</span>
            </a>
        </li>
        <li>
            <ion-icon name="receipt-outline"></ion-icon>
            <a href="<?= $_SERVER["PHP_SELF"] ?>?act=contacts">
                <span>Liên hệ</span>
            </a>
        </li>
        <li>
            <ion-icon name="send-outline"></ion-icon>
            <a href="<?= $_SERVER["PHP_SELF"] ?>?act=sendmail">
                <span>Gửi thư</span>
            </a>
        </li>
    </div>
</header>