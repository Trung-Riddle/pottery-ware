<?php
include_once "../pdo_model/user.php";
include_once "../pdo_model/globle.php";
if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $checkUser = checkuser($user_name, $password);
    if ($checkUser != 0) {
        // echo "<script type='text/javascript'>alert('Đăng nhập thành công');</script>";
        header("location: ../../index.php?login=AccessLogin");
    } else {
        // echo "<script type='text/javascript'>alert('Tài khoản không tồn tại');</script>";
        header("location: ../../view/layouts/Login/index.php?login=FaildLogin");
    }
    // header("Location: " . $_SERVER['HTTP_REFERER']);
}
