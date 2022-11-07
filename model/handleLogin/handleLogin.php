<link rel="stylesheet" href="../asset/styles/login.css" />
<?php
include_once "./pdo_model/user.php";
if (isset($_GET["act"])) {
    switch ($_GET["act"]) {
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user_name = $_POST['user_name'];
                $password = $_POST['password'];
                $checkUser = checkuser($user_name, $password);
                if (is_array($checkUser)) {
                    $_SESSION['user_name'] = $checkUser;
                    // header("location: {$_SERVER['PHP_SELF']}?act=dangnhap");
                    echo "<script type='text/javascript'>alert('Đăng nhập thành công');</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Tài khoản không tồn tại');</script>";
                }
            }
            include "../view/layouts/Home/index.php";
            break;
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $user_name = $_POST['user_name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $phone_number = $_POST['phone_number'];
                $avatar = $_FILES['avatar']['name'];
                $imgPath = "../upload/avatar/";
                $target_file = $imgPath . str_replace(" ", "-", basename($avatar));
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
                $newAva = "pottery-ware-" . str_replace(" ", "-", $user_name) . ".png";
                rename($target_file, $imgPath . $newAva);
                $checkUser = checkuser($user_name, $password);
                if (strlen($password) < 8) {
                    echo "<script type='text/javascript'>alert('Mật khẩu phải trên 8 ký tự');</script>";
                } else {
                    addUser($user_name, $password, $avatar, $email, $phone_number);
                    header("location: {$_SERVER['PHP_SELF']}?act=dangnhap");
                }
            }
            break;
        default:
            # code...
            break;
    }
}
