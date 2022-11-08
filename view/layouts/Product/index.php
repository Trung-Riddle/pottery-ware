<div class="container">
    <div class="titlePro">
        <h4 id="headTitle">Danh sách sản phẩm</h4>
    </div>
    <div class="wrapperPro">
        <div class="navPro">
            <div class="searchPro">
                <form action="<?= $_SERVER['PHP_SELF'] ?>?page=searchPro" method="post">
                    <i class="fa-duotone fa-filter-list"></i>
                    <input type="search" name="nameProAndCate" placeholder="Bộ lọc tìm kiếm" required>
                    <input type="hidden" type="submit" name="submitSearchPro" value="submitSearchPro">
                </form>
            </div>
            <details open>
                <summary>
                    <div class="titleSideBarPro">
                        Danh mục<i class="fa-regular fa-square-p"></i>
                    </div>
                </summary>
                <ul class="categoryNavPro">
                    <li><a href="<?= $_SERVER['PHP_SELF'] ?>?page=product">Tất cả
                            sản phẩm</a><span><?= countDataDB("SELECT count(*) FROM product") ?></span>
                    </li>
                    <?php $cate = selectAllDataDB("SELECT * FROM category INNER JOIN product ON category.cate_id = product.prd_id_cate WHERE cate_status = 1 GROUP BY cate_name ORDER BY cate_id DESC"); foreach($cate as $value) { extract($value)?>
                    <?php
                        $amountPro = countDataDB("SELECT count(*) FROM product WHERE prd_id_cate = '$cate_id' GROUP BY '$cate_id'");
                    ?>
                    <li><a
                            href="<?= $_SERVER['PHP_SELF'] ?>?page=searchProByCate&nameCate=<?= $cate_id ?>"><?= $cate_name ?></a><span><?= $amountPro > 0 ? $amountPro : "0"; ?></span>
                    </li>
                    <?php } ?>
                </ul>
            </details>
            <details open>
                <summary>
                    <div class="titleSideBarPro">
                        Xem nhiều nhất<i class="fa-regular fa-eye"></i>
                    </div>
                </summary>
                <ul class="categoryNavPro">
                    <?php $topView = selectAllDataDB("SELECT prd_id, prd_name, prd_view, prd_status FROM product WHERE prd_status = 1 AND prd_view > 0 ORDER BY prd_view DESC LIMIT 0, 10"); foreach($topView as $value) { extract($value)?>
                    <li><a
                            href="<?= $_SERVER['PHP_SELF'] ?>?page=detailProduct&idPro=<?= $prd_id ?>"><?= $prd_name ?></a><span><?= $prd_view ?></span>
                    </li>
                    <?php } ?>
                </ul>
            </details>
        </div>
        <div class="wrapperListPro">
            <div class="listPro">
                <?php foreach ($pro as $value) { extract($value)?>
                <div class="itemPro"
                    onclick="window.location.href = '<?= $_SERVER['PHP_SELF'] ?>?page=detailProduct&idPro=<?= $prd_id ?>'">
                    <div class="imgPro">
                        <img src="./upload/imgProduct/<?= $prd_img ?>" alt="Pottery Ware">
                    </div>
                    <div class="contentPro">
                        <div class="namePro"><?= $prd_name ?></div>
                        <div class="pricePro"><?= $prd_price ?> VND</div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <ul class="pagingPro" id="pagingPro"></ul>
        </div>
    </div>
</div>
<script>
//*Tạo cấu trúc các biến phân trang
let thisPage = 1;
let limitProduct = 12;
if (screen.width <= 768) limitProduct = 8;
let listCard = document.querySelectorAll(".itemPro");

function loadItem(thisPage) {
    //* Logic phân trang theo giới hạn sản phẩm show ra (limitProduct)
    let beginGetPage = limitProduct * (thisPage - 1);
    let endGetPage = limitProduct * thisPage - 1;

    //* Lọc các item product để kiểm tra theo logic ở trên
    listCard.forEach((item, key) => {
        if (key >= beginGetPage && key <= endGetPage) {
            item.style.display = "block";
        } else {
            item.style.display = "none";
        }
    });
    listPage(thisPage);
}
loadItem(thisPage);

//*Kiểm tra tổng số trang
function listPage(thisPage) {
    let tatolPage = Math.ceil(listCard.length / limitProduct);
    // document.querySelector("#pagingPro").innerHTML = "";
    if (thisPage > 1) {
        let prev = document.createElement("li");
        prev.innerHTML = "<i class='fa-regular fa-circle-chevron-left'></i>";
        document.querySelector("#pagingPro").append(prev);
        prev.setAttribute("onclick", "changePage(" + (thisPage - 1) + ")");
    }

    if (tatolPage != 1) {
        for (let index = 1; index <= tatolPage; index++) {
            let newPage = document.createElement("li");
            newPage.innerText = index;
            if (index == thisPage) {
                newPage.classList.add("active");
            }
            document.querySelector("#pagingPro").appendChild(newPage);
            newPage.setAttribute("onclick", "changePage(" + index + ")");
        }
    }

    if (thisPage != tatolPage) {
        let next = document.createElement("li");
        next.innerHTML = "<i class='fa-regular fa-circle-chevron-right'></i>";
        document.querySelector("#pagingPro").append(next);
        next.setAttribute("onclick", "changePage(" + (thisPage + 1) + ")");
    }
}

// //* Đổi trang
function changePage(index) {
    thisPage = index;
    document.querySelector("#pagingPro").innerHTML = "";
    loadItem(thisPage);
    window.location.href = "#headTitle"
}
</script>