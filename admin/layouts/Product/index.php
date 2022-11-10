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
                <?php $cate = selectAllDataDB("SELECT cate_name FROM category"); foreach($cate as $value) { ?>
                <option value="<?= $value['cate_name'] ?>"><?= $value['cate_name'] ?></option>
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
                        <img src="../upload/imgProduct/<?= $value['prd_img'] ?>" alt="pottery ware" width="50"
                            height="50">
                    </td>
                    <td><?= $value['prd_name'] ?></td>
                    <td><?= $value['prd_price'] ?></td>
                    <td><?= $value['prd_del'] ?></td>
                    <td>
                        <b>Danh mục: </b><?= $value['cate_name'] ?><br>
                        <b>Trạng thái: </b>
                        <?php
                            if ($value['prd_status'] == 0) {
                                echo "<span class='unAction'>Không hoạt động</span>";
                            }
                            else{
                                echo "<span class='action'>Hoạt động</span>";
                            }
                        ?>
                        <br>
                        <b>Số lượt xem: </b><?= $value['prd_view'] ?><br>
                        <b>Ngày thêm: </b><?= $value['prd_created_at'] ?><br>
                    </td>
                    <?php
                        if (isset($_GET['act']) && ($_GET['act'] == "editPro")) {
                            echo "<td>
                                    <a href='{$_SERVER['PHP_SELF']}?act=product' class='btnEdit'>Xong</a>
                                </td>";
                        }
                        else{
                            echo "<td>
                                    <a href='{$_SERVER['PHP_SELF']}?act=editPro&idPro={$value['prd_id']}'
                                        class='btnEdit'>Sửa</a>
                                    <a href='{$_SERVER['PHP_SELF']}?act=deletePro&idPro={$value['prd_id']}&imgPro={$value['prd_name']}' class='btnDelete'>Xóa</a>
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
            <input type="hidden" name="idPro" id="idPro" value="<?= $pro[0]['prd_id'] ?>">
            <label for="namePro">Tên sản phẩm</label>
            <input type="text" name="namePro" id="namePro" maxlength="100" value="<?= $pro[0]['prd_name'] ?>" required>
            <label for="pricePro">Giá sản phẩm</label>
            <input type="number" name="pricePro" id="pricePro" min="999" max="9999999"
                value="<?= $pro[0]['prd_price'] ?>" required>
            <label for="delPro">Giảm giá</label>
            <input type="number" name="delPro" id="delPro" max="9999999" value="<?= $pro[0]['prd_del'] ?>">
            <label for="nameCate">Danh mục sản phẩm</label>
            <select name="nameCate" id="nameCate">
                <?php
                    function checkNameCate($value, $pro){
                        if ($value['cate_id'] == $pro[0]['prd_id_cate']) {
                            $selected = "selected";
                        }else{
                            $selected = "";
                        }
                        return $selected;
                    }
                ?>
                <?php $cate = selectAllDataDB("SELECT * FROM category"); foreach($cate as $value) { ?>
                <option value="<?= $value['cate_id'] ?>" <?= checkNameCate($value, $pro) ?>>
                    <?= $value['cate_name'] ?>
                </option>
                <?php } ?>
            </select>
            <label for="">Trạng thái</label>
            <?php 
                if ($pro[0]['prd_status'] != 0) {
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
            <input type="hidden" name="nameImgPro" id="nameImgPro" value="<?= $pro[0]['prd_img'] ?>">
            <label for="detailPro">Chi tiết sản phẩm</label>
            <textarea name="detailPro" id="detailPro" cols="30" rows="10"><?= $pro[0]['prd_description'] ?></textarea>
            <button type="submit" name="editPro" value="editPro">Sửa sản phẩm</button>
        </form>
    </div>
    <?php } ?>
</div>