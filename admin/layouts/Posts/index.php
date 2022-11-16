<div class="container">
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
                    <td><?= $Post['date_add'] ?></td>
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
            <button class="btnInsert" id="CreatePost">Tạo bài viết</button>
        </div>
    </div>

    <?php if (isset($_GET['act']) && ($_GET['act'] == "posts")) { ?>
        <div class="formPosts" id="formPosts">
            <form id="addPost" action="<?= $_SERVER['PHP_SELF'] ?>?act=addPosts" method="post" enctype="multipart/form-data">
                <input type="text" class="title_post" name="title_post" id="titlePost" placeholder="Tiêu đề bài viết" required>
                <input type="file" class="img_post" name="img_post" id="imgPost">
                <label for="contentPost">Nội dung</label>
                <textarea class="content_post" name="content_post" id="contentPost" cols="30" rows="10" placeholder="Nhập nội dung" required></textarea>
            </form>
            <div class="button">
                <button class="btnInsert" id="btnMoreContent">Thêm nội dung</button>
                <button class="btnEdit" form="addPost" type="submit" value="addPosts" name="addPosts">Tạo bài viết</button>
            </div>
        </div>
    <?php } ?>