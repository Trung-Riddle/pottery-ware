<?php
if (isset($_GET["act"])) {
    switch ($_GET["act"]) {
            //* DASHBOARD
        case 'dashboard':
            include_once("./layouts/Dashboard/index.php");
            break;

            //* ORDER
        case 'order':
            include_once("./layouts/order/index.php");
            break;

            //* POSTS
        case 'posts':
            $listPost = getAllPost();
            $countPost = countPost();
            include_once("./layouts/posts/index.php");
            break;
        case 'deletePosts':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                deletePost($id);
                header("location: {$_SERVER['PHP_SELF']}?act=posts");
            }
            break;
        case 'detialPost':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $detialPost = getOnePost($id);
                include_once("./layouts/posts/detailPosts.php");
            }
            break;
            //* COMMENT
        case 'comment':
            $groupByNameProCmt = selectAllDataDB("SELECT name_pro FROM comment GROUP BY name_pro ORDER BY id DESC");
            $cmt = selectAllDataDB("SELECT * FROM comment WHERE status_cmt = 1 ORDER BY id DESC LIMIT 0,10");
            include_once("./layouts/comment/index.php");
            break;
        case 'searchCmt':
            $user_name = $_POST['userName'];
            $check_name_pro = $_POST['namePro'];
            if ($check_name_pro != null) {
                $name_pro = "and name_pro = '$check_name_pro'";
            } else {
                $name_pro = "";
            }
            $sql = "SELECT * FROM comment WHERE user_name = '$user_name' $name_pro ORDER BY id DESC";
            $cmt = selectAllDataDB($sql);
            $groupByNameProCmt = selectAllDataDB("SELECT name_pro FROM comment GROUP BY name_pro ORDER BY id DESC");
            include_once("./layouts/comment/index.php");
            break;
        case 'delCmt':
            if (isset($_GET['idCmt'])) {
                $id_cmt = $_GET['idCmt'];
                $sql = "DELETE FROM comment WHERE id =".$id_cmt;
                deleteDataDB($sql);
                header("location: {$_SERVER['PHP_SELF']}?act=comment");
            }
            break;
        case 'showStatusCmt-0':
            $cmt = selectAllDataDB("SELECT * FROM comment WHERE status_cmt = 0 ORDER BY id DESC LIMIT 0,10");
            include_once("./layouts/comment/index.php");
            break;
        case 'updateStatusCmt':
            if (isset($_GET['status'])) {
                $id_cmt = $_GET['idCmt'];
                $status_cmt = $_GET['status'];
                $sql = "UPDATE comment SET status_cmt = '".$status_cmt."' WHERE id = ".$id_cmt;
                editDataDB($sql);
                header("location: {$_SERVER['PHP_SELF']}?act=comment");
            }
            break;

            //* CATEGORY
        case 'category':
            $cate = selectAllDataDB("SELECT * FROM category ORDER BY cate_id DESC");
            include_once("./layouts/category/index.php");
            break;
        case 'addCate':
            if (isset($_POST['addCate']) && ($_POST['addCate'])) {
                $name_cate = $_POST['nameCate'];
                $status_cate = $_POST['statusCate'];
                $day_at = date("Y-m-d");
                $sql = "INSERT INTO category (cate_name, cate_status, cate_day_at) VALUES ('$name_cate', '$status_cate', '$day_at')";
                addDataDB($sql);
                header("location: {$_SERVER['PHP_SELF']}?act=category");
            }
            break;
        case 'deleteCate':
            if (isset($_GET['idCate'])) {
                $id_cate = $_GET['idCate'];
                $sql = "DELETE FROM category WHERE cate_id =".$id_cate;
                deleteDataDB($sql);
                header("location: {$_SERVER['PHP_SELF']}?act=category");
            }
            break;
        case 'editCate':
            if (isset($_GET['idCate'])) {
                $id_cate = $_GET['idCate'];
                $sql = "SELECT * FROM category WHERE cate_id = ".$id_cate;
                $cate = selectOneDataDB($sql);
                include_once("./layouts/Category/index.php");
            }
            if (isset($_POST['editCate']) && ($_POST['editCate'])) {
                $name_cate = $_POST['nameCate'];
                $status_cate = $_POST['statusCate'];
                $id_cate = $_POST['idCate'];
                $sql = "UPDATE category SET cate_name = '".$name_cate."', cate_status = '".$status_cate."' WHERE cate_id = ".$id_cate;
                editDataDB($sql);
                $cate = selectOneDataDB("SELECT * FROM category WHERE cate_id = ".$id_cate);
                include_once("./layouts/Category/index.php");
            }
            break;

            //* PRODUCT
        case 'product':
            $cate = selectAllDataDB("SELECT cate_name FROM category");
            $pro = selectAllDataDB("SELECT * FROM product INNER JOIN category ON product.prd_id = category.cate_id ORDER BY prd_id DESC");
            var_dump($pro);
            include_once("./layouts/product/index.php");
            break;
        case 'addPro':
            if (isset($_POST['addPro']) && ($_POST['addPro'])) {
                $name_pro = $_POST['namePro'];
                $price_pro = $_POST['pricePro'];
                $name_cate = $_POST['nameCate'];
                foreach(selectOneDataDB("SELECT cate_id FROM category WHERE cate_name = '$name_cate'") as $value){
                    $id_cate = $value['cate_id'];
                }
                $date_add = date("Y-m-d");
                $img_pro = $_FILES['imgPro']['name'];
                $imgPath = "../upload/imgProduct/";
                $target_file = $imgPath . str_replace(" ", "-", basename($img_pro));
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                move_uploaded_file($_FILES['imgPro']['tmp_name'], $target_file);
                $newImgPro = "pottery-ware-" . str_replace(" ", "-", $name_pro) . ".jpg";
                rename($target_file, $imgPath . $newImgPro);
                $sql = "INSERT INTO product (cate_id, prd_name, prd_price, prd_img, prd_day_at) VALUES ('$id_cate', '$name_pro', '$price_pro', '$newImgPro', '$date_add')";
                addDataDB($sql);
                header("location: {$_SERVER['PHP_SELF']}?act=product");
            }
            break;
        case 'editPro':
            if (isset($_GET['idPro'])) {
                $id_pro = $_GET['idPro'];
                $cate = selectAllDataDB("SELECT * FROM category ORDER BY id DESC");
                $sql = "SELECT * FROM product WHERE id=".$id_pro;
                $pro = selectOneDataDB($sql);
                include_once("./layouts/product/index.php");
            }
            if (isset($_POST['editPro']) && ($_POST['editPro'])) {
                $cate = selectAllDataDB("SELECT * FROM category ORDER BY id DESC");
                $id_pro = $_POST['idPro'];
                $name_pro = $_POST['namePro'];
                $price_pro = $_POST['pricePro'];
                $del = $_POST['delPro'];
                $name_cate = $_POST['nameCate'];
                $status_pro = $_POST['statusPro'];
                $date_add = date("Y-m-d");
                $detail_pro = $_POST['detailPro'];
                $img_pro = $_FILES['imgPro']['name'];
                if ($_FILES['imgPro']['name'] == null) {
                    $newImgPro = $_POST['nameImgPro'];
                } else {
                    $imgPath = "../upload/imgProduct/";
                    $imgPathPro = "../upload/imgProduct/" . $_POST['nameImgPro'];
                    if (file_exists($imgPathPro)) {
                        unlink($imgPathPro);
                    }
                    $target_file = $imgPath . str_replace(" ", "-", basename($img_pro));
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    move_uploaded_file($_FILES['imgPro']['tmp_name'], $target_file);
                    $newImgPro = "pottery-ware-" . str_replace(" ", "-", $name_pro) . ".png";
                    rename($target_file, $imgPath . $newImgPro);
                }
                $sqlEditPro = "UPDATE product SET name_pro ='$name_pro', price_pro = '$price_pro', del = '$del', name_cate ='$name_cate', img_pro = '$newImgPro', status_pro = '$status_pro', date_add = '$date_add', detail = '$detail_pro' WHERE id = ".$id_pro;
                editDataDB($sqlEditPro);
                $sql = "SELECT * FROM product WHERE id=".$id_pro;
                $pro = selectOneDataDB($sql);
                include_once("./layouts/product/index.php");
            }
            break;
        case 'deletePro':
            if (isset($_GET['idPro'])) {
                $id_pro = $_GET['idPro'];
                $imgPathPro = "../upload/imgProduct/" . $_GET['imgPro'];
                $sql = "DELETE FROM product WHERE id =".$id_pro;
                deleteDataDB($sql);
                if (file_exists($imgPathPro)) {
                    unlink($imgPathPro);
                }
                header("location: {$_SERVER['PHP_SELF']}?act=product");
            }
            break;

            //* CHARTS
        case 'charts':
            include_once("./layouts/charts/index.php");
            break;

            //* CONTACTS
        case 'contacts':
            include_once("./layouts/Contacts/index.php");
            break;

            //* SENDMAIL
        case 'sendmail':
            include_once("./layouts/sendmail/index.php");
            break;
            //* USER
        case 'user':
            $listUser = getAllUser();
            $countUser = countCustomer();
            include_once("./layouts/User/index.php");
            break;
        case 'deleteUser':
            if (isset($_GET['id'])) {
                $id_user = $_GET['id'];
                deleteUser($id_user);
                header("location: {$_SERVER['PHP_SELF']}?act=user");
            }
            break;
        case 'infoUser':
            if (isset($_GET['id'])) {
                $id_user = $_GET['id'];
                $infoUser = getOneUser($id_user);
                include_once("./layouts/User/infoUser.php");
            }
            break;

        default:

            break;
    }
}