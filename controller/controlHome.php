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
            if (isset($_GET['nameCate'])) {
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
            } else {
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
                $cmt = selectAllDataDB("SELECT * FROM comment INNER JOIN user ON comment.cmt_id_user = user.ur_id WHERE cmt_id_pro = '$id_pro' LIMIT 0, 10");
                $countCmt = countDataDB("SELECT count(*) FROM comment WHERE cmt_id_pro = '$id_pro'");
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
                if((isset($_POST["submitCmt"])) && ($_POST["submitCmt"])){
                    $cmt_id_user = $_POST["idUser"];
                    $cmt_id_pro = $_POST["idPro"];
                    $cmt_content = $_POST["cmtContent"];
                    $cmt_created_at = date("Y-m-d");
                    $backPage = $_POST["backPage"];
                    $sql = "INSERT INTO comment (cmt_id_user, cmt_id_pro, cmt_content, cmt_created_at) VALUES ($cmt_id_user, '$cmt_id_pro', '$cmt_content', '$cmt_created_at')";
                    addDataDB($sql);
                    echo"<script>
                    window.history.go(-1);
                    </script>";
                }
                break;
            case 'addCart':
                // unset($_SESSION['carts']);
                if(isset($_SESSION['carts']) && isset($_COOKIE['prd_id'])){
                    $prd_id = $_COOKIE['prd_id'];
                    $prd_amount = json_decode($_COOKIE['prd_amount']);
                    $sql = "SELECT * FROM product WHERE prd_id = ".$prd_id;
                    $prd = selectAllDataDB($sql);
                    $index = 0;
                    $checkCart = false;

                    //* lấy tất cả thông tin của sản phẩm đc thêm vào giỏ hàng
                    foreach($prd as $value){

                        //* Kiểm tra xem trong giỏ hàng có sản phẩm bị trùng với sản phẩm vừa mới thêm không
                        foreach ($_SESSION['carts'] as $item) {
                            if($item[0] == $prd_id){
                                $item[4] += $prd_amount;
                                $_SESSION['carts'][$index][4] = $item[4];
                                $checkCart = true;
                                break;
                            }
                            $index++;
                        }

                        //* Nếu ko có sản phẩm trùng thì thêm mới sản phẩm vào giỏ hàng
                        if($checkCart == false){
                            $item = [
                                $value['prd_id'], 
                                $value['prd_img'], 
                                $value['prd_name'], 
                                $value['prd_price'], 
                                $prd_amount
                            ];
                            $_SESSION['carts'][] = $item;
                        }
                    }

                    //* kiểm tra nếu còn tồn tại cookie của sản phẩm thì xóa
                    echo "
                    <script>
                        document.cookie = 'prd_id=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                        document.cookie = 'prd_amount=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                    </script>";
                }
                require_once("./view/layouts/Cart/index.php");
                break;

            //* Xóa 1 sản phẩm trong giỏ hàng
            case 'delOneRowCart':
                if((isset($_GET['c_id']))){
                    $c_id = $_GET['c_id'];
                    array_splice($_SESSION['carts'], $c_id, 1);
                    if(count($_SESSION['carts']) > 0){
                        echo "<script> window.location = '".$_SERVER['HTTP_REFERER']."' </script>";
                    }else{
                        echo "<script> window.location = '".$_SERVER['PHP_SELF']."?page=product' </script>";
                    }
                }
                break;
            default:
                # code...
                break;
        }
}else{
    include_once("./view/layouts/Banner/index.php");
    include_once("./view/layouts/MainHome/index.php");
}