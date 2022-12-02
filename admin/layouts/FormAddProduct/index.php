<div class="tool-add-form glow">

    <span class="text"><a href="<?= $_SERVER['PHP_SELF'] ?>?act=product"><i
                class="fa-light fa-square-chevron-left"></i>&nbsp; Quay Lại</a></span>

</div>
<form action="<?= $_SERVER['PHP_SELF'] ?>?act=addPro" class="form-addproduct" method="post"
    enctype="multipart/form-data">
    <h2 class="neon-purple" id="trav">Thêm Sản Phẩm</h2>
    <div class="flex-form-row">
        <div class="form-group-ad">
            <label for="cate">Danh Mục *</label>
            <select name="cate_id" id="cate">
                <option value="">--Chọn Danh Mục--</option>
                <?php foreach ($cate as $value) { ?>
                <option value="<?= $value['cate_id'] ?>"><?= $value['cate_name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group-ad">
            <label for="">Tên Sản Phẩm *</label>
            <input id="" type="text" name="prd_name">
        </div>
        <div class="form-group-ad">
            <label for="pri">Giá Sản Phẩm *</label>
            <input id="pri" name="prd_price" type="Number" min="0">
        </div>
    </div>
    <div class="flex-form-row-2">
        <div class="form-group-ad">
            <label for="qty">Giá giảm *</label>
            <input id="qty" name="prd_del" type="Number" min="0">
            <label for="sta">Trạng Thái *</label>
            <select name="prd_status" id="sta">
                <option value="">--Chọn Trạng Thái--</option>
                <option value="1">Hoạt Động</option>
                <option value="0">Không Hoạt Động</option>
            </select>
        </div>
        <div class="form-group-ad-2">
            <label for="des">Mô Tả Sản Phẩm *</label>
            <textarea name="prd_description" id="des" cols="" rows=""></textarea>
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
        <button name="addProduct" class="submitbtn-ad" type="submit" value="addProduct"> Thêm Sản Phẩm</button>
    </div>
</form>
<script>
let pdPreview = document.querySelector(".prd");
let coverPD = document.getElementById("upload-product");
let uploadIcon = document.querySelector(".upload-icon");

pdPreview.addEventListener("click", (_) => coverPD.click());

coverPD.addEventListener("change", (_) => {
    let filePD = coverPD.files[0];
    let readerPD = new FileReader();
    readerPD.onload = function() {
        pdPreview.src = readerPD.result;
        uploadIcon.style.display = "none";
    };
    readerPD.readAsDataURL(filePD);
});
let fileInputFour = document.querySelector("#file-input");
let imageShow = document.querySelector("#images-show");
let numOffile = document.querySelector("#num-of-file");

function showImageFour() {
    numOffile.textContent = `${fileInputFour.files.length} files Được chọn`;
    for (index of fileInputFour.files) {
        let reader = new FileReader();
        let figure = document.createElement("figure");
        let figcap = document.createElement("figcaption");
        figcap.innerText = index.name;
        figure.appendChild(figcap);
        reader.onload = () => {
            let img = document.createElement("img");
            img.setAttribute("src", reader.result);
            figure.insertBefore(img, figcap);
        };
        imageShow.appendChild(figure);
        reader.readAsDataURL(index);
    }
}

function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTable").deleteRow(i);
}
jQuery(function() {
    jQuery(".trash").click(function() {
        swal({
            title: "Bạn Muốn Xoá Nó ư [!]",
            text: "Bạn có chắc chắn là muốn xóa sản phẩm này? ",
            buttons: ["Hủy bỏ", "Đồng ý"],
        }).then((willDelete) => {
            if (willDelete) {
                swal("Đã xóa thành công.!", {});
            }
        });
    });
});
oTable = $("#sampleTable").dataTable();
$("#all").click(function(e) {
    $("#sampleTable tbody :checkbox").prop(
        "checked",
        $(this).is(":checked")
    );
    e.stopImmediatePropagation();
});
</script>
<script>
let btnMenuAd = document.querySelector("#btn");
let sidebarAd = document.querySelector(".sidebar-admin");
let containerAd = document.querySelector(".tab-table-products");
btnMenuAd.onclick = function() {
    sidebarAd.classList.toggle("active");
    btnMenuAd.classList.toggle("fa-bars-filter");
    btnMenuAd.classList.toggle("fa-bars-sort");
    containerAd.classList.toggle("active");
};
let iconsLink = document.querySelectorAll(".icons-link");
iconsLink.forEach((link) => {
    link.addEventListener("click", () => {
        removeActiveClasses();
        link.classList.add("active");
    });
});

function removeActiveClasses() {
    iconsLink.forEach((link) => {
        link.classList.remove("active");
    });
}
</script>