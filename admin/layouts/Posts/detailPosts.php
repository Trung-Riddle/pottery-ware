<div class="detailPosts" id="detailPosts">
    <?php foreach ($detialPost as $Post) { ?>
        <span>Thời gian đăng: <?= $Post['pts_created_at'] ?></span>
        <?php if ($Post['pts_view'] > 20) { ?>
            <p class="view">Lượt xem: <?= $Post['pts_view'] ?> (<span style="color:greenyellow; ">Xu hướng <ion-icon style="color:greenyellow; " name="arrow-up-outline"></ion-icon> </span>)</p>
        <?php } else if ($Post['pts_view'] <= 20 && $Post['pts_view'] > 5) { ?>
            <p class="view">Lượt xem: <?= $Post['pts_view'] ?></p>
        <?php } else { ?>
            <p class="view">Lượt xem: <?= $Post['pts_view'] ?> (<span style="color:red; "> Không xu hướng <ion-icon style="color:red; " name="arrow-down-outline"></ion-icon> </span>)</p>
        <?php } ?>
        <div class="post" id="Old_post">
            <h1 class="posts_title"><?= $Post['pts_title'] ?></h1>
            <div class="postImage">
                <img src="./.././upload/imgPosts/<?= $Post['pts_img'] ?>" alt="post">
            </div>
            <p class="post_contents"><?= $Post['pts_contents'] ?></p>
        </div>
        <form action="<?= $_SERVER['PHP_SELF'] ?>?act=editPosts" class="postss editPost" id="Edit_post" method="post" enctype="multipart/form-data">
            <input class="title_post_edit" type="text" value="<?= $Post['pts_title'] ?>" name="pts_title">
            <input type="hidden" name="pts_id" value="<?= $Post['pts_id'] ?>">
            <input type="hidden" name="name_pts_img" id="" value="<?= $Post['pts_img'] ?>">
            <input type="file" id="pts_img" name="pts_img" style="display: none;">
            <label class="edit_img" for="pts_img">
                <ion-icon name="images-outline"></ion-icon><img src="./.././upload/imgPosts/<?= $Post['pts_img'] ?>" alt="post">
            </label>
            <textarea class="post_contents_edit" name="pts_contents"><?= $Post['pts_contents'] ?></textarea>
            <button type="submit" value="editPosts" name="editPosts" class="butedit_post">Cập nhật<button>
        </form>
        <div class="toolBar toolDetail">
            <button class="but_edit" id="edit_pos"> <i class='fa-solid fa-pen-to-square pen-custom-ad'></i></button>
            <a href="<?= $_SERVER['PHP_SELF'] . "?act=deletePosts&pts_id=" . $Post['pts_id'] ?>"><i class=" fa-solid fa-trash-can trash trash-custom-ad"></i></a>&nbsp;
            <a href="<?= $_SERVER["PHP_SELF"] ?>?act=posts"><i class=" fa-solid   trash-custom-ad">
                    <ion-icon name="return-up-back-outline"></ion-icon>
                </i></a>&nbsp;
        </div>
    <?php } ?>

    <script>
        var edit_pos = document.getElementById("edit_pos");
        var Old_post = document.getElementById("Old_post");
        var Edit_post = document.getElementById("Edit_post");
        var index = 1;
        edit_pos.onclick = () => {
            if (index == 1) {
                Edit_post.style.display = "block";
                Old_post.style.display = "none";
                index++;
            } else {
                Edit_post.style.display = "none";
                Old_post.style.display = "block";
                index--;
            }
        }
    </script>
    <style>
        .postss {
            display: none;
        }

        .but_edit {
            border: none;
            background: transparent;
        }
    </style>
</div>