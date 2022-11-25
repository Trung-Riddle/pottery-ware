<div class="tool-add-form glow">
    <span class="text"><a href="<?= $_SERVER['PHP_SELF'] ?>?act=category"><i
                class="fa-light fa-square-chevron-left"></i>&nbsp; Quay Lại</a></span>
</div>
<form action="<?= $_SERVER['PHP_SELF'] ?>?act=addCate" class="form-addproduct" method="post"
    enctype="multipart/form-data">
    <h2 class="neon-purple" id="trav">Thêm Danh Mục Sản Phẩm</h2>
    <div class="flex-form-row-3">
        <div class="form-group-ad-3">
            <label for="cat-sta">Trạng Thái</label>
            <select name="cate_status" id="cate-sta">
                <option value="">-- Chọn Trạng Thái --</option>
                <option value="1">Hoạt Động</option>
                <option value="0">Không Hoạt Động</option>
            </select>
        </div>
        <div class="form-group-ad-3">
            <label for="name-category">Tên Danh Mục *</label>
            <input type="text" id="name-category" name="cate_name" />
        </div>
        <div class="form-group-ad">
            <button class="submitbtn-ad my-5" type="submit" name="addCate" value="addCate">
                Thêm Danh Mục
            </button>
        </div>
    </div>
</form>