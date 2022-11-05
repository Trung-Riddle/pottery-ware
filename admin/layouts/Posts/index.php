<div class="container">
    <?php if(isset($_GET['act']) && ($_GET['act'] == "posts")) { ?>
    <div class="formPosts">
        <form action="<?= $_SERVER['PHP_SELF'] ?>?act=addPosts" method="post">
            <label for="imgPost">Ảnh bài viết</label>
            <input type="file" name="imgPost" id="imgPost">
            <label for="titlePost">Tiêu đề</label>
            <input type="text" name="titlePost" id="titlePost" required>
            <label for="contentPost">Nội dung</label>
            <textarea name="contentPost" id="contentPost" cols="30" rows="10" required></textarea>
            <button type="submit" value="addPosts">Thêm bài viết</button>
        </form>
    </div>
    <?php } ?>
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
                    <a class="btnDelete" href="<?= $_SERVER['PHP_SELF'] . "?act=deletePosts&id=" . $Post['id'] ?>"> Xóa
                    </a>
                    <a class="btnDetail" href="<?= $_SERVER['PHP_SELF'] . "?act=detialPost&id=" . $Post['id'] ?>">Chi
                        tiết</a>
                </td>
            </tr>
            <?php } ?>
        </table>
        <div class="toolBar">
            <a class="btnInsert" href="<?= $_SERVER['PHP_SELF'] . "?act=insertPosts" ?>"> Tạo bài viết </a> <br>
        </div>
    </div>
    <?php if(isset($_GET['act']) && ($_GET['act'] == "editPosts")) { ?>
    <div class="formEditPosts">
        <form action="<?= $_SERVER['PHP_SELF'] ?>?act=editPosts" method="post">
            <label for="imgPost">Ảnh bài viết</label>
            <input type="file" name="imgPost" id="imgPost">
            <label for="titlePost">Tiêu đề</label>
            <input type="text" name="titlePost" id="titlePost" required>
            <label for="contentPost">Nội dung</label>
            <textarea name="contentPost" id="contentPost" cols="30" rows="10" required></textarea>
            <button type="submit" value="addPosts">Sửa bài viết</button>
        </form>
    </div>
    <?php } ?>