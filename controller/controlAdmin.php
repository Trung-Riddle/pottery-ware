<?php
require("../model/pdo_model/user.php");
require("../model/pdo_model/posts.php");
if (isset($_GET["act"])) {
    switch ($_GET["act"]) {
        case 'dashboard':
            include_once("./layouts/Dashboard/index.php");
            break;
        case 'order':
            include_once("./layouts/order/index.php");
            break;
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
        case 'comment':
            include_once("./layouts/comment/index.php");
            break;
        case 'category':
            include_once("./layouts/category/index.php");
            break;
        case 'product':
            include_once("./layouts/product/index.php");
            break;
        case 'charts':
            include_once("./layouts/charts/index.php");
            break;
        case 'sendmail':
            include_once("./layouts/sendmail/index.php");
            break;
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
