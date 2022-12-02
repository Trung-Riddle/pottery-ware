<div style="overflow-x: auto">
    <div class="tool-add-form glow">
        <span class="text"><a href="<?= $_SERVER['PHP_SELF'] ?>?act=formAddCategory"><i
                    class="fa-light fa-octagon-plus"></i>&nbsp; Thêm danh mục</a></span>
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
                        <td>
                            <?php if(isset($_GET['act']) && ($_GET['act'] == "editCate")) { ?>
                            <a href="<?= $_SERVER['PHP_SELF'] ?>?act=category">
                                Xong
                            </a>
                            <?php } else { ?>
                            <a href="<?= $_SERVER['PHP_SELF'] ?>?act=deleteCate&idCate=<?= $value['cate_id'] ?>">
                                <i class="fa-solid fa-trash-can trash trash-custom-ad"></i>
                            </a>&nbsp;
                            <a href="<?= $_SERVER['PHP_SELF'] ?>?act=editCate&idCate=<?= $value['cate_id'] ?>">
                                <i class="fa-solid fa-pen-to-square pen-custom-ad"></i>
                            </a>
                            <?php } ?>
                        </td>
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
        <?php if (isset($_GET['act']) && ($_GET['act'] == "editCate")) {?>
        <form action="<?= $_SERVER['PHP_SELF'] ?>?act=editCate" class="form-addproduct" method="post"
            enctype="multipart/form-data">
            <h2 class="neon-purple" id="trav">Sửa Danh Mục Sản Phẩm</h2>
            <input type="hidden" name="cate_id" value="<?= $cate[0]['cate_id'] ?>">
            <div class="flex-form-row-3">
                <div class="form-group-ad-3">
                    <label for="cat-sta">Trạng Thái</label>
                    <select name="cate_status" id="cate-sta">
                        <option value="">-- Chọn Trạng Thái --</option>
                        <option value="1" <?= $selectedActive ?>>Còn hàng</option>
                        <option value="0" <?= $selectedUnactive ?>>Hết hàng</option>
                    </select>
                </div>
                <div class="form-group-ad-3">
                    <label for="name-category">Tên Danh Mục *</label>
                    <input type="text" id="name-category" name="cate_name" value="<?= $cate[0]['cate_name'] ?>" />
                </div>
                <div class="form-group-ad">
                    <button class="submitbtn-ad my-5" type="submit" name="editCate" value="editCate">
                        Sửa Danh Mục
                    </button>
                </div>
            </div>
        </form>
        <?php } ?>
    </div>
</div>