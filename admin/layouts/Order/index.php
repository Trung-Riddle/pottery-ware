<div class="tool-add-form glow">
    <!-- <span class="text"><a href="./table-add-product.html"><i class="fa-brands fa-first-order"></i>&nbsp; Đơn hàng đang
            giao</a></span> -->
    <?php if(isset($_GET['act']) && ($_GET['act'] == "order")) { ?>
    <span class="text"><a href="<?= $_SERVER['PHP_SELF'] ?>?act=orderDelivered"><i
                class="fa-brands fa-jedi-order"></i>&nbsp; Đơn hàng đã
            giao</a></span>
    <?php } else { ?>
    <span class="text"><a href="<?= $_SERVER['PHP_SELF'] ?>?act=order"><i
                class="fa-light fa-square-chevron-left"></i>&nbsp; Quay
            lại</a></span>
    <?php } ?>
</div>
<div class="titleOrder" style="margin: 2rem auto 1rem; width: max-content;">
    <h2 class="neon-purple" id="trav">Thông tin đơn hàng</h2>
</div>
<div style="overflow-x: auto">
    <table>
        <thead>
            <tr>
                <th>
                    <label class="container-c">
                        <input type="checkbox" />
                        <span class="checkmark-c"></span>
                    </label>
                </th>
                <th class="masp" colspan="1">#</th>
                <th colspan="">Mã đơn hàng</th>
                <th colspan="order-th">Thông tin đơn hàng</th>
                <th colspan="">Tổng thanh toán</th>
                <th colspan="">Trạng Thái</th>
                <th colspan="">Điều Chỉnh</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            foreach ($listOrder as $itemOrder) { 
                extract($itemOrder);

                //* kiểm tra pttt
                $payment = "";
                if($ord_payment == 0){
                    $payment = "Thanh toán khi nhận hàng";
                }else if($ord_payment == 1){
                    $payment = "Thanh toán qua MOMO";
                }else if($ord_payment == 2){
                    $payment = "Thanh toán qua ngân hàng";
                }

                //* kiểm tra trạng thái đơn hàng
                $statusOrder = "";
                if($ord_status == 0){
                    $statusOrder = "Chờ xác nhận";
                }else if($ord_status == 1){
                    $statusOrder = "Đã xác nhận";
                }else if($ord_status == 2){
                    $statusOrder = "Đang giao hàng";
                }else if($ord_status == 3){
                    $statusOrder = "Giao hàng thành công";
                }
            ?>
            <tr style="border-bottom: 1px solid gray">
                <td>
                    <label class="container-c">
                        <input type="checkbox" />
                        <span class="checkmark-c"></span>
                    </label>
                </td>
                <td colspan="1" class="masp"><?= $index ?></td>
                <td id="shadow">
                    <h5 class="" id="glow"><?= $ord_code ?></h5>
                </td>
                <td>
                    <div class="order-2">
                        <p>Tên khách hàng: <span><?= $ord_cus_name ?></span></p>
                        <p>SĐT: <span><?= $ord_phone ?></span></p>
                        <p>Email: <span><?= $ord_email ?></span></p>
                        <p>
                            ĐC:
                            <span><?= $ord_address ?></span>
                        </p>
                        <p><?= $payment ?></p>
                    </div>
                </td>
                <td><?= $sum_price ?> đ</td>
                <td id="">
                    <span class="
                                <?php if($ord_status > 0) {
                                    echo "text-white";
                                } else{
                                    echo "text-pink";
                                } ?>
                                " id="shadow"><?= $statusOrder ?></span>
                </td>
                <td>
                    <form action="<?= $_SERVER['PHP_SELF'] ?>?act=confirmOrder" method="post">
                        <input type="hidden" name="ord_id" value="<?= $ord_id ?>">
                        <p class="show-option">
                            <select name="confirmValue" id="confirmValue">
                                <option value="0" data-status="<?= $ord_status ?>">Chờ xác nhận</option>
                                <option value="1" data-status="<?= $ord_status ?>">Đã xác nhận</option>
                                <option value="2" data-status="<?= $ord_status ?>">Đang giao hàng</option>
                                <option value="3" data-status="<?= $ord_status ?>">Giao hàng thành công</option>
                            </select>
                            <script>
                            var listConfirmValue = document.querySelectorAll("#confirmValue option")
                            for (const item of listConfirmValue) {
                                if (item.getAttribute("data-status") === item.value) {
                                    item.setAttribute("selected", "")
                                    // console.log(item)
                                }
                            }
                            </script>
                        </p>
                        <br />
                        <br />
                        <span>
                            <button type="submit" id="submitConfirmOrder" name="submitConfirmOrder"
                                value="submitConfirmOrder">
                                Cập nhật
                            </button>&nbsp;
                            <script>
                            document.getElementById("submitConfirmOrder").onclick = (event) => {
                                var loading = document.querySelector(".loading");
                                loading.style.visibility = "visible";
                            };
                            </script>
                            <?php if(isset($_GET['act']) && ($_GET['act'] == "orderDelivered")) { ?>
                            <a id="submitConfirmOrder"
                                href="<?= $_SERVER['PHP_SELF'] ?>?act=deleteOrder&idOrder=<?= $ord_id ?>"
                                style="text-decoration: none; padding: 10.5px; color: red;">
                                Xóa
                            </a>&nbsp;
                            <?php } ?>
                            <a href="<?= $_SERVER['PHP_SELF'] ?>?act=detailOrder&idDetailOrder=<?= $ord_id ?>"><i
                                    class="fa-solid fa-square-info trash-custom-ad"></i></a>
                        </span>
                    </form>
                </td>
            </tr>
            <?php $index++; } ?>
        </tbody>
    </table>
</div>