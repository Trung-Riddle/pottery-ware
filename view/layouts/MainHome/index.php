<?php
    $pro = selectAllDataDB("SELECT * FROM product ORDER BY prd_id DESC LIMIT 0, 6");
    $proView = selectAllDataDB("SELECT * FROM product ORDER BY prd_view DESC LIMIT 0, 6");
?>
<div class="secsion-product-new">
    <h2 class="text-center">Sản Phẩm Mới Nhất</h2>
    <div class="container">
        <div class="row">
            <?php foreach($pro as $value) { extract($value)?>
            <div class="col-6 col-lg-2  col-md-3">
                <div class="product-img-pot">
                    <a href="<?= $_SERVER['PHP_SELF'] ?>?page=detailProduct&idPro=<?= $prd_id ?>">
                        <img src="./upload/imgProduct/<?= $prd_img ?>" alt="">
                    </a>
                </div>
                <div class="text-center content-pd">
                    <div class="name-pd"><a
                            href="<?= $_SERVER['PHP_SELF'] ?>?page=detailProduct&idPro=<?= $prd_id ?>"><?= $prd_name ?></a>
                    </div>
                    <div class="price-pd"><?= $prd_price ?> VND</div>
                </div>
            </div>
            <?php } ?>
        </div>
        <a href="<?= $_SERVER['PHP_SELF'] ?>?page=product" class="seemore">Xem Thêm</a>
    </div>
</div>
<div class="section-product-top">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="product-top-col1">
                    <img src="./view/image/pottery-artist.png" alt="">
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
                <div class="product-top-col2">
                    <h2 class="text-center py-3">Sản Phẩm Nổi Bật</h2>
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis aliquam
                        fugiat ipsa. Eius magni alias consequuntur pariatur totam voluptate explicabo reiciendis
                        possimus architecto sit doloremque unde veritatis, deleniti dolorum magnam!</p>
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="product-img-top">
                                    <img src="../asset/image/tuongGomSu/tuong15.jpg" alt="">
                                </div>
                                <div class="content-top">
                                    <p class="text-center">Gốm sứ bát tràng</p>
                                    <p class="text-center">111.000đ</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="product-img-top">
                                    <img src="../asset/image/tuongGomSu/tuong11.jpg" alt="">
                                </div>
                                <div class="content-top">
                                    <p class="text-center">Gốm sứ bát tràng</p>
                                    <p class="text-center">111.000đ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-product-views">
    <h2 class="text-center py-3">Được Xem Nhiều</h2>
    <div class="container">
        <div class="row">
            <?php foreach($proView as $value) { extract($value)?>
            <div class="col-6 col-lg-2  col-md-3">
                <div class="product-img-pot">
                    <a href="<?= $_SERVER['PHP_SELF'] ?>?page=detailProduct&idPro=<?= $prd_id ?>">
                        <img src="./upload/imgProduct/<?= $prd_img ?>" alt="">
                    </a>
                </div>
                <div class="text-center content-pd">
                    <div class="name-pd"><a
                            href="<?= $_SERVER['PHP_SELF'] ?>?page=detailProduct&idPro=<?= $prd_id ?>"><?= $prd_name ?></a>
                    </div>
                    <div class="price-pd"><?= $prd_price ?> VND</div>
                </div>
            </div>
            <?php } ?>
        </div>
        <a href="#" class="seemore">Xem Thêm</a>
    </div>
</div>

<div class="product-blog">
    <h2 class="text-center py-3">Tin Tức Nổi Bật</h2>
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6 col-lg-4">
                <div class="blog-single">
                    <div class="blog-single-img">
                        <a href=""><img src="../asset/image/tuongGomSu/tuong2.jpg" alt=""></a>
                    </div>
                    <div class="blog-contents">
                        <h4><a href="">Mô Hình Gốm tượng trưng cho vận may</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nesciunt, rerum et id
                            obcaecati quo blanditiis eos fugit pariatur illum quia molestias voluptatibus reprehenderit
                            qui mollitia error, animi nam corrupti!</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="blog-single">
                    <div class="blog-single-img">
                        <a href=""><img src="../asset/image/tuongGomSu/tuong2.jpg" alt=""></a>
                    </div>
                    <div class="blog-contents">
                        <h4><a href="">Mô Hình Gốm tượng trưng cho vận may</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nesciunt, rerum et id
                            obcaecati quo blanditiis eos fugit pariatur illum quia molestias voluptatibus reprehenderit
                            qui mollitia error, animi nam corrupti!</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="blog-single">
                    <div class="blog-single-img">
                        <a href=""><img src="../asset/image/tuongGomSu/tuong2.jpg" alt=""></a>
                    </div>
                    <div class="blog-contents">
                        <h4><a href="">Mô Hình Gốm tượng trưng cho vận may</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nesciunt, rerum et id
                            obcaecati quo blanditiis eos fugit pariatur illum quia molestias voluptatibus reprehenderit
                            qui mollitia error, animi nam corrupti!</p>
                    </div>
                </div>
            </div>

        </div>
        <a href="#" class="seemore">Xem Thêm</a>
    </div>
</div>