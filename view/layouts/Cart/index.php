<div class="mtop-50 table-cart-pot">
    <a href="<?= $_SERVER['PHP_SELF'] ?>?page=product" class="back-goshopping"><i class="fa-light fa-chevrons-left"></i>
        Tiếp Tục Mua Hàng</a>
    <h1>
        <p>Giỏ Hàng Của Bạn</p>
    </h1>

    <div class="shopping-cart">

        <div class="column-labels">
            <label class="product-image">Ảnh</label>
            <label class="product-details">Sản Phẩm</label>
            <label class="product-price">Giá</label>
            <label class="product-quantity">Số Lượng</label>
            <label class="product-removal">Xoá</label>
            <label class="product-line-price">Tổng</label>
        </div>

        <?php
            $index = 0;
            $totalCart = 0;
            $total = 0;
            $tax = 0;
            $totalAll = 0;
            if(isset($_SESSION['carts'])){
                foreach($_SESSION['carts'] as $cart) {
                extract($cart);
                $totalCart = $cart[3] * $cart[4];
                $total += $totalCart;
                $tax = $total * 5 / 100;
                $totalAll = $total + $tax + 15000;
        ?>
        <div class="product">
            <div class="product-image">
                <img src="./upload/imgProduct/<?= $cart[1] ?>">
            </div>
            <div class="product-details">
                <div class="product-title"><?= $cart[2] ?></div>
                <p class="product-description color-desc">Mô tả ở dây: Mô tả Ngắn Thôi Nhé</p>
            </div>
            <div class="product-price"><?= $cart[3] ?></div>
            <div class="product-quantity">
                <!-- <input type="number" value="<?= $cart[4] ?>" min="1"> -->
                <div style="width: 60px; text-align: center;"><?= $cart[4] ?></div>
            </div>
            <div class="product-removal">
                <button class="remove-product"
                    onclick="window.location = '<?= $_SERVER['PHP_SELF'] ?>?page=delOneRowCart&c_id=<?= $index ?>'">
                    <i class="fa-light fa-trash-can"></i>
                </button>
            </div>
            <div class="product-line-price"><?= $totalCart ?></div>
        </div>
        <?php $index++; } } ?>
        <div class="totals">
            <div class="totals-item">
                <label>Tổng Giá Sản Phẩm</label>
                <div class="totals-value" id="cart-subtotal">
                    <?= $total ?>
                </div>
            </div>
            <div class="totals-item">
                <label>Thuế (5%)</label>
                <div class="totals-value" id="cart-tax">
                    <?= $tax ?>
                </div>
            </div>
            <div class="totals-item">
                <label>Phí Ship</label>
                <div class="totals-value" id="cart-shipping">15.000</div>
            </div>
            <div class="totals-item totals-item-total">
                <label>Tổng Tất Cả</label>
                <div class="totals-value" id="cart-total">
                    <?= $totalAll ?>
                </div>
            </div>
        </div>

        <button class="checkout"><i class="fa-duotone fa-credit-card"></i> &nbsp; Thanh Toán</button>

    </div>
</div>