<div class="detailPosts" id="detailPosts">
    <?php foreach ($detialPost as $Post) { ?>
        <span>Thời gian đăng: <?= $Post['date_add'] ?></span>
        <?php if ($Post['view'] > 20) { ?>
            <p class="view">Lượt xem: <?= $Post['view'] ?> (<span style="color:greenyellow; ">Xu hướng <ion-icon style="color:greenyellow; " name="arrow-up-outline"></ion-icon> </span>)</p>
        <?php } else if ($Post['view'] <= 20 && $Post['view'] > 5) { ?>
            <p class="view">Lượt xem: <?= $Post['view'] ?></p>
        <?php } else { ?>
            <p class="view">Lượt xem: <?= $Post['view'] ?> (<span style="color:red; "> Không xu hướng <ion-icon style="color:red; " name="arrow-down-outline"></ion-icon> </span>)</p>
        <?php } ?>
        <div class="post">
            <h1><?= $Post['title_post'] ?></h1>
            <div class="postImage">
                <img src="./.././upload/imgPosts/<?= $Post['img_post'] ?>" alt="post">
            </div>
            <i>Ảnh 1</i>
            <p><?= $Post['content_post'] ?></p>
            <?php if ($Post['contentSecond_post'] != '') { ?>
                <div class="postImage">
                    <img src="./.././upload/imgPosts/<?= $Post['imgSecond_post'] ?>" alt="post">
                </div>
                <i>Ảnh 2</i>
                <p><?= $Post['contentSecond_post'] ?></p>
            <?php } ?>
        </div>
        <div class="toolBar toolDetail">
            <button class="btnEdit" id="btnEditPost"> Sửa bài viết</button>
            <a class="btnDelete" href="<?= $_SERVER['PHP_SELF'] . "?act=deletePosts&id=" . $Post['id'] ?>"> Xóa </a>
            <a class="btnDetail" href="<?= $_SERVER["PHP_SELF"] ?>?act=posts">Trở về</a>
        </div>
    <?php } ?>

    <form class="editPost" id="editPost">
        <input class="title_post" type="text" value="<?= $Post['title_post'] ?>">
        <input type="file">
        <img src="./.././upload/imgPosts/<?= $Post['img_post'] ?>" alt="post" id="imgUpdate_post">
        <textarea cols="30" rows="10"><?= $Post['content_post'] ?></textarea>
        <?php if ($Post['contentSecond_post'] != '') { ?>
            <input type="file" name="imgSecond_post">
            <img src="./.././upload/imgPosts/<?= $Post['imgSecond_post'] ?>" alt="post" id="imgUpdate_post" width="50%">
            <textarea cols="30" rows="10"><?= $Post['contentSecond_post'] ?></textarea>
        <?php } ?>
    </form>

    <style>
        .editPost {
            display: none;
        }

        .editPost .title_post {
            margin-top: 2rem;
            font-size: 1.5rem;
            text-align: center;
            border: none;
            background: transparent;
            color: #fff;
            border-bottom: 0.1rem solid #fff;
        }

        .editPost textarea {
            width: 80%;
            margin-top: 2rem;
            border-radius: 0.3rem;
            padding: 1rem;
        }
    </style>
    <!-- <?php if (isset($_GET['act']) && ($_GET['act'] == "editPosts")) { ?>
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
    <?php } ?> -->
</div>