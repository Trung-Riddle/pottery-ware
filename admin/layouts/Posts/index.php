<div class="tool-add-form glow">

    <span class="text"><a href="<?= $_SERVER['PHP_SELF'] ?>?act=newPosts"><i
                class="fa-regular fa-octagon-plus"></i>&nbsp; Viết Bài</a></span>

</div>
<table>
    <thead>
        <tr>
            <th><label class="container-c">
                    <input type="checkbox">
                    <span class="checkmark-c"></span>
                </label></th>
            <th class="masp" colspan="3">#</th>
            <th colspan="3">Ảnh Bài Đăng</th>
            <th colspan="" class="name-th">Tiêu Đề</th>
            <th colspan="">Điều Chỉnh</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><label class="container-c">
                    <input type="checkbox">
                    <span class="checkmark-c"></span>
                </label></td>
            <td colspan="3" class="masp">1</td>
            <td colspan="3"><img style="
                                width: 56px;
                                object-fit: cover;
                                border-radius: 4px;
                                box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px,
                                    rgba(17, 17, 26, 0.1) 0px 0px 8px;
                                object-position: center;
                                " src="https://i.pinimg.com/564x/7d/4a/7a/7d4a7a5366ada3a240d6bbaca867a9be.jpg"
                    height="56px" alt="" /></td>
            <td class="name-th">Cái con mắt ko gạch là ẩn đi, còn con mắt có gạch là đang ẩn, làm if else như cái login
                😋 😛 😝 😜 🤪</td>
            <td><a href="#"><i class="fa-solid fa-trash-can trash trash-custom-ad"></i></a>&nbsp; <a href="#"><i
                        class="fa-solid fa-eye pen-custom-ad"></i></a>&nbsp;
                <a href="#"><i class="fa-solid fa-eye-slash eye-custom-ad"></i></a>
            </td>
        </tr>

    </tbody>
</table>
<!-- <div class="containerPosts table">
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
        <textarea class="content_post" name="content_post" id="contentPost" cols="30" rows="10"
            placeholder="Nhập nội dung" required></textarea>
    </form>
    <div class="button">
        <button class="btnInsert" id="btnMoreContent">Thêm nội dung</button>
        <button class="btnEdit" form="addPost" type="submit" value="addPosts" name="addPosts">Tạo bài viết</button>
    </div>
</div>
<?php } ?> -->