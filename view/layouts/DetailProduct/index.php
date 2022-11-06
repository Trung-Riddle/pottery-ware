<section class="detail-main">
    <div class="product-page-container">
        <!-- router -->
        <span class="link-route">
            <a href="#">Trang Chủ</a> <i class="fa-light fa-chevron-right"></i>
            <a href="#">Tên Sản Phẩm</a>
        </span>
        <div id="product-page">
            <div class="product-page-img">
                <img src="https://cdn.shopify.com/s/files/1/0420/9242/9468/products/11.1.jpg?v=1593683051" alt="" />
            </div>
            <div class="product-page-detail">
                <h3>Echo Tên Sản Phẩm abcxyz</h3>
                <span class="product-category">Tên danh mục</span>
                <p class="price">
                    120.000 <sup>đ</sup> <span class="del">155.000</span>
                    <sup style="text-decoration: line-through" class="color-desc">đ</sup>
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
                            <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                Repudiandae officiis tempore odio nam quae quas impedit,
                                enim dolore commodi pariatur vero asperiores quibusdam ipsum
                                saepe sunt iusto soluta corrupti fugiat!
                            </p>
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
                                    <?php foreach($pro as $value) { extract($value)?>
                                    <div class="itemSameCate"
                                        onclick="javascript:window.location.href='<?= $_SERVER['PHP_SELF'] ?>'">
                                        <div class="imgSameCate">
                                            <img src="./upload/imgProduct/<?= $img_pro ?>" alt="Pottery Ware">
                                        </div>
                                        <div class="contentSameCate">
                                            <div class="nameContentSameCate">
                                                <?= $name_pro ?>
                                            </div>
                                            <div class="priceContentSameCate">
                                                <?= $price_pro ?><span> VND</span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php if(5 > 4) { ?>
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