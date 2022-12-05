<link rel="stylesheet" href="./style/Banner.css">
<div class="banner_conteiner">
    <?php foreach ($banner as $Banner) { ?>
        <form id="Banner-<?= $Banner['bn_id'] ?>" class="Banner1" enctype="multipart/form-data" method="post" action="<?= $_SERVER['PHP_SELF'] ?>?act=editBanner">
            <h2>Banner <?= $Banner['bn_id'] ?></h2>
            <input type="hidden" name="bn_id" value="<?= $Banner['bn_id'] ?>">
            <input type="hidden" name="name_bn_img" id="" value="<?= $Banner['bn_img'] ?>">
            <input type="text" placeholder="Tiêu đề" name="bn_title" require value="<?= $Banner['bn_title'] ?>">
            <input type="text" placeholder="Nội dung" name="bn_content" value="<?= $Banner['bn_content'] ?>" require>
            <label for="up_file_<?= $Banner['bn_id'] ?>">
                <img src=" ../upload/banner/<?= $Banner['bn_img'] ?>" alt="Banner">
                <ion-icon name="images-outline"></ion-icon>
            </label>
            <input type="file" style="display: none;" name="bn_img" id="up_file_<?= $Banner['bn_id'] ?>">
            <input form="Banner-<?= $Banner['bn_id'] ?>" type="submit" name="editBanner" value="Thay đổi">
        </form>
    <?php
    } ?>
</div>