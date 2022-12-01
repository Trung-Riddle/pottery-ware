<form class="tool-add-form glow d-flex" action="<?= $_SERVER['PHP_SELF'] ?>?act=searchCmt" method="post">
    <div class="flex-search-tool">
        <i class="fa-light fa-magnifying-glass"></i>
        <input type="text" name="userName" placeholder="Tìm Theo Tên" class="form-search-cmt" />
    </div>
    <div class="flex-search-tool">
        <i class="fa-light fa-magnifying-glass"></i>
        <input type="text" name="namePro" placeholder="Tìm Theo Sản Phẩm" class="form-search-cmt-2" />
    </div>
    <input type="submit" name="searchCmt" id="" style="display: none;" value="searchCmt">
    <?php if(isset($_GET['act']) && ($_GET['act'] == "comment")) { ?>
    <span class="text"><a href="<?= $_SERVER['PHP_SELF'] ?>?act=showStatusCmt-0"><i
                class="fa-solid fa-eye-slash"></i>&nbsp; Bình Luận Đã Ẩn</a></span>
    <?php } else { ?>
    <span class="text"><a href="<?= $_SERVER['PHP_SELF'] ?>?act=comment"><i
                class="fa-light fa-square-chevron-left"></i>&nbsp; Quay Lại</a></span>
    <?php } ?>
</form>
<div class="container">
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