<div class="container">
    <?php if (isset($_GET['act']) && ($_GET['act'] == "product")) { ?>
    <div class="formAddProduct">
        <form action="<?= $_SERVER['PHP_SELF'] ?>?act=addPro" method="post" enctype="multipart/form-data">
            <label for="namePro">Tên sản phẩm</label>
            <input type="text" name="namePro" id="namePro" maxlength="100" required>
            <label for="pricePro">Giá sản phẩm</label>
            <input type="number" name="pricePro" id="pricePro" min="999" max="9999999" required>
            <label for="nameCate">Danh mục sản phẩm</label>
            <select name="nameCate" id="nameCate">
                <?php foreach($cate as $value) { ?>
                <option value="<?= $value['name_cate'] ?>"><?= $value['name_cate'] ?></option>
                <?php } ?>
            </select>
            <label for="imgPro">Ảnh sản phẩm</label>
            <input type="file" name="imgPro" id="imgPro" accept="image/*">
            <button type="submit" name="addPro" value="addPro">Thêm sản phẩm</button>
        </form>
    </div>
    <?php } ?>
    <div class="wrapperTablePro table">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Giảm giá</th>
                    <th>Chi tiết</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 0 ?>
                <?php foreach ($pro as $value) { ?>
                <?php $index++ ?>
                <tr>
                    <th><?= $index ?></th>
                    <td>
                        <img src="../upload/imgProduct/<?= $value['img_pro'] ?>" alt="pottery ware" width="50"
                            height="50">
                    </td>
                    <td><?= $value['name_pro'] ?></td>
                    <td><?= $value['price_pro'] ?></td>
                    <td><?= $value['del'] ?></td>
                    <td>
                        <b>Danh mục: </b><?= $value['name_cate'] ?><br>
                        <b>Trạng thái: </b>
                        <?php
                            if ($value['status_pro'] == 0) {
                                echo "<span style='color: red;'>Không hoạt động</span>";
                            }
                            else{
                                echo "<span style='color: green;'>Hoạt động</span>";
                            }
                        ?>
                        <br>
                        <b>Số lượt xem: </b><?= $value['top_view'] ?><br>
                        <b>Ngày thêm: </b><?= $value['date_add'] ?><br>
                    </td>
                    <?php
                        if (isset($_GET['act']) && ($_GET['act'] == "editPro")) {
                            echo "<td>
                                    <a href='{$_SERVER['PHP_SELF']}?act=product' class='btnEdit'>Xong</a>
                                </td>";
                        }
                        else{
                            echo "<td>
                                    <a href='{$_SERVER['PHP_SELF']}?act=editPro&idPro={$value['id']}'
                                        class='btnEdit'>Sửa</a>
                                    <a href='{$_SERVER['PHP_SELF']}?act=deletePro&idPro={$value['id']}&imgPro={$value['img_pro']}' class='btnDelete'>Xóa</a>
                                </td>";
                        }
                    ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php if (isset($_GET['act']) && ($_GET['act']) == "editPro") { ?>
    <div class="formEditPro">
        <form action="<?= $_SERVER['PHP_SELF'] ?>?act=editPro" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idPro" id="idPro" value="<?= $pro[0]['id'] ?>">
            <label for="namePro">Tên sản phẩm</label>
            <input type="text" name="namePro" id="namePro" maxlength="100" value="<?= $pro[0]['name_pro'] ?>" required>
            <label for="pricePro">Giá sản phẩm</label>
            <input type="number" name="pricePro" id="pricePro" min="999" max="9999999"
                value="<?= $pro[0]['price_pro'] ?>" required>
            <label for="delPro">Giảm giá</label>
            <input type="number" name="delPro" id="delPro" max="9999999" value="<?= $pro[0]['del'] ?>" required>
            <label for="nameCate">Danh mục sản phẩm</label>
            <select name="nameCate" id="nameCate">
                <?php
                    function checkNameCate($value, $pro){
                        if ($value['name_cate'] == $pro[0]['name_cate']) {
                            $selected = "selected";
                        }else{
                            $selected = "";
                        }
                        return $selected;
                    }
                ?>
                <?php foreach($cate as $value) { ?>
                <option value="<?= $value['name_cate'] ?>" <?= checkNameCate($value, $pro) ?>><?= $value['name_cate'] ?>
                </option>
                <?php } ?>
            </select>
            <label for="">Trạng thái</label>
            <?php 
                if ($pro[0]['status_pro'] != 0) {
                    $selectedActive = "selected";
                    $selectedUnactive = null;
                }
                else{
                    $selectedActive = null;
                    $selectedUnactive = "selected";
                }    
            ?>
            <select name="statusPro" id="statusPro">
                <option value="0" <?= $selectedUnactive ?>>Không hoạt động</option>
                <option value="1" <?= $selectedActive ?>>Hoạt động</option>
            </select>
            <label for="imgPro">Ảnh sản phẩm</label>
            <input type="file" name="imgPro" id="imgPro" accept="image/*">
            <input type="hidden" name="nameImgPro" id="nameImgPro" value="<?= $pro[0]['img_pro'] ?>">
            <button type="submit" name="editPro" value="editPro">Sửa sản phẩm</button>
        </form>
    </div>
    <?php } ?>
</div>