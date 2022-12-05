<div class="wrapperConfirmPayment">
    <div class="content-confirm-payment text-center">
        <p>Đơn hàng đã được tạo thành công.</p>
        <p>Nhân viên sẽ đóng hàng và chuyển tới khách hàng trong vòng 5 - 6 ngày tới.</p>
        <p>Quý khách có thể theo dõi trạng thái đơn hàng qua mail hoặc mã đơn hàng bên dưới.</p>
        <p>Xin trân thành cảm ơn quý khách đã tin tưởng và ủng hộ Pottery Ware.</p>
    </div>
    <div class="tick-confirm">
        <img src="./asset/image/Tick.png" alt="Confirm">
    </div>
    <div class="code-payment">
        <span>Mã đơn hàng</span>
        <span><?= $_GET['code'] ?></span>
        <a href="<?= $_SERVER['PHP_SELF'] ?>?page=product">Tiếp tục mua hàng</a>
    </div>
</div>