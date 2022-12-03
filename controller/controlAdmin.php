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
        case 'newPosts':
            require_once("./layouts/NewPosts/index.php");
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
        case 'addPosts':
            if (isset($_POST['addPosts']) && ($_POST['addPosts'])) {
                $title_post = $_POST['title_post'];
                $content_post = $_POST['content_post'];
                $img_post = $_FILES['img_post']['name'];
                $imgPath = "../upload/imgPosts/";
                $target_file = $imgPath . str_replace(" ", "-", basename($title_post));
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                move_uploaded_file($_FILES['img_post']['tmp_name'], $target_file);
                $newPost1 = "pottery-ware1-" . str_replace(" ", "-", $title_post) . ".png";
                rename($target_file, $imgPath . $newPost1);
                $sql = "INSERT INTO posts (title_post, content_post,,img_post,,date_add) 
                VALUES ('$title_post', '$content_post', '$newPost1',now())";
                addDataDB($sql);
                header("location: {$_SERVER['PHP_SELF']}?act=posts");
                echo 'HI';
            }
            break;
            //* COMMENT
        case 'comment':
            // $groupByNameProCmt = selectAllDataDB("SELECT name_pro FROM comment INNER JOIN  GROUP BY name_pro ORDER BY id DESC");
            $cmt = selectAllDataDB("SELECT * FROM comment INNER JOIN user ON comment.cmt_id_user = user.ur_id INNER JOIN product ON comment.cmt_id_pro = product.prd_id WHERE cmt_status = 1 ORDER BY cmt_id DESC LIMIT 0,10");
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
                $sql = "DELETE FROM comment WHERE id =" . $id_cmt;
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
                $sql = "UPDATE comment SET status_cmt = '" . $status_cmt . "' WHERE id = " . $id_cmt;
                editDataDB($sql);
                header("location: {$_SERVER['PHP_SELF']}?act=comment");
            }
            break;

            //* CATEGORY
        case 'category':
            $cate = selectAllDataDB("SELECT * FROM category ORDER BY cate_id DESC");
            include_once("./layouts/category/index.php");
            break;
        case 'formAddCategory':
            include_once("./layouts/FormAddCategory/index.php");
            break;
        case 'addCate':
            if (isset($_POST['addCate']) && ($_POST['addCate'])) {
                $cate_name = $_POST['cate_name'];
                $cate_status = $_POST['cate_status'];
                $day_add = date("Y-m-d");
                $sql = "INSERT INTO category (cate_name, cate_status, cate_created_at) VALUES ('$cate_name', '$cate_status', '$day_add')";
                addDataDB($sql);
                $link = $_SERVER['PHP_SELF'];
                echo "<script>
                    window.location = '$link?act=category'
                </script>";
            }
            break;
        case 'deleteCate':
            if (isset($_GET['idCate'])) {
                $cate_id = $_GET['idCate'];
                $sql = "DELETE FROM category WHERE cate_id =" . $cate_id;
                deleteDataDB($sql);
                $link = $_SERVER['PHP_SELF'];
                echo "<script>
                    window.location = '$link?act=category'
                </script>";
            }
            break;
        case 'editCate':
            if (isset($_GET['idCate'])) {
                $id_cate = $_GET['idCate'];
                $sql = "SELECT * FROM category WHERE cate_id = " . $id_cate;
                $cate = selectOneDataDB($sql);
                include_once("./layouts/Category/index.php");
            }
            if (isset($_POST['editCate']) && ($_POST['editCate'])) {
                $name_cate = $_POST['cate_name'];
                $status_cate = $_POST['cate_status'];
                $id_cate = $_POST['cate_id'];
                $sql = "UPDATE category SET cate_name = '" . $name_cate . "', cate_status = '" . $status_cate . "' WHERE cate_id = " . $id_cate;
                editDataDB($sql);
                $cate = selectOneDataDB("SELECT * FROM category WHERE cate_id = " . $id_cate);
                include_once("./layouts/Category/index.php");
            }
            break;

            //* PRODUCT
        case 'product':
            $pro = selectAllDataDB("SELECT * FROM product INNER JOIN category ON product.prd_id_cate = category.cate_id ORDER BY prd_id DESC");
            include_once("./layouts/product/index.php");
            break;
        case 'formAddProduct':
            $cate = selectAllDataDB("SELECT * FROM category");
            include_once("./layouts/FormAddProduct/index.php");
            break;
        case 'addPro':
            if (isset($_POST['addProduct']) && ($_POST['addProduct'])) {
                $cate_id = $_POST['cate_id'];
                $name_pro = $_POST['prd_name'];
                $price_pro = $_POST['prd_price'];
                $prd_del = $_POST['prd_del'];
                $prd_status = $_POST['prd_status'];
                $prd_description = $_POST['prd_description'];
                $date_add = date("Y-m-d");
                $img_pro = $_FILES['profileUpload']['name'];
                $imgPath = "../upload/imgProduct/";
                $target_file = $imgPath . str_replace(" ", "-", basename($img_pro));
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                move_uploaded_file($_FILES['profileUpload']['tmp_name'], $target_file);
                $newImgPro = "pottery-ware-" . str_replace(" ", "-", $name_pro) . ".png";
                rename($target_file, $imgPath . $newImgPro);
                $sql = "INSERT INTO product (prd_id_cate, prd_name, prd_price, prd_del, prd_status, prd_description, prd_img, prd_created_at) VALUES ('$cate_id', '$name_pro', '$price_pro', '$prd_del', '$prd_status', '$prd_description', '$newImgPro', '$date_add')";
                addDataDB($sql);
                $link = $_SERVER['PHP_SELF'];
                echo "<script>
                    window.location = '$link?act=product'
                </script>";
            }
            break;
        case 'editPro':
            if (isset($_GET['idPro'])) {
                $id_pro = $_GET['idPro'];
                $pro = selectAllDataDB("SELECT * FROM product INNER JOIN category ON product.prd_id_cate = category.cate_id WHERE prd_id = '$id_pro' ORDER BY prd_id DESC");
                include_once("./layouts/product/index.php");
            }
            if (isset($_POST['editPro']) && ($_POST['editPro'])) {
                $id_pro = $_POST['idPro'];
                $name_pro = $_POST['prd_name'];
                $price_pro = $_POST['prd_price'];
                $del = $_POST['prd_del'];
                $name_cate = $_POST['cate_id'];
                $status_pro = $_POST['prd_status'];
                $detail_pro = $_POST['prd_description'];
                $img_pro = $_FILES['profileUpload']['name'];
                $date_add = date("Y-m-d");
                if ($_FILES['profileUpload']['name'] == null) {
                    $newImgPro = $_POST['nameImgPro'];
                } else {
                    $imgPath = "../upload/imgProduct/";
                    $imgPathPro = "../upload/imgProduct/" . $_POST['nameImgPro'];
                    if (file_exists($imgPathPro)) {
                        unlink($imgPathPro);
                    }
                    $target_file = $imgPath . str_replace(" ", "-", basename($img_pro));
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    move_uploaded_file($_FILES['profileUpload']['tmp_name'], $target_file);
                    $newImgPro = "pottery-ware-" . str_replace(" ", "-", $name_pro) . ".png";
                    rename($target_file, $imgPath . $newImgPro);
                }
                $sqlEditPro = "UPDATE product SET prd_id_cate = '$name_cate', prd_name ='$name_pro', prd_price = '$price_pro', prd_del = '$del', prd_img = '$newImgPro', prd_status = '$status_pro', prd_created_at = '$date_add', prd_description = '$detail_pro' WHERE prd_id = " . $id_pro;
                editDataDB($sqlEditPro);
                $pro = selectAllDataDB("SELECT * FROM product INNER JOIN category ON product.prd_id_cate = category.cate_id WHERE prd_id = '$id_pro' ORDER BY prd_id DESC");
                include_once("./layouts/product/index.php");
            }
            break;
        case 'deletePro':
            if (isset($_GET['idPro'])) {
                $id_pro = $_GET['idPro'];
                $imgPathPro = "../upload/imgProduct/" . $_GET['imgPro'];
                $sql = "DELETE FROM product WHERE prd_id =" . $id_pro;
                deleteDataDB($sql);
                if (file_exists($imgPathPro)) {
                    unlink($imgPathPro);
                }
                $link = $_SERVER['PHP_SELF'];
                echo "<script>
                    window.location = '$link?act=product'
                </script>";
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
            if (isset($_GET['ur_id'])) {
                $ur_id = $_GET['ur_id'];
                deleteUser($ur_id);
                header("location: {$_SERVER['PHP_SELF']}?act=user");
            }
            break;
        case 'infoUser':
            if (isset($_GET['ur_id'])) {
                $ur_id = $_GET['ur_id'];
                $infoUser = getOneUser($ur_id);
                include_once("./layouts/User/infoUser.php");
            }
            break;
            // *BANNER
        case 'banner':
            $banner = getAllBanner();
            include_once("./layouts/Banner/index.php");
            break;
        case 'editBanner':
            if (isset($_POST['editBanner']) && ($_POST['editBanner'])) {
                $bn_title = $_POST['bn_title'];
                $bn_content = $_POST['bn_content'];
                $bn_id = $_POST['bn_id'];
                $bn_img = $_FILES['bn_img']['name'];
                if ($_FILES['bn_img']['name'] == null) {
                    $name_bn_img = $_POST['name_bn_img'];
                } else {
                    $imgPath = "../upload/banner/";
                    $imgPathBanner = "../upload/banner/" . $_POST['name_bn_img'];
                    if (file_exists($imgPathBanner)) {
                        unlink($imgPathBanner);
                    }
                    $target_file = $imgPath . str_replace(" ", "-", basename($bn_img));
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    move_uploaded_file($_FILES['bn_img']['tmp_name'], $target_file);
                    $newImgPro = "pottery-ware-banner-" . str_replace(" ", "-", $bn_title) . ".png";
                    rename($target_file, $imgPath . $newImgPro);
                }
                $sql = "UPDATE banner SET bn_title = '" . $bn_title . "', bn_content = '" . $bn_content . "', bn_img = '" . $newImgPro . "' WHERE bn_id = " . $bn_id;
                editDataDB($sql);
                $backPage = $_SERVER['HTTP_REFERER'];
                echo "<script>
                    location.href = '$backPage'
                </script>";
            }
            break;

        default:

            break;
    }
}
