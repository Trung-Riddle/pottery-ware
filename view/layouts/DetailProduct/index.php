<section class="detail-main">
    <div class="product-page-container">
        <!-- router -->
        <span class="link-route">
            <a href="<?= $_SERVER['PHP_SELF'] ?>">Trang Chủ</a> <i class="fa-light fa-chevron-right"></i>
            <a href="<?= $_SERVER['PHP_SELF'] ?>?page=product">Sản phẩm</a> <i class="fa-light fa-chevron-right"></i>
            <a
                href="<?= $_SERVER['PHP_SELF'] ?>?page=searchProByCate&nameCate=<?= $pro[0]['prd_id_cate'] ?>"><?= $pro[0]['cate_name'] ?></a>
            <i class="fa-light fa-chevron-right"></i>
            <a href="#"><?= $pro[0]['prd_name'] ?></a>
        </span>
        <div id="product-page">
            <div class="product-page-img">
                <img src="./upload/imgProduct/<?= $pro[0]['prd_img'] ?>" alt="" />
            </div>
            <div class="product-page-detail">
                <h3><?= $pro[0]['prd_name'] ?></h3>
                <span class="product-category"><?= $pro[0]['cate_name'] ?></span>
                <span class="product-category"><i class="fa-regular fa-eye"
                        style="margin-right: 10px;"></i><?= $pro[0]['prd_view'] ?></span>
                <p class="price">
                    <?php if($pro[0]['prd_del'] != 0) { ?>
                    <?= $pro[0]['prd_del'] ?> <sup>đ</sup>
                    <span class="prd_del"><?= $pro[0]['price_pro'] ?></span><sup style="text-decoration: line-through"
                        class="color-desc">đ</sup>
                    <?php } else { ?>
                    <?= $pro[0]['prd_price'] ?> <sup>đ</sup>
                    <?php } ?>
                </p>
                <p class="small-desc color-desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum
                    eaque voluptatem eius necessitatibus minima, cupiditate ut
                    corrupti eveniet amet! Doloremque dolore quibusdam praesentium,
                    sequi consequuntur necessitatibus tenetur aliquid aspernatur non!
                </p>
                <div class="qty-btn">
                    <button id="decrement" onclick="stepper(this)">-</button>
                    <input type="number" min="1" max="100" step="1" value="1" id="qty" readonly />
                    <button id="increment" onclick="stepper(this)">+</button>
                </div>
                <div class="cart-btns">
                    <button class="add-cart">Thêm vào giỏ</button>
                    <button class="now-cart">Mua ngay</button>
                </div>
            </div>
        </div>
        <div class="product-all-info">
            <!-- about -->
            <div class="about">
                <a class="bg_links social portfolio" href="" target="_blank">
                    <span class="icon"></span>
                </a>
                <a class="bg_links social dribbble" href="" target="_blank">
                    <span class="icon"></span>
                </a>
                <a class="bg_links social linkedin" href="" target="_blank">
                    <span class="icon"></span>
                </a>
                <a class="bg_links logo"></a>
            </div>
            <!-- end about -->

            <section id="wrapper">
                <div class="content">
                    <!-- Tab links -->
                    <div class="tabs">
                        <button class="tablinks active" data-country="haha">
                            <p data-title="Bình Luận">Bình Luận</p>
                        </button>
                        <button class="tablinks" data-country="hihi">
                            <p data-title="Chi Tiết">Chi Tiết</p>
                        </button>
                        <button class="tablinks" data-country="hehe">
                            <p data-title="Cùng Loại">Cùng Loại</p>
                        </button>
                        <button class="tablinks" data-country="hoho">
                            <p data-title="Xem Thêm">Xem Thêm</p>
                        </button>
                    </div>

                    <!-- Tab content -->
                    <div class="wrapper_tabcontent">
                        <div id="haha" class="tabcontent active">
                            <h3>Bình Luận</h3>
                            <div class="contentDetail">
                                <div class="headCmt">
                                    <div class="amountCmt"></div>
                                </div>
                                <div class="formCmt">

                                </div>
                            </div>
                        </div>

                        <div id="hihi" class="tabcontent">
                            <h3>Chi Tiết</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Fuga dolor vel iste veritatis tempore officia perspiciatis,
                                numquam nisi amet! Animi quo expedita perferendis porro
                                nesciunt minima eius consectetur, rerum earum!
                            </p>
                        </div>

                        <div id="hehe" class="tabcontent">
                            <h3>Cùng Loại</h3>
                            <div class="detailSameCate">
                                <div id="listSameCate" class="listSameCate">
                                    <?php 
                                    $sameCateProduct = selectAllDataDB("SELECT * FROM product WHERE prd_id_cate = '{$pro[0]['prd_id_cate']}'");
                                    foreach($sameCateProduct as $value) { extract($value) ?>
                                    <?php if($prd_name != $pro[0]['prd_name']) { ?>
                                    <div class="itemSameCate"
                                        onclick="window.location.href='<?= $_SERVER['PHP_SELF'] ?>?page=detailProduct&idPro=<?= $prd_id ?>'">
                                        <div class="imgSameCate">
                                            <img src="./upload/imgProduct/<?= $prd_img ?>" alt="Pottery Ware">
                                        </div>
                                        <div class="contentSameCate">
                                            <div class="nameContentSameCate">
                                                <?= $prd_name ?>
                                            </div>
                                            <div class="priceContentSameCate">
                                                <?= $prd_price ?><span> VND</span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php } ?>
                                </div>
                                <?php if(countDataDB("SELECT count(*) FROM product WHERE prd_id_cate = '{$pro[0]['prd_id_cate']}'") > 5) { ?>
                                <div class="prevAndNextSameProduct">
                                    <div id="prevSameDetailProduct" class="prev">Prev</div>
                                    <div id="nextSameDetailProduct" class="next">Next</div>
                                </div>
                                <?php } ?>
                                <script>
                                if (screen.width >= 768) {
                                    document.getElementById("nextSameDetailProduct").onclick = function next() {
                                        var listSameProduct = document.querySelectorAll(".itemSameCate");
                                        document
                                            .getElementById("listSameCate")
                                            .append(
                                                listSameProduct[0],
                                                listSameProduct[1],
                                                listSameProduct[2],
                                                listSameProduct[3]
                                            );
                                    };
                                    document.getElementById("prevSameDetailProduct").onclick = function next() {
                                        var listSameProduct = document.querySelectorAll(".itemSameCate");
                                        document
                                            .getElementById("listSameCate")
                                            .prepend(
                                                listSameProduct[listSameProduct.length - 4],
                                                listSameProduct[listSameProduct.length - 3],
                                                listSameProduct[listSameProduct.length - 2],
                                                listSameProduct[listSameProduct.length - 1]
                                            );
                                    };
                                } else {
                                    document.getElementById("nextSameDetailProduct").onclick = function next() {
                                        var listSameProduct = document.querySelectorAll(".itemSameCate");
                                        document
                                            .getElementById("listSameCate")
                                            .append(
                                                listSameProduct[0],
                                                listSameProduct[1]
                                            );
                                    };
                                    document.getElementById("prevSameDetailProduct").onclick = function next() {
                                        var listSameProduct = document.querySelectorAll(".itemSameCate");
                                        document
                                            .getElementById("listSameCate")
                                            .prepend(
                                                listSameProduct[listSameProduct.length - 2],
                                                listSameProduct[listSameProduct.length - 1]
                                            );
                                    };
                                }
                                </script>
                            </div>
                        </div>

                        <div id="hoho" class="tabcontent">
                            <h3>Xem Thêm</h3>
                            <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                Maxime labore totam adipisci non id illum ex, voluptates
                                eveniet consequatur porro ut, omnis unde praesentium vero,
                                ducimus ullam rem distinctio rerum?
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>