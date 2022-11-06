<?php
    if (isset($_GET["page"])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'aboutPage':
                echo "about";
                break;
            case 'detailProduct':
                $pro = selectAllDataDB("SELECT * FROM product");
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
    }
?>