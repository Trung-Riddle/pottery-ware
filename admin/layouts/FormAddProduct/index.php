<div class="tool-add-form glow">

    <span class="text"><a href="<?= $_SERVER['PHP_SELF'] ?>?act=product"><i
                class="fa-light fa-square-chevron-left"></i>&nbsp; Quay Lại</a></span>

</div>
<form action="" class="form-addproduct" method="post" enctype="multipart/form-data">
    <h2 class="neon-purple" id="trav">Thêm Sản Phẩm</h2>
    <div class="flex-form-row">
        <div class="form-group-ad">
            <label for="cate">Danh Mục *</label>
            <select name="" id="cate">
                <option value="">--Chọn Danh Mục--</option>
                <option value="">7845</option>
                <option value="">hjbdjvnb</option>
                <option value="">345</option>
            </select>
        </div>
        <div class="form-group-ad">
            <label for="">Tên Sản Phẩm *</label>
            <input id="" type="text">
        </div>
        <div class="form-group-ad">
            <label for="pri">Giá Sản Phẩm *</label>
            <input id="pri" type="Number" step="10" min="0" VALUE="" MAXLENGTH=16 SIZE=16>
        </div>
    </div>
    <div class="flex-form-row-2">
        <div class="form-group-ad">
            <label for="qty">Số Lượng *</label>
            <input id="qty" type="Number" step="10" min="0">
            <label for="sta">Trạng Thái *</label>
            <select name="" id="sta">
                <option value="">--Chọn Trạng Thái--</option>
                <option value="">Hoạt Động</option>
                <option value="">Không Hoạt Động</option>
            </select>
        </div>
        <div class="form-group-ad-2">
            <label for="des">Mô Tả Sản Phẩm *</label>
            <textarea name="" id="des" cols="" rows=""></textarea>
        </div>
    </div>
    <div class="flex-form-row-img">
        <div class="form-group-ad-img">
            <div class="upload-product-image ">
                <img class="upload-icon" src="../asset/image/upload.png" alt="camera">
                <img class="img-rounded-circle prd" height="" src="../asset/image/background-pd.png" alt="profile">
                <small class="form-text mb-3"> Chọn Hình Ảnh Hiển Thị</small>
                <input type="file" class="form-control-file" name="profileUpload" id="upload-product">
            </div>
        </div>
        <div class="form-upload-ad-imgs">
            <input type="file" id="file-input" onchange="showImageFour()" accept="image/png, image/jpg, image/jpeg"
                multiple>
            <label for="file-input">
                <i class="fa-duotone fa-upload"></i>&nbsp; Chọn 4 Hình Ảnh
            </label>
            <p id="num-of-file">Chưa có files được chọn</p>
            <div id="images-show">

            </div>
        </div>
    </div>
    <div class="form-group-ad ">
        <button class="submitbtn-ad" type="submit"> Thêm Sản Phẩm</button>
    </div>
</form>