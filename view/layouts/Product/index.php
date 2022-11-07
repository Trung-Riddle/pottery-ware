<div class="container">
    <div class="titlePro">
        <h4>Danh sách sản phẩm</h4>
    </div>
    <div class="wrapperPro">
        <div class="navPro">
            <div class="searchPro">
                <i class="fa-duotone fa-filter-list"></i>
                <input type="text" name="" id="" placeholder="Bộ lọc tìm kiếm">
            </div>
            <details open>
                <summary>
                    <div class="" style="font-weight: bold; font-size: 20px; color: gray;">Danh mục</div>
                </summary>
                <ul class="categoryNavPro">
                    <?php $cate = getAllCate(); foreach($cate as $value) { extract($value)?>
                    <li><i class="fa-regular fa-square-p"></i><a href=""><?= $name_cate ?></a></li>
                    <?php } ?>
                </ul>
            </details>
            <details open>
                <summary>
                    <div class="" style="font-weight: bold; font-size: 20px; color: gray;">Xem nhiều nhất</div>
                </summary>
                <ul class="categoryNavPro">
                    <?php $topView = selectAllDataDB("SELECT name_pro, top_view FROM product ORDER BY top_view DESC LIMIT 0, 10"); foreach($topView as $value) { extract($value)?>
                    <li><i class="fa-regular fa-eye"></i><a href=""><?= $name_pro ?></a><span><?= $top_view ?></span>
                    </li>
                    <?php } ?>
                </ul>
            </details>
        </div>
        <div class="wrapperListPro">
            <div class="listPro">
                <?php for ($i=1; $i <= 16; $i++) { ?>
                <div class="itemPro" onclick="window.location.href = '<?= $_SERVER['PHP_SELF'] ?>?page=detailProduct'">
                    <div class="imgPro">
                        <img src="./asset/image/dish/dis<?= $i ?>.jpg" alt="Pottery Ware">
                    </div>
                    <div class="contentPro">
                        <div class="namePro">Bình hoa gốm sứ</div>
                        <div class="pricePro">2000000 VND</div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <ul class="pagingPro">
                <li id="Prev"><i class="fa-regular fa-circle-chevron-left"></i></li>
                <li class="active">1</li>
                <li>2</li>
                <li>3</li>
                <li id="Next"><i class="fa-regular fa-circle-chevron-right"></i></i></li>
            </ul>
        </div>
    </div>
</div>