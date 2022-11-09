<?php
include_once "../pdo_model/user.php";
include_once "../pdo_model/globle.php";
if (isset($_POST['dangky']) && ($_POST['dangky'])) {
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $avatar = $_FILES['avatar']['name'];
    $imgPath = "../../upload/avatar/";
    $target_file = $imgPath . str_replace(" ", "-", basename($avatar));
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
    $newAva = "pottery-ware-" . str_replace(" ", "-", $user_name) . ".png";
    rename($target_file, $imgPath . $newAva);
    $checkUser = checkuser($user_name, $password);
    $checkUser2 = countDataDB("SELECT count(*) FROM user WHERE user_name = '$user_name'");
    if ($checkUser2 != 0) {
        header("location: ../../view/layouts/login/index.php?error=faildSignup");
    } else {
        if (strlen($password) < 8) {
            echo "<script type='text/javascript'>alert('Mật khẩu phải trên 8 ký tự');</script>";
        } else {
            addUser($user_name, $password, $newAva, $email, $phone_number);
            header("location: {$_SERVER['HTTP_REFERER']}");
        }
    }
}
