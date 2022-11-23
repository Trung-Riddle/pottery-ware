<?php
    if(isset($_POST['submitLogin']) && ($_POST['submitLogin'])){
        require_once("../pdo_model/connect_db.php");
        require_once("../pdo_model/globle.php");
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        echo $userName;
        echo $password;
        $admin = countDataDB("SELECT count(*) FROM user WHERE ur_name = '$userName' and ur_pass = '$password'");
        if($admin != 0){
            setcookie("acc_allow", sha1("allowacc"), time() + 86400, "/");
            header("location: ../../admin/index.php?act=dashboard");
        }else{
            $backLogin = $_SERVER['HTTP_REFERER'];
            echo "<script> window.location = '$backLogin' </script>";
        }
    }
?>