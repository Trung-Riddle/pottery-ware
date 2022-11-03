<div class="containerPosts table">
    <span>
        <?php
        echo "Số lượng bài viết: " . $countPost;
        ?>
    </span>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Bài viết</th>
                <th>Ngày đăng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <?php $index = 0 ?>
        <?php foreach ($listPost as $Post) { ?>
            <?php $index++ ?>
            <tr>
                <td><?= $index ?></td>
                <td><?= $Post['title_post'] ?></td>
                <td>Chưa có</td>
                <td style="display: flex; justify-content: center;">
                    <a class="btnDelete" href="<?= $_SERVER['PHP_SELF'] . "?act=deletePosts&id=" . $Post['id'] ?>"> Xóa </a>
                    <a class="btnDetail" href="<?= $_SERVER['PHP_SELF'] . "?act=detialPost&id=" . $Post['id'] ?>">Chi tiết</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <div class="toolBar">
        <a class="btnInsert" href="<?= $_SERVER['PHP_SELF'] . "?act=insertPosts" ?>"> Tạo bài viết </a> <br>
    </div>
</div>