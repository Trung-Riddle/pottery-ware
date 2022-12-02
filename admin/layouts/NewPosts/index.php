<div class="tool-add-form glow">

    <span class="text"><a href="<?= $_SERVER['PHP_SELF'] ?>?act=posts"><i
                class="fa-light fa-square-chevron-left"></i>&nbsp;
            Quay Lại</a></span>

</div>
<form action="" class="form-addproduct" method="post" enctype="multipart/form-data">
    <h2 class="neon-purple" id="trav">Thêm Bài Viết Mới</h2>
    <div class="flex-form-row-3">
        <div class="form-group-ad-3">
            <label for="title-post">Tiêu Đề Bài Viết *</label>
            <input type="text" name="pts_title">
        </div>
        <div class="form-group-ad">
            <label for="title-post">Nội Dung Bài Viết *</label>
            <textarea name="post_content" id="post_content"></textarea>
        </div>
        <div class="form-group-ad ">
            <button class="submitbtn-ad my-5" type="submit"> Đăng Bài</button>
        </div>
    </div>
</form>
<script src="../ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('post_content');
</script>