<header class="header shadow-01">
    <div class="container">
        <div class="row-2 v-center">
            <div class="header-item item-left">
                <div class="logo1">
                    <a href="<?= $_SERVER['PHP_SELF'] ?>">
                        <img src="./view/image/amphora.png" alt="pottery ware">
                        <span>Pottery ware</span>
                    </a>
                </div>
            </div>
            <!-- menu start here -->
            <div class="header-item item-center">
                <div class="menu-overlay">
                </div>
                <nav class="menu">
                    <div class="mobile-menu-head">
                        <div class="go-back"><i class="fa fa-angle-left"></i></div>
                        <div class="current-menu-title"></div>
                        <div class="mobile-menu-close"><i class="fa-light fa-xmark"></i></div>
                    </div>
                    <ul class="menu-main">
                        <li>
                            <a href="<?= $_SERVER['PHP_SELF'] ?>">trang chủ</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="<?= $_SERVER['PHP_SELF'] ?>?page=introduce">Giới Thiệu</a>
                            <!-- <div class="sub-menu mega-menu mega-menu-column-4">
                                <div class="list-item text-center">
                                    <a href="#">
                                        <img src="https://cdn.shopify.com/s/files/1/0616/4833/9114/products/shop04.2.jpg?v=1657181639"
                                            alt="new Product">
                                        <h4 class="title">Bình Hoa Antic</h4>
                                    </a>
                                </div>
                                <div class="list-item text-center">
                                    <a href="#">
                                        <img
                                            src="https://cdn.shopify.com/s/files/1/0616/4833/9114/products/shop01.jpg?v=1657276071">
                                        <h4 class="title">Bình đất sét</h4>
                                    </a>
                                </div>
                                <div class="list-item text-center">
                                    <a href="#">
                                        <img src="https://cdn.shopify.com/s/files/1/0616/4833/9114/products/shop01.1.jpg?v=1657276071"
                                            alt="new Product">
                                        <h4 class="title">Bình Đất sét</h4>
                                    </a>
                                </div>
                                <div class="list-item text-center">
                                    <a href="#">
                                        <img src="https://cdn.shopify.com/s/files/1/0616/4833/9114/products/shop01.2.jpg?v=1657276071"
                                            alt="new Product">
                                        <h4 class="title">Bình Đất Sét</h4>
                                    </a>
                                </div>
                            </div> -->
                        </li>
                        <li class="menu-item-has-children">
                            <a href="<?= $_SERVER['PHP_SELF'] ?>?page=product">Sản Phẩm <i
                                    class="fa-light fa-chevron-down"></i></a>
                            <div class="sub-menu mega-menu mega-menu-column-4">
                                <div class="list-item">
                                    <h4 class="title">Bát đĩa</h4>
                                    <ul>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                    </ul>
                                    <h4 class="title">Bình Hoa</h4>
                                    <ul>
                                        <li><a href="#">Tên Sản Phẩm</a></li>
                                        <li><a href="#">Tên Sản Phẩm</a></li>
                                        <li><a href="#">Tên Sản Phẩm</a></li>
                                    </ul>
                                </div>
                                <div class="list-item">
                                    <h4 class="title">Linh vật đất sét</h4>
                                    <ul>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                    </ul>
                                    <h4 class="title">Nồi đất sét</h4>
                                    <ul>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                    </ul>
                                </div>
                                <div class="list-item">
                                    <h4 class="title">Sản phẩm nổi bật</h4>
                                    <ul>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                        <li><a href="#">Tên sản phẩm</a></li>
                                    </ul>
                                </div>
                                <div class="list-item">
                                    <img src="https://cdn.shopify.com/s/files/1/0616/4833/9114/files/grid02_d0e5bce2-d241-4460-b467-dad5af99786e.jpg?v=1657170207"
                                        alt="shop">
                                </div>
                            </div>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="<?= $_SERVER['PHP_SELF'] ?>?page=news">Tin Tức <i
                                    class="fa-light fa-chevron-down"></i></a>
                            <div class="sub-menu single-column-menu">
                                <ul>
                                    <li><a href="<?= $_SERVER['PHP_SELF'] ?>?page=news#New_posts">Tin Mới Nhất</a></li>
                                    <li><a href="<?= $_SERVER['PHP_SELF'] ?>?page=news#nb_posts">Tin Nổi Bật</a></li>
                                    <li><a href="<?= $_SERVER['PHP_SELF'] ?>?page=news#nb_posts">Nghệ Thuật làm gốm</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="<?= $_SERVER['PHP_SELF'] ?>?page=contacts">Liên hệ</a>
                        </li>
                        <?php if(isset($_COOKIE['ur_id']) && ($ur_id == substr($_COOKIE['ur_id'], 4))) { ?>
                        <li id="isLogin" class="menu-item-has-children" style="padding: 0 10px">
                            <a href="" style="color: #edb2a0;">
                                <?= $ur_name ?>
                            </a>
                            <img class="avt-main-menu" src="./upload/avatar/<?= $ur_avatar ?>" alt="avatar">
                            <div class="sub-menu single-column-menu">
                                <ul>
                                    <li>
                                        <a href="<?= $_SERVER['PHP_SELF'] ?>?page=profile">
                                            <i class="fa-light fa-user"></i>&nbsp;
                                            Tài khoản
                                        </a>
                                    </li>
                                    <?php 
                                    $ur_id == substr($_COOKIE['ur_id'], 4);
                                    if(countDataDB("SELECT count(*) FROM user WHERE ur_id = '$ur_id' AND ur_role = 2") != 0) 
                                    { ?>
                                    <li>
                                        <a href="./admin">
                                            <i class="fa-light fa-user-shield"></i>&nbsp;
                                            Quản lý
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <li>
                                        <a href="<?= $_SERVER['PHP_SELF'] ?>?page=managerOrder"><i
                                                class="fa-light fa-bags-shopping"></i>&nbsp; Đơn hàng</a>
                                    </li>
                                    <li><a href="<?= $_SERVER['PHP_SELF'] ?>" onclick="
                                                document.cookie = 'ur_id=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/;'
                                                sessionStorage.clear()
                                            ">
                                            <i class="fa-light fa-arrow-right-from-bracket"></i>&nbsp;
                                            Đăng xuất</a></li>
                                </ul>
                            </div>
                        </li>
                        <?php } else { ?>
                        <li id="notLogin" class="menu-item-has-children">
                            <a href="">Tài Khoản <i class="fa-light fa-chevron-down"></i></a>
                            <div class="sub-menu single-column-menu">
                                <ul>
                                    <li><a href="./view/layouts/Login/index.php"> <i class="fa-light fa-user"></i>&nbsp;
                                            Đăng Nhập</a></li>
                                    <li><a href="./view/layouts/Login/index.php"><i
                                                class="fa-light fa-user-plus"></i>&nbsp; Đăng ký</a></li>
                                </ul>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
            <!-- menu end here -->
            <div class="header-item item-right">
                <a href="<?= $_SERVER['PHP_SELF'] ?>?page=addCart" style="position: relative;">
                    <i class="fa-light fa-cart-plus"></i>
                    <?php if(isset($_SESSION['carts']) && (count($_SESSION['carts']) > 0)) { ?>
                    <div class="countCarts">
                        <?= count($_SESSION['carts']) ?>
                    </div>
                    <?php } ?>
                </a>
                <!-- <a href="#"><i class="fa-light fa-heart"></i></a> -->
                <label for="search-check"><i class="fa-light fa-magnifying-glass"></i></label>
                <input type="checkbox" name="" id="search-check" hidden>
                <div class="search-every">
                    <input type="search" placeholder="Tìm kiếm sản phẩm..." name="" id="search-all">
                </div>
                <!-- mobile menu trigger -->
                <div class="mobile-menu-trigger">
                    <i class="fa-regular fa-grid"></i>
                </div>
            </div>
        </div>
    </div>
</header>