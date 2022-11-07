<?php
    if (isset($_GET["page"])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'introduce':
                echo "introduce";
                break;

            case 'product':
                include_once("./view/layouts/Product/index.php");
                break;

            case 'detailProduct':
                // $id_pro = $_POST['idPro'];
                // $name_pro = $_POST['namePro'];
                $pro = selectOneDataDB("SELECT * FROM product");  //WHERE id = $id_pro
                // $sql = "SELECT count(*) FROM product WHERE name_pro =".$name_pro;
                // $checkCountSameDetailProduct = countDataDB($sql);
                include_once("./view/layouts/DetailProduct/index.php");
                break;

            case 'news':
                echo "news";
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