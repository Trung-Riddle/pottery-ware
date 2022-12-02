<div style="overflow-x: auto">
    <div class="tool-add-form glow">
        <span class="text"><a href="<?= $_SERVER['PHP_SELF'] ?>?act=formAddProduct"><i
                    class="fa-light fa-octagon-plus"></i>&nbsp; Thêm Sản Phẩm</a></span>
        <p class="show-option">
            <small id="shadow">
                <small id="blink" style="font-size: 18px">Hiện: </small> </small><select name="" id="">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
            </select>
        </p>
    </div>
    <div class="container">
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
                        <th colspan="">Trạng Thái</th>
                        <th colspan="">Điều Chỉnh</th>
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
                        <td id="shadow">
                            <?php
                            if ($value['prd_status'] == 0) {
                                echo "<span id=''>hết hàng</span>";
                            }
                            else{
                                echo "<span id=''>Còn Hàng</span>";
                            }
                        ?>
                        </td>
                        <td>
                            <?php
                            if (isset($_GET['act']) && ($_GET['act'] == "editPro")) {
                                echo "<a href='{$_SERVER['PHP_SELF']}?act=product'>Xong</a>";
                            }
                            else{
                                echo "
                                <a href='{$_SERVER['PHP_SELF']}?act=deletePro&idPro={$value['prd_id']}&imgPro={$value['prd_name']}'><i class='fa-solid fa-trash-can trash trash-custom-ad'></i></a>&nbsp;
                                <a href='{$_SERVER['PHP_SELF']}?act=editPro&idPro={$value['prd_id']}'><i class='fa-solid fa-pen-to-square pen-custom-ad'></i></a>
                                ";
                            }
                        ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- <?php if (isset($_GET['act']) && ($_GET['act'] == "product")) { ?>
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
        <?php } ?> -->
    </div>
</div>