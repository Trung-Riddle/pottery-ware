<div class="container">
    <div style="flex-wrap: wrap-reverse;" class="row px-5">
        <div class="col-lg-7 col-12">
            <div class="content-payment-detail">
                <div class="logo-main">
                    <div class="logo">
                        <a href="#">
                            <img src="./asset/image/amphora.png" alt="">
                            <span>Pottery ware</span>
                        </a>
                    </div>
                </div>
                <div class="link-payment-now">
                    <a href="<?= $_SERVER['PHP_SELF'] ?>?page=addCart">Giỏ Hàng</a>&nbsp; <i
                        class="fa-thin fa-chevron-right"></i> &nbsp;<a style="color: var(--color-tertiary);"
                        href="#">Thông Tin Thanh Toán</a>&nbsp; <i class="fa-light fa-chevron-right"></i> &nbsp;<a
                        href="">Thanh Toán</a>
                </div>
                <form action="./model/HandlePayment/index.php" class="form-payment" method="post">
                    <div class="row">
                        <div class="form-group col-12 mb-4">
                            <label for="">Họ và tên</label>
                            <input type="text" id="ord_cus_name" name="ord_cus_name" class="form-control"
                                placeholder="Họ và tên *" value="<?= $cus_name ?>">
                        </div>
                        <div class="form-group col-6">
                            <label for="">Email</label>
                            <input type="email" id="ord_email" name="ord_email" class="form-control"
                                placeholder="email *" value="<?= $cus_email ?>">
                        </div>
                        <div class="form-group col-6">
                            <label for="">Số điên thoại</label>
                            <input type="text" id="ord_phone" name="ord_phone" class="form-control" placeholder="số điện thoại *"
                                value="<?= $cus_phone ?>">
                        </div>
                        <div class="form-group mt-4">
                            <label for="">Địa chỉ</label>
                            <input type="text" id="ord_address" name="ord_address" class="form-control" placeholder="Địa chỉ cụ thể *"
                                value="<?= $cus_address ?>">
                        </div>
                        <div class="form-group mt-4">
                            <label for="">Phương thức thanh toán</label>
                            <!-- <input type="text" class="form-control" placeholder="Phương thức thanh toán *"> -->
                            <select name="ord_payment" id="payment-method" class="form-control">
                                <option value="0">Thanh toán khi nhận hàng</option>
                                <option value="1">Thanh toán qua MOMO</option>
                                <option value="2">Thanh toán qua ngân hàng</option>
                            </select>
                        </div>
                        <div class="imgQR">
                            <img src="" alt="MOMO">
                            <div class="" style="width: 300px;">
                                - Quét mã để thanh toán. <br>
                                - Thời hạn thanh toán là 10 phút. <br>
                                - Sau khi chuyển khoản quý khách vui lòng bấm đặt hàng. <br><br>
                                Xin cảm ơn quý khách.
                            </div>
                        </div>
                        <script>
                        document.getElementById("payment-method").onchange = () => {
                            var payment = document.getElementById("payment-method")
                            var imgQR = document.querySelector(".imgQR")
                            if (payment.value == 1) {
                                console.log("1");
                                imgQR.children[0].src = "./asset/image/qrmomo.jpg"
                                imgQR.style.visibility = "visible"
                                imgQR.style.height = "max-content"
                            } else if (payment.value == 2) {
                                console.log("2");
                                imgQR.children[0].src = "./asset/image/banking.jpg"
                                imgQR.style.visibility = "visible"
                                imgQR.style.height = "max-content"
                            } else {
                                imgQR.style.visibility = "hidden"
                                imgQR.style.height = "0"
                            }
                        }
                        </script>
                        <div class="form-group mt-4">
                            <div class="cart-btns between-impo">
                                <a href="<?= $_SERVER['PHP_SELF'] ?>?page=addCart" class="back-to-buy"> <i
                                        class="fa-light fa-chevrons-left"></i>&nbsp; Quay
                                    lại giỏ hàng </a>
                                <button type="submit" name="submitOrder" value="submitOrder" class="now-cart">Đặt hàng
                                    &nbsp;<i class="fa-light fa-chevrons-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 col-12">
            <div class="info-product-payment">
                <a href="#" class="back-to-buy d-lg-none d-block"> <i class="fa-light fa-chevrons-left"></i>&nbsp; tiếp
                    tục mua hàng </a>
                <small class="mb-5 color-text">Sản phẩm bạn đã thêm</small>
                <?php
                    $totalCart = 0;
                    $total = 0;
                    $tax = 0;
                    $totalAll = 0;
                    foreach($_SESSION['carts'] as $cart) { 
                    $totalCart = $cart[3] * $cart[4];
                    $total += $totalCart;
                    $tax = $total * 5 / 100;
                    $totalAll = $total + $tax + 30000;
                ?>
                <div class="row--1 d-flex align-items-center justify-content-between mt-4">
                    <div class="info-product-left">
                        <img src="./upload/imgProduct/<?= $cart[1] ?>" alt="">
                        <div class="w50">
                            <p><?= $cart[2] ?></p>
                            <p>số lượng : <span><?= $cart[4] ?></span></p>
                        </div>
                    </div>
                    <div class="info-product-right">
                        <p><?= $totalCart ?> <span>đ</span></p>
                    </div>
                </div>
                <?php } ?>
            </div>

            <div class="total-price-payment">
                <div class="d-flex align-items-center justify-content-between">
                    <p>Tổng tiền sản phẩm:</p> <span><?= $total ?> đ</span>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <p>Thuế(5%):</p> <span><?= $tax ?> đ</span>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <p>Phí Ship:</p> <span>30.000 đ</span>
                </div>
                <div class="d-flex align-items-center justify-content-between total-payment-dp">
                    <p>Tổng thanh toán:</p> <span><span id="example"><?= $totalAll ?></span> đ</span>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./view/js/checkForm.js"></script>