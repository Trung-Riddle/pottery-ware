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
    <div class="wrapperPosts">

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
</div>