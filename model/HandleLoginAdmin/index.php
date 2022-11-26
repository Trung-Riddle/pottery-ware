<?php
    if(isset($_POST['submitLogin']) && ($_POST['submitLogin'])){
        require_once("../pdo_model/connect_db.php");
        require_once("../pdo_model/globle.php");
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        echo $userName;
        echo $password;
        $admin = countDataDB("SELECT count(*) FROM user WHERE ur_name = '$userName' and ur_pass = '$password' and ur_role = 2");
        if($admin != 0){
            setcookie("acc_allow", sha1("allowacc"), time() + 43200, "/");
            // echo "<script>
            //     document.cookie = 'acc_allow='".sha1('allowacc')."; max-age=43200; path=/;'
            // </script>";
            header("location: ../../admin/index.php?act=dashboard");
        }else{
            $backLogin = $_SERVER['HTTP_REFERER'];
            echo "<script> window.location = '$backLogin' </script>";
        }
    }
?>