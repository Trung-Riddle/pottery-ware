<div class="tool-add-form glow">

    <span class="text"><a href="<?= $_SERVER['PHP_SELF'] ?>?act=newPosts"><i class="fa-regular fa-octagon-plus"></i>&nbsp; Viết Bài</a></span>

</div>
<span style="
    color: #fff;
    margin-top: 1rem;
">
    <?php
    echo "Số lượng bài viết: " . $countPost;
    ?>
</span>
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
        <?php $index = 0 ?>
        <?php foreach ($listPost as $Post) { ?>
            <?php $index++ ?>
            <tr>
                <td><label class="container-c">
                        <input type="checkbox">
                        <span class="checkmark-c"></span>
                    </label></td>
                <td colspan="3" class="masp"><?= $index ?></td>
                <td colspan="3"><img style="
                                width: 56px;
                                object-fit: cover;
                                border-radius: 4px;
                                box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px,
                                    rgba(17, 17, 26, 0.1) 0px 0px 8px;
                                object-position: center;
                                " src="../upload/imgPosts/<?= $Post['pts_img'] ?>" height="56px" alt="" /></td>
                <td class="name-th"><?= $Post['pts_title'] ?></td>
                <td>
                    <a href="<?= $_SERVER['PHP_SELF'] ?>?act=deletePosts&pts_id=<?= $Post['pts_id'] ?>"><i class=" fa-solid fa-trash-can trash trash-custom-ad"></i></a>&nbsp;
                    <a href="<?= $_SERVER['PHP_SELF'] ?>?act=detialPost&pts_id=<?= $Post['pts_id'] ?>"><i class="fa-solid fa-eye pen-custom-ad"></i></a>&nbsp;
                    <a href="#"><i class="fa-solid fa-eye-slash eye-custom-ad"></i></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>