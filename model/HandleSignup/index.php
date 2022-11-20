<?php
include_once "../pdo_model/user.php";
include_once "../pdo_model/globle.php";
include_once "../sendMail.php";
if (isset($_POST['dangky']) && ($_POST['dangky'])) {
    $ur_name = $_POST['ur_name'];
    $cus_email = $_POST['cus_email'];
    $ur_pass = $_POST['ur_pass'];
    $forgot_pass = $_POST['forgot_pass'];
    $ur_avatar = $_FILES['ur_avatar']['name'];
    if($ur_avatar != null){
        $imgPath = "../../upload/avatar/";
        $target_file = $imgPath . str_replace(" ", "-", basename($ur_avatar));
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        move_uploaded_file($_FILES['ur_avatar']['tmp_name'], $target_file);
        $newAva = "pottery-ware-" . str_replace(" ", "-", $ur_name) . ".png";
        rename($target_file, $imgPath . $newAva);
    }
    // $checkUser = checkuser($ur_name, $ur_pass);
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
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
                $url = "https://";   
            } 
            else{
                $url = "http://";   
            }
            // Append the host(domain name, ip) to the URL.   
            $url.= $_SERVER['HTTP_HOST'];   
            
            // Append the requested resource location to the URL   
            $url.= $_SERVER['REQUEST_URI'];    
            
            $title = "Pettery Ware - Create Account Success";

            $content = "
            <p
                style='
                background-color: #edb2a0;
                color: white;
                display: block;
                padding: 30px 0;
                font-size: 28px;
                font-weight: bold;
                text-align: center;
                '
            >
                Pottery Ware
            </p>
            <p style='display: block; width: max-content; margin: 0 auto'>
                Cảm ơn Quý khách đã sử dụng dịch vụ của Pottery Ware. <br />
                Pottery Ware xin gửi thông tin tài khoản của quý khách như sau:
                <br /><br />
                <b>Tài khoản đăng nhập: </b>$ur_name<br />
                <b>Email đã đăng ký: </b>$cus_email<br />
                <b>Tình trạng: </b> Thành công <br /><br />
                <a
                href='$url'
                style='
                    padding: 1rem 2rem;
                    background-color: #edb2a0;
                    border-radius: 10px;
                    text-decoration: none;
                    color: white;
                    font-size: 18px;
                    font-weight: bold;
                    display: block;
                    width: max-content;
                '
                >Đăng nhập</a
                >
            </p>
            <p
                style='
                background-color: #edb2a0;
                color: white;
                display: block;
                padding: 30px 0;
                font-size: 28px;
                font-weight: bold;
                text-align: center;
                '
            >
                Xin trân thành cảm ơn.
            </p>
            ";
            
            $email = $cus_email;
            $user_name = $ur_name;
            signUp($title, $content, $email, $user_name);
            addUser($ur_name, $ur_pass, $newAva);
            $sql = "SELECT ur_id FROM user WHERE ur_name = '$ur_name' AND ur_pass = '$ur_pass'";
            $idUser = null;
            $user = selectAllDataDB($sql);
            foreach($user as $value){
                $idUser = $value['ur_id'];
            }
            $addIdUser = "INSERT INTO customer (cus_id_user, cus_email) VALUES ('$idUser', '$cus_email')";
            addDataDB($addIdUser);
            header("location: {$_SERVER['HTTP_REFERER']}");
        }
    }
}else{
    header("location: ../../view/layouts/Login/index.php");
}