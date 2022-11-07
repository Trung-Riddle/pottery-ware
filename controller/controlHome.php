<?php
    if (isset($_GET["page"])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'aboutPage':
                echo "about";
                break;
            case 'detailProduct':
<<<<<<< HEAD
                // $id_pro = $_POST['idPro'];
                // $name_pro = $_POST['namePro'];
                $pro = selectOneDataDB("SELECT * FROM product");  //WHERE id = $id_pro
                // $sql = "SELECT count(*) FROM product WHERE name_pro =".$name_pro;
                // $checkCountSameDetailProduct = countDataDB($sql);
=======
                $pro = selectAllDataDB("SELECT * FROM product");
>>>>>>> refs/remotes/origin/main
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
<<<<<<< HEAD
=======
?>
>>>>>>> refs/remotes/origin/main
