<?php
include_once "../pdo_model/user.php";
include_once "../pdo_model/globle.php";
if (isset($_POST['dangky']) && ($_POST['dangky'])) {
    $ur_name = $_POST['ur_name'];
    $ur_pass = $_POST['ur_pass'];
    $forgot_pass = $_POST['forgot_pass'];
    $ur_avatar = $_FILES['ur_avatar']['name'];
    $imgPath = "../../upload/avatar/";
    $target_file = $imgPath . str_replace(" ", "-", basename($ur_avatar));
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    move_uploaded_file($_FILES['ur_avatar']['tmp_name'], $target_file);
    $newAva = "pottery-ware-" . str_replace(" ", "-", $ur_name) . ".png";
    rename($target_file, $imgPath . $newAva);
    $checkUser = checkuser($ur_name, $ur_pass);
    $checkUser2 = countDataDB("SELECT count(*) FROM user WHERE ur_name = '$ur_name'");
    if ($checkUser2 != 0) {
        header("location: ../../view/layouts/login/index.php?error=faildSignup");
    } else {
        if (strlen($ur_pass) < 8) {
            header("location: ../../view/layouts/login/index.php?error=faildPass");
            // echo "<script type='text/javascript'>alert('Mật khẩu phải trên 8 ký tự');</script>";
            // header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else if ($forgot_pass != $ur_pass) {
            header("location: ../../view/layouts/login/index.php?error=faildForgot");
        } else {
            addUser($ur_name, $ur_pass, $newAva);
            header("location: {$_SERVER['HTTP_REFERER']}");
        }
    }
}
