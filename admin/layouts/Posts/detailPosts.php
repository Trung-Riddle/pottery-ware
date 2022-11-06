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
            <div class="postImage">
                <img src="./.././upload/imgPosts/<?= $Post['imgSecond_post'] ?>" alt="post">
            </div>
            <i>Ảnh 2</i>
            <p><?= $Post['contentSecond_post'] ?></p>

        </div>
        <div class="toolBar toolDetail">
            <a type="submit" class="btnEdit"> Sửa bài viết</a>
            <a class="btnDelete" href="<?= $_SERVER['PHP_SELF'] . "?act=deletePosts&id=" . $Post['id'] ?>"> Xóa </a>
            <a class="btnDetail" href="<?= $_SERVER["PHP_SELF"] ?>?act=posts">Trở về</a>
        </div>
    <?php } ?>
</div>