<?php
if (isset($_GET["page"])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'introduce':
            include_once("./view/layouts/Introduce/index.php");
            break;
        case 'contacts':
            include_once("./view/layouts/Contacts/index.php");
            break;
        case 'contacts_success':
            if ((isset($_POST["contacts_success"])) && ($_POST["contacts_success"])) {
                $title = $_POST['title'];
                $user_name = $_POST['user_name'];
                $email = $_POST['email'];
                $content = $_POST['content'];
                sendMail($title, $content, $email, $user_name);
                $backPage = $_SERVER['HTTP_REFERER'];
                echo "<script>
                            location.href = '$backPage'
                        </script>";
            }
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
                            S???n ph???m kh??ng t???n t???i
                            <a href='{$_SERVER['PHP_SELF']}?page=product' style='display: block; text-decoration: underline !important; font-size: 18px;'>Quay l???i trang s???n ph???m</a>
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
            include_once("./view/layouts/News/index.php");
            break;
        case 'detailpost':
            if (isset($_GET['pts_id'])) {
                $pts_id = $_GET['pts_id'];
                $pts_view = $_GET['pts_view'];
                $pts_view++;
                editDataDB("UPDATE posts SET pts_view =  '$pts_view' WHERE pts_id = '$pts_id'");
                $detailpost = selectOneDataDB("SELECT * FROM posts WHERE pts_id=" . $pts_id);
                include_once("./view/layouts/News/DelitalPosts.php");
            }
            break;
        case 'comment':
            if ((isset($_POST["submitCmt"])) && ($_POST["submitCmt"])) {
                $cmt_id_user = substr($_POST["idUser"], 4);
                $cmt_id_pro = $_POST["idPro"];
                $cmt_content = $_POST["cmtContent"];
                $cmt_created_at = date("Y-m-d");
                $backPage = $_POST["backPage"];
                $sql = "INSERT INTO comment (cmt_id_user, cmt_id_pro, cmt_content, cmt_created_at) VALUES ($cmt_id_user, '$cmt_id_pro', '$cmt_content', '$cmt_created_at')";
                addDataDB($sql);
                echo "<script>
                    window.history.go(-1);
                    </script>";
            }
            break;
        case 'addCart':
            // unset($_SESSION['carts']);
            if (isset($_SESSION['carts']) && isset($_COOKIE['prd_id'])) {
                $prd_id = $_COOKIE['prd_id'];
                $prd_amount = json_decode($_COOKIE['prd_amount']);
                $sql = "SELECT * FROM product WHERE prd_id = " . $prd_id;
                $prd = selectAllDataDB($sql);
                $index = 0;
                $checkCart = false;

                //* l???y t???t c??? th??ng tin c???a s???n ph???m ??c th??m v??o gi??? h??ng
                foreach ($prd as $value) {

                    //* Ki???m tra xem trong gi??? h??ng c?? s???n ph???m b??? tr??ng v???i s???n ph???m v???a m???i th??m kh??ng
                    foreach ($_SESSION['carts'] as $item) {
                        if ($item[0] == $prd_id) {
                            $item[4] += $prd_amount;
                            $_SESSION['carts'][$index][4] = $item[4];
                            $checkCart = true;
                            break;
                        }
                        $index++;
                    }

                    //* N???u ko c?? s???n ph???m tr??ng th?? th??m m???i s???n ph???m v??o gi??? h??ng
                    if ($checkCart == false) {
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

                //* ki???m tra n???u c??n t???n t???i cookie c???a s???n ph???m th?? x??a
                echo "
                    <script>
                        document.cookie = 'prd_id=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                        document.cookie = 'prd_amount=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                    </script>";
                if (isset($_GET['link']) && ($_GET['link'] == "back")) {
                    $backPage = $_SERVER['HTTP_REFERER'];
                    echo "<script>
                        location.href = '$backPage'
                    </script>";
                }
            }
            require_once("./view/layouts/Cart/index.php");
            break;

            //* X??a 1 s???n ph???m trong gi??? h??ng
        case 'delOneRowCart':
            if ((isset($_GET['c_id']))) {
                $c_id = $_GET['c_id'];
                array_splice($_SESSION['carts'], $c_id, 1);
                if (count($_SESSION['carts']) > 0) {
                    echo "<script> window.location = '" . $_SERVER['HTTP_REFERER'] . "' </script>";
                } else {
                    echo "<script> window.location = '" . $_SERVER['PHP_SELF'] . "?page=product' </script>";
                }
                break;
            }
            //* Th??ng tin kh??ch h??ng
        case 'profile':
            if ($ur_role == 0) {
                $role = "Kh??ch h??ng";
            } else if ($ur_role == 1) {
                $role = "Nh??n vi??n";
            } else if ($ur_role == 2) {
                $role = "Admin";
            }
            require_once("./view/layouts/Profile/index.php");
            break;
        case 'editProfile':
            if (isset($_POST['updateProfile']) && ($_POST['updateProfile'])) {
                $ur_name = $_POST['ur_name'];
                $cus_email = $_POST['cus_email'];
                $cus_address = $_POST['cus_address'];
                $cus_name = $_POST['cus_name'];
                $cus_phone = $_POST['cus_phone'];

                $sql = "UPDATE user INNER JOIN customer ON user.ur_id = customer.cus_id_user SET ur_name = '$ur_name', cus_email = '$cus_email', cus_address = '$cus_address', cus_name = '$cus_name', cus_phone = '$cus_phone' WHERE ur_id = '$ur_id'";
                editDataDB($sql);
                $backPage = $_SERVER['HTTP_REFERER'];
                echo "<script>
                        window.location = '$backPage'
                    </script>";
            }
            break;
        case 'handleChangePass':
            if (isset($_POST['changePass']) && ($_POST['changePass'])) {
                $oldPass = $_POST['ur_pass'];
                $checkPassUser = countDataDB("SELECT count(*) FROM user WHERE ur_id = '$ur_id' AND ur_pass = '$oldPass'");
                if ($checkPassUser == 1) {
                    $newPass = $_POST['new_pass'];
                    $confirmNewPass = $_POST['confirm_new_pass'];
                    if ($newPass == $confirmNewPass) {
                        editDataDB("UPDATE user SET ur_pass = '$confirmNewPass' WHERE ur_id = '$ur_id' AND ur_pass = '$oldPass'");
                        $backPage = $_SERVER['PHP_SELF'] . "?page=profile";
                        echo "<script>
                                window.location = '$backPage'
                            </script>";
                    }
                }
            }
            break;
        case 'detailPayment':
            $ur_id = substr($_COOKIE['ur_id'], 4);
            $user = selectOneDataDB("SELECT * FROM user INNER JOIN customer ON user.ur_id = customer.cus_id_user WHERE ur_id = $ur_id");
            foreach ($user as $value) {
                extract($value);
            }
            require_once("./view/layouts/DetailPayment/index.php");
            break;
        case 'order':
            if (isset($_GET['code']) && isset($_COOKIE['ur_id'])) {
                require_once("./view/layouts/ConfirmPayment/index.php");
            }
            break;

        case 'managerOrder':
            //* get id customer by id user
            function getId()
            {
                $ur_id = substr($_COOKIE['ur_id'], 4);
                $customer = selectAllDataDB(
                    "SELECT cus_id FROM customer
                     INNER JOIN user ON customer.cus_id_user = user.ur_id
                     WHERE ur_id = '$ur_id'"
                );
                foreach ($customer as $value) {
                    extract($value);
                }
                return $cus_id;
            }

            //* l???y t???t c??? th??ng tin ????n h??ng theo kh??ch h??ng v?? tr???ng th??i ????n h??ng
            function listOrderUser($status)
            {
                $cus_id = getId();
                $listOrderUser = selectAllDataDB(
                    "SELECT * FROM `order`
                     INNER JOIN customer
                     ON `order`.ord_id_customer = customer.cus_id
                     WHERE cus_id = '$cus_id'
                     AND ord_status = '$status'
                     ORDER BY ord_id DESC"
                );
                return $listOrderUser;
            }

            //* l???y th??ng tin t???t c??? s???n ph???m ???? mua c???a user
            function listCartOrderUser($ord_id)
            {
                $selectCartOrderUser = selectAllDataDB(
                    "SELECT * FROM cart
                     INNER JOIN product
                     ON cart.c_id_pro = product.prd_id
                    WHERE c_id_order = '$ord_id'"
                );
                return $selectCartOrderUser;
            };

            require_once("./view/layouts/ManagerOrder/index.php");
            break;

        case 'deleteCartOrderUser':
            if (isset($_GET['idOrder']) && ($_GET['idOrder'] != null)) {
                $ord_id = $_GET['idOrder'];
                deleteDataDB("DELETE FROM `order` WHERE ord_id = '$ord_id'");
                $backPage = $_SERVER['HTTP_REFERER'];
                echo "<script>
                        location.href = '$backPage'
                    </script>";
            }
            break;
        default:
            # code...
            break;
    }
} else {
    $banner = getAllBanner();
    include_once("./view/layouts/Banner/index.php");
    include_once("./view/layouts/MainHome/index.php");
}
