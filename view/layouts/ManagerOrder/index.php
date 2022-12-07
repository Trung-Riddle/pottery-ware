<div class="body-order mtop-150">
    <div class="container-order-me">
        <div class="tabs-main">
            <a class="tab-item-child active">
                <i class="fa-brands fa-jedi-order"></i>&nbsp;<span>Chờ xác nhận</span>
            </a>
            <a class="tab-item-child">
                <i class="fa-regular fa-badge-check"></i>&nbsp;<span>Đã xác nhận</span>
            </a>
            <a class="tab-item-child">
                <i class="fa-regular fa-truck-fast"></i>&nbsp;<span>Đang giao</span>
            </a>
            <a class="tab-item-child">
                <i class="fa-regular fa-clock-rotate-left"></i>&nbsp;<span>Đã giao</span>
            </a>
            <div class="line-bottom"></div>
        </div>
        <div class="tab-content-order-me">
            <?php for ($i=0; $i <= 4; $i++) { ?>
            <div class="tab-pane-child">
                <div class=" table-cart-pot">
                    <?php
                            foreach(listOrderUser($i) as $itemOrder) {
                        ?>
                    <h1 style="padding: 10px 0;">
                        <p>Mã đơn hàng: <?= $itemOrder['ord_code'] ?></p>
                    </h1>
                    <div class="shopping-cart" style="border-bottom: 1px solid gray; margin-bottom: 0rem;">
                        <div class="column-labels">
                            <label class="product-image">Ảnh</label>
                            <label class="product-details">Sản Phẩm</label>
                            <label class="product-price">Giá</label>
                            <label class="product-removal">Xoá</label>
                            <label class="product-quantity">Số Lượng</label>
                            <label class="product-line-price">Tổng</label>
                        </div>
                        <?php 
                            $totalCart = 0;
                            $total = 0;
                            $tax = 0;
                            $totalAll = 0;
                            foreach(listCartOrderUser($itemOrder['ord_id']) as $value) { 
                                $totalCart = $value['prd_price'] * $value['c_amount'];
                                $total += $totalCart;
                                $tax = $total * 5 / 100;
                                $totalAll = $total + $tax + 30000;
                            ?>
                        <div class="product">
                            <div class="product-image">
                                <img src="./upload/imgProduct/<?= $value['prd_img'] ?>">
                            </div>
                            <div class="product-details">
                                <a href="<?= $_SERVER['PHP_SELF'] ?>?page=detailProduct&idPro=<?= $value['prd_id'] ?>"
                                    class="product-title"><?= $value['prd_name'] ?></a>
                                <p class="product-description color-desc"><?= $value['prd_description'] ?></p>
                            </div>
                            <div class="product-price"><?= $value['prd_price'] ?></div>
                            <div class="product-removal" style="visibility: hidden;">
                                <button class="remove-product">
                                    <i class="fa-solid fa-trash-can-list"></i>&nbsp; Hủy đơn
                                </button>
                            </div>
                            <div class="product-quantity">
                                <?= $value['c_amount'] ?>
                            </div>
                            <div class="product-line-price"><?= ($value['prd_price'] * $value['c_amount']) ?></div>
                        </div>
                        <?php } ?>
                        <div class="totals">
                            <div class="totals-item">
                                <label>Tổng Giá Sản Phẩm</label>
                                <div class="totals-value" id="cart-subtotal"><?= $total ?></div>
                            </div>
                            <div class="totals-item">
                                <label>Thuế(5%)</label>
                                <div class="totals-value" id="cart-shipping"><?= $tax ?></div>
                            </div>
                            <div class="totals-item">
                                <label>Phí Ship</label>
                                <div class="totals-value" id="cart-shipping">30.000</div>
                            </div>
                            <div class="totals-item totals-item-total" style="font-weight: bold; font-size: 24px;">
                                <label>Thành tiền</label>
                                <div class="totals-value" id="cart-total">
                                    <?= $totalAll ?></div>
                            </div>
                        </div>
                        <?php if($itemOrder['ord_status'] == 0) { ?>
                        <a class="checkout"
                            href="<?= $_SERVER['PHP_SELF'] ?>?page=deleteCartOrderUser&idOrder=<?= $itemOrder['ord_id'] ?>"
                            style="margin-bottom: 2rem; color: white; cursor: pointer;">
                            <i class="fa-solid fa-trash-can-list"></i> &nbsp;
                            Hủy đơn hàng
                        </a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<script>
var listOrder = document.querySelectorAll(".tab-pane-child")
listOrder[0].classList.add("active")
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const tabItems = $$(".tab-item-child");
const paneItems = $$(".tab-pane-child");

const tabActive = $(".tab-item-child.active");
const paneActive = $(".tab-pane-child.active");
const line = $(".line-bottom");

requestIdleCallback(function() {
    line.style.left = tabActive.offsetLeft + "px";
    line.style.width = tabActive.offsetWidth + "px";
});

tabItems.forEach((tab, index) => {
    const pane = paneItems[index];

    tab.onclick = function() {
        $(".tab-item-child.active").classList.remove("active");
        $(".tab-pane-child.active").classList.remove("active");

        line.style.left = this.offsetLeft + "px";
        line.style.width = this.offsetWidth + "px";

        this.classList.add("active");
        pane.classList.add("active");
    };
});
</script>