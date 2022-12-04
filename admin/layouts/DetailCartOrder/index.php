<div class="cartOrder" style="margin: 2rem auto; width: max-content;">
    <h2 class="neon-purple" id="trav">Giỏ hàng</h2>
</div>
<div class="wrapperTablePro table">
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
                <th colspan="">Hình Ảnh</th>
                <th colspan="">Tên Sản Phẩm</th>
                <th colspan="">Danh Mục</th>
                <th colspan="">Giá</th>
                <th colspan="">Giảm giá</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 0 ?>
            <?php foreach ($pro as $value) { ?>
            <?php $index++ ?>
            <tr>
                <td>
                    <label class="container-c">
                        <input type="checkbox" />
                        <span class="checkmark-c"></span>
                    </label>
                </td>
                <td colspan="1" class="masp"><?= $index ?></td>
                <td>
                    <img style="
                              width: 56px;
                              object-fit: cover;
                              border-radius: 4px;
                              box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px,
                                rgba(17, 17, 26, 0.1) 0px 0px 8px;
                              object-position: center;
                            " src="../upload/imgProduct/<?= $value['prd_img'] ?>" height="56px" alt="" />
                </td>
                <td>
                    <p class="namesp">
                        <?= $value['prd_name'] ?>
                    </p>
                </td>
                <td><?= $value['cate_name'] ?></td>
                <td><?= $value['prd_price'] ?> đ</td>
                <td><?= $value['prd_del'] ?> đ</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>