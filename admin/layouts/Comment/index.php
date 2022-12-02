<div class="container">
    <div class="showCmtHaveStatus0">
        <?php if(isset($_GET['act']) && ($_GET['act'] == "comment")) { ?>
        <a href="<?= $_SERVER['PHP_SELF'] ?>?act=showStatusCmt-0" class="btnEdit">Bình luận đã ẩn</a>
        <?php } else { ?>
        <a href="<?= $_SERVER['PHP_SELF'] ?>?act=comment" class="btnEdit">Tất cả bình luận</a>
        <?php } ?>
    </div>
    <div class="formSearchCmt">
        <form action="<?= $_SERVER['PHP_SELF'] ?>?act=searchCmt" method="post">
            <label for="userName">Tên khách hàng</label>
            <input type="search" name="userName" id="userName" required>
            <label for="namePro">Tìm theo sản phẩm</label>
            <select name="namePro" id="namePro">
                <option value="">Tất cả bình luận theo sản phẩm</option>
                <?php foreach($groupByNameProCmt as $value) { ?>
                <option value="<?= $value['name_pro'] ?>"><?= $value['name_pro'] ?></option>
                <?php } ?>
            </select>
            <button type="submit" name="searchCmt" value="searchCmt">Tìm bình luận</button>
        </form>
    </div>
    <div class="wrapperCmt table">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên khách hàng</th>
                    <th>Sản phẩm</th>
                    <th>Bình luận</th>
                    <th>Thời gian</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 0 ?>
                <?php foreach($cmt as $value) { ?>
                <?php $index++ ?>
                <tr>
                    <th><?= $index ?></th>
                    <th><?= $value['ur_name'] ?></th>
                    <td><?= $value['prd_name'] ?></td>
                    <td><?= $value['cmt_content'] ?></td>
                    <td><?= $value['cmt_created_at'] ?></td>
                    <td>
                        <?php if(isset($_GET['act']) && ($_GET['act'] == "comment")) { ?>
                        <a href="<?= $_SERVER['PHP_SELF'] ?>?act=updateStatusCmt&idCmt=<?= $value['cmt_id'] ?>&status=0"
                            class="btnEdit">Ẩn</a>
                        <?php } else { ?>
                        <a href="<?= $_SERVER['PHP_SELF'] ?>?act=updateStatusCmt&idCmt=<?= $value['cmt_id'] ?>&status=1"
                            class="btnEdit">Khôi phục</a>
                        <?php } ?>
                        <a href="<?= $_SERVER['PHP_SELF'] ?>?act=delCmt&idCmt=<?= $value['cmt_id'] ?>"
                            class="btnDelete">Xóa</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>