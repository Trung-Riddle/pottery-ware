<div class="detailPosts" id="detailPosts">
    <?php foreach ($detialPost as $Post) { ?>
        <span>Thời gian đăng: 1h</span>
        <div class="post">
            <h1><?= $Post['title_post'] ?></h1>
            <div class="postImage">
                <img src="./.././upload/imgPosts/<?= $Post['img_post'] ?>" alt="post">
            </div>
            <p><?= $Post['content_post'] ?></p>
        </div>
        <div class="toolBar">
            <a type="submit" class="btnEdit"> Sửa bài viết</a>
            <a class="btnDelete" href="<?= $_SERVER['PHP_SELF'] . "?act=deletePosts&id=" . $Post['id'] ?>"> Xóa </a>
            <a class="btnDetail" href="<?= $_SERVER["PHP_SELF"] ?>?act=posts">Trở về</a>
        </div>
    <?php } ?>
</div>
<div class="editDetailPosts detailPosts" id="editDetailPosts">
    <?php foreach ($detialPost as $Post) { ?>
        <div class="post">
            <input type="text" value="<?= $Post['title_post'] ?>">
            <input type="file" value="<?= $Post['img_post'] ?>">
            <div class="postImage">
                <img src="./.././upload/imgPosts/<?= $Post['img_post'] ?>" alt="post">
            </div>
            <input type="text" value="<?= $Post['content_post'] ?>">
        </div>
        <div class="toolBar">
            <a class="btnDetail" href="">Cập nhật</a>
        </div>
    <?php } ?>
</div>
<script>

</script>
<style>
    .detailPosts span {
        color: greenyellow;
        margin-left: 3.5rem;
    }

    .detailPosts .post {
        margin-top: 1rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }

    .detailPosts .post h1 {
        text-transform: uppercase;
    }

    .postImage {
        background: #fff;
        width: 90%;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        border-radius: 0.3rem;
        box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
    }

    .detailPosts .post p {
        padding: 3.5rem;
    }

    .toolBar {
        margin-left: 3.5rem;
    }

    .editDetailPosts .post input:nth-child(1) {
        background: transparent;
        border: none;
        color: #fff;
        font-size: 3rem;
    }
</style>