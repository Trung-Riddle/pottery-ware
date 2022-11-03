<style>
.activeStatusCate {
    color: green;
}

.unactiveStatusCate {
    color: red;
}
</style>
<div class="container">
    <?php if (isset($_GET['act']) && ($_GET['act'] == "category")) {?>
    <div class="formAddCate">
        <form action="<?= $_SERVER['PHP_SELF'] ?>?act=addCate" method="post">
            <label for="nameCate">Tên danh mục</label>
            <input type="text" id="nameCate" name="nameCate" maxlength="100" required>
            <label for="statusCate">Trạng thái</label>
            <select name="statusCate" id="statusCate">
                <option value="0">Không hoạt động</option>
                <option value="1">Hoạt động</option>
            </select>
            <button type="submit" name="addCate" value="addCate">Thêm danh mục</button>
        </form>
    </div>
    <?php } ?>
    <div class="wrapperTableCate table">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 0; ?>
                <?php foreach($cate as $value) { ?>
                <?php $index++ ?>
                <tr>
                    <th><?= $index ?></th>
                    <td><?= $value['name_cate'] ?></td>
                    <?php
                            if ($value['status'] == 1) {
                                echo "<td class='activeStatusCate'>Hoạt động</td>";
                            }
                            else{
                                echo "<td class='unactiveStatusCate'>Không hoạt động</td>";
                            }
                            if (isset($_GET['act']) && ($_GET['act']  == "editCate")) {
                                echo "<td><a href='{$_SERVER['PHP_SELF']}?act=category' class='btnEdit'>xong</a></td>";
                            }
                            else{
                                echo "<td>
                                    <a href='{$_SERVER['PHP_SELF']}?act=editCate&idCate={$value['id']}' class='btnEdit'>Sửa</a>
                                    <a href='{$_SERVER['PHP_SELF']}?act=deleteCate&idCate={$value['id']}' class='btnDelete'>Xóa</a>
                                </td>";
                            }
                        ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php 
        if ($cate[0]['status'] != 0) {
            $selectedActive = "selected";
            $selectedUnactive = null;
        }
        else{
            $selectedActive = null;
            $selectedUnactive = "selected";
        }    
    ?>
    <?php if (isset($_GET['act']) && ($_GET['act'] == "editCate")) {?>
    <div class="formEditCate">
        <form action="<?= $_SERVER['PHP_SELF'] ?>?act=editCate" method="post">
            <input type="hidden" name="idCate" value="<?= $cate[0]['id'] ?>">
            <label for="nameCate">Tên danh mục</label>
            <input type="text" id="nameCate" name="nameCate" maxlength="100" value="<?= $cate[0]['name_cate'] ?>"
                required>
            <label for="statusCate">Trạng thái</label>
            <select name="statusCate" id="statusCate">
                <option value="0" <?= $selectedUnactive ?>>Không hoạt động</option>
                <option value="1" <?= $selectedActive ?>>Hoạt động</option>
            </select>
            <button type="submit" name="editCate" value="editCate">Sửa danh mục</button>
        </form>
    </div>
    <?php } ?>
</div>