<?php
session_start();
include_once "../pdo_model/user.php";
include_once "../pdo_model/globle.php";
if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
    $ur_name = $_POST['ur_name'];
    $ur_pass = $_POST['ur_pass'];
    $checkUser = checkuser($ur_name, $ur_pass);
    if ($checkUser != 0) {
        $acount = selectAllDataDB("SELECT * FROM user INNER JOIN customer WHERE ur_name = '$ur_name' AND ur_pass = '$ur_pass'");
        $idUser = $acount[0]['ur_id'];
        $_SESSION['userName'] = $acount[0]['ur_name'];
        header("location: ../../index.php?ur='$idUser'&urN=".$_SESSION['userName']);
    } else {
        header("location: ../../view/layouts/Login/index.php?login=FaildLogin");
    }
}