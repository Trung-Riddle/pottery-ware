<div style="overflow-x: auto">
    <div class="tool-add-form glow">
        <span class="text"><a href="<?= $_SERVER['PHP_SELF'] ?>?act=formAddProduct"><i
                    class="fa-light fa-octagon-plus"></i>&nbsp; Thêm Sản Phẩm</a></span>
        <p class="show-option">
            <small id="shadow">
                <small id="blink" style="font-size: 18px">Hiện: </small> </small><select name="" id="">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
            </select>
        </p>
    </div>
    <div class="container">
        <div class="wrapperTablePro table">
            <table>
                <thead>
                    <tr>
                        <th>
                            <label class="container-c">
                                <input type="checkbox" />
                                <span class="checkmark-c"></span>
                            </label>
                        </th>
                        <th class="masp" colspan="1">#</th>
                        <th colspan="">Hình Ảnh</th>
                        <th colspan="">Tên Sản Phẩm</th>
                        <th colspan="">Danh Mục</th>
                        <th colspan="">Giá</th>
                        <th colspan="">Giảm giá</th>
                        <th colspan="">Trạng Thái</th>
                        <th colspan="">Điều Chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 0 ?>
                    <?php foreach ($pro as $value) { ?>
                    <?php $index++ ?>
                    <tr>
                        <td>
                            <label class="container-c">
                                <input type="checkbox" />
                                <span class="checkmark-c"></span>
                            </label>
                        </td>
                        <td colspan="1" class="masp"><?= $index ?></td>
                        <td>
                            <img style="
                              width: 56px;
                              object-fit: cover;
                              border-radius: 4px;
                              box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px,
                                rgba(17, 17, 26, 0.1) 0px 0px 8px;
                              object-position: center;
                            " src="../upload/imgProduct/<?= $value['prd_img'] ?>" height="56px" alt="" />
                        </td>
                        <td>
                            <p class="namesp">
                                <?= $value['prd_name'] ?>
                            </p>
                        </td>
                        <td><?= $value['cate_name'] ?></td>
                        <td><?= $value['prd_price'] ?> đ</td>
                        <td><?= $value['prd_del'] ?> đ</td>
                        <td id="shadow">
                            <?php
                            if ($value['prd_status'] == 0) {
                                echo "<span id=''>hết hàng</span>";
                            }
                            else{
                                echo "<span id=''>Còn Hàng</span>";
                            }
                        ?>
                        </td>
                        <td>
                            <?php
                            if (isset($_GET['act']) && ($_GET['act'] == "editPro")) {
                                echo "<a href='{$_SERVER['PHP_SELF']}?act=product'>Xong</a>";
                            }
                            else{
                                echo "
                                <a href='{$_SERVER['PHP_SELF']}?act=deletePro&idPro={$value['prd_id']}&imgPro={$value['prd_img']}'><i class='fa-solid fa-trash-can trash trash-custom-ad'></i></a>&nbsp;
                                <a href='{$_SERVER['PHP_SELF']}?act=editPro&idPro={$value['prd_id']}'><i class='fa-solid fa-pen-to-square pen-custom-ad'></i></a>
                                ";
                            }
                        ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <?php if (isset($_GET['act']) && ($_GET['act']) == "editPro") { ?>
        <?php 
            if ($pro[0]['prd_status'] != 0) {
                $selectedActive = "selected";
                $selectedUnactive = null;
            }
            else{
                $selectedActive = null;
                $selectedUnactive = "selected";
            }    
            function checkNameCate($value, $pro){
                if ($value['cate_id'] == $pro[0]['prd_id_cate']) {
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                return $selected;
            }
        ?>
        <form action="<?= $_SERVER['PHP_SELF'] ?>?act=editPro" class="form-addproduct" method="post"
            enctype="multipart/form-data">
            <h2 class="neon-purple" id="trav">Sửa Sản Phẩm</h2>
            <input type="hidden" name="idPro" id="" value="<?= $pro[0]['prd_id'] ?>">
            <div class="flex-form-row">
                <div class="form-group-ad">
                    <label for="cate">Danh Mục *</label>
                    <select name="cate_id" id="cate">
                        <option value="">--Chọn Danh Mục--</option>
                        <?php foreach ($cate as $value) { ?>
                        <option value="<?= $value['cate_id'] ?>" <?= checkNameCate($value, $pro) ?>>
                            <?= $value['cate_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group-ad">
                    <label for="">Tên Sản Phẩm *</label>
                    <input id="" type="text" name="prd_name" value="<?= $pro[0]['prd_name'] ?>">
                </div>
                <div class="form-group-ad">
                    <label for="pri">Giá Sản Phẩm *</label>
                    <input id="pri" name="prd_price" type="Number" min="0" value="<?= $pro[0]['prd_price'] ?>">
                </div>
            </div>
            <div class="flex-form-row-2">
                <div class="form-group-ad">
                    <label for="qty">Giá giảm *</label>
                    <input id="qty" name="prd_del" type="Number" min="0" value="<?= $pro[0]['prd_del'] ?>">
                    <label for="sta">Trạng Thái *</label>
                    <select name="prd_status" id="sta">
                        <option value="">--Chọn Trạng Thái--</option>
                        <option value="1" <?= $selectedActive ?>>Còn hàng</option>
                        <option value="0" <?= $selectedUnactive ?>>Hết hàng</option>
                    </select>
                </div>
                <div class="form-group-ad-2">
                    <label for="des">Mô Tả Sản Phẩm *</label>
                    <textarea name="prd_description" id="des" cols=""
                        rows=""><?= $pro[0]['prd_description'] ?></textarea>
                </div>
            </div>
            <div class="flex-form-row-img">
                <div class="form-group-ad-img">
                    <div class="upload-product-image ">
                        <img class="upload-icon" src="../asset/image/upload.png" alt="camera">
                        <img class="img-rounded-circle prd" height=""
                            src="<?= "../upload/imgProduct/".$pro[0]['prd_img'] ?>" alt="profile">
                        <small class="form-text mb-3"> Chọn Hình Ảnh Hiển Thị</small>
                        <input type="file" class="form-control-file" name="profileUpload" id="upload-product">
                        <input type="hidden" name="nameImgPro" id="" value="<?= $pro[0]['prd_img'] ?>">
                    </div>
                </div>
                <div class="form-upload-ad-imgs">
                    <input type="file" id="file-input" onchange="showImageFour()"
                        accept="image/png, image/jpg, image/jpeg" multiple>
                    <label for="file-input">
                        <i class="fa-duotone fa-upload"></i>&nbsp; Chọn 4 Hình Ảnh
                    </label>
                    <p id="num-of-file">Chưa có files được chọn</p>
                    <div id="images-show">

                    </div>
                </div>
            </div>
            <div class="form-group-ad ">
                <button name="editPro" class="submitbtn-ad" type="submit" value="editPro"> Sửa Sản Phẩm</button>
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
        <?php } ?>
    </div>
</div>