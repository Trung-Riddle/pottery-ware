<?php
    if (isset($_GET["page"])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'introduce':
                echo "introduce";
                break;
            
            //* Handle Product
            case 'product':
                $pro = selectAllDataDB("SELECT * FROM product WHERE prd_status = 1");
                include_once("./view/layouts/Product/index.php");
                break;
            case 'searchProByCate':
                if(isset($_GET['nameCate'])){                   
                    $name_cate = $_GET['nameCate'];
                    $pro = selectAllDataDB("SELECT * FROM product WHERE prd_id_cate = '$name_cate'");
                    include_once("./view/layouts/Product/index.php");
                }
                break;
            case 'searchPro':
                $search = $_POST['nameProAndCate'];
                $checkSearch = countDataDB("SELECT count(*) FROM product INNER JOIN category ON product.prd_id_cate = category.cate_id WHERE prd_name = '$search' OR cate_name = '$search'");
                if ($checkSearch != 0) {
                    $pro = selectAllDataDB("SELECT * FROM product INNER JOIN category ON product.prd_id_cate = category.cate_id WHERE prd_name = '$search' OR cate_name = '$search'");
                    include_once("./view/layouts/Product/index.php");
                }else{
                    echo "
                        <div style='width: 100%; margin: 10rem 0; font-size: 24px; text-align: center'>
                            Sản phẩm không tồn tại
                            <a href='{$_SERVER['PHP_SELF']}?page=product' style='display: block; text-decoration: underline !important; font-size: 18px;'>Quay lại trang sản phẩm</a>
                        </div>
                    ";
                }
                break;
            case 'detailProduct':
                $id_pro = $_GET['idPro'];
                $pro = selectOneDataDB("SELECT * FROM product INNER JOIN category ON product.prd_id_cate = category.cate_id WHERE prd_id = '$id_pro'");
                if (isset($_GET['idPro'])) {
                    $top_view = $pro[0]['prd_view'];
                    $top_view += 1;
                    addDataDB("UPDATE product SET prd_view = '$top_view' WHERE prd_id = '$id_pro'");
                }
                include_once("./view/layouts/DetailProduct/index.php");
                break;

            case 'news':
                echo "news";
                break;
            
            case 'comment':
                break;
            default:
                # code...
                break;
        }
    }else{
        include_once("./view/layouts/Banner/index.php");
        include_once("./view/layouts/MainHome/index.php");
    }
?>