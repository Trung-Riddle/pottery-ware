<?php
session_start();
include_once "../pdo_model/user.php";
include_once "../pdo_model/globle.php";
if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
    $ur_name = $_POST['ur_name'];
    $ur_pass = $_POST['ur_pass'];
    $checkUser = checkuser($ur_name, $ur_pass);
    if ($checkUser != 0) {
        $account = selectAllDataDB("SELECT * FROM user INNER JOIN customer ON user.ur_id = customer.cus_id_user WHERE ur_name = '$ur_name' AND ur_pass = '$ur_pass'");
        $idUser = $account[0]['ur_id'];
        setcookie('ur_id',$idUser, time() + 86400, '/pottery-ware');
        header("location: ../../index.php");
    } else {
        header("location: ../../view/layouts/Login/index.php?login=FaildLogin");
    }
}
?>
<script>

</script>