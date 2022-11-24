<div style="overflow-x: auto">
    <div class="tool-add-form glow">
        <span class="text"><a href="#"><i class="fa-light fa-octagon-plus"></i>&nbsp; Thêm danh mục</a></span>
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
        <!-- <?php if (isset($_GET['act']) && ($_GET['act'] == "category")) {?>
        <div class="formAddCate">
            <form action="<?= $_SERVER['PHP_SELF'] ?>?act=addCate" method="post">
                <label for="nameCate">Tên danh mục</label>
                <input type="text" id="nameCate" name="nameCate" maxlength="100" required>
                <label for="statusCate">Trạng thái</label>
                <select name="statusCate" id="statusCate">
                    <option value="1">Hoạt động</option>
                    <option value="0">Không hoạt động</option>
                </select>
                <button type="submit" name="addCate" value="addCate">Thêm danh mục</button>
            </form>
        </div>
        <?php } ?> -->
        <div class="wrapperTableCate table">
            <table>
                <thead>
                    <tr>
                        <th><label class="container-c">
                                <input type="checkbox">
                                <span class="checkmark-c"></span>
                            </label></th>
                        <th class="masp" colspan="1">#</th>
                        <th colspan="" class="name-cate">Tên Danh Mục</th>
                        <th colspan="">Trạng Thái</th>
                        <th colspan="">Điều Chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 0; ?>
                    <?php foreach($cate as $value) { ?>
                    <?php $index++ ?>
                    <tr>
                        <td><label class="container-c">
                                <input type="checkbox">
                                <span class="checkmark-c"></span>
                            </label></td>
                        <td colspan="1" class="masp"><?= $index ?></td>
                        <td class="name-cate"><?= $value['cate_name'] ?></td>
                        <td id="shadow"><span id="">
                                <?php
                                if($value['cate_status'] == 1){
                                    echo "Còn hàng";
                                }else{
                                    echo "Hết hàng";
                                }
                            ?>
                            </span></td>
                        <td><a href="#"><i class="fa-solid fa-trash-can trash trash-custom-ad"></i></a>&nbsp; <a
                                href="#"><i class="fa-solid fa-pen-to-square pen-custom-ad"></i></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php 
            if ($cate[0]['cate_status'] != 0) {
                $selectedActive = "selected";
                $selectedUnactive = null;
            }
            else{
                $selectedActive = null;
                $selectedUnactive = "selected";
            }    
        ?>
        <!-- <?php if (isset($_GET['act']) && ($_GET['act'] == "editCate")) {?>
        <div class="formEditCate">
            <form action="<?= $_SERVER['PHP_SELF'] ?>?act=editCate" method="post">
                <input type="hidden" name="idCate" value="<?= $cate[0]['cate_id'] ?>">
                <label for="nameCate">Tên danh mục</label>
                <input type="text" id="nameCate" name="nameCate" maxlength="100" value="<?= $cate[0]['cate_name'] ?>"
                    required>
                <label for="statusCate">Trạng thái</label>
                <select name="statusCate" id="statusCate">
                    <option value="0" <?= $selectedUnactive ?>>Không hoạt động</option>
                    <option value="1" <?= $selectedActive ?>>Hoạt động</option>
                </select>
                <button type="submit" name="editCate" value="editCate">Sửa danh mục</button>
            </form>
        </div>
        <?php } ?> -->
    </div>
</div>