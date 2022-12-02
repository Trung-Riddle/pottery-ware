<?php
if(isset($_POST['submitForm']) && ($_POST['submitForm'])){
    require_once("../sendMail.php");
    require_once("../pdo_model/connect_db.php");
    require_once("../pdo_model/globle.php");

    if(isset($_POST['ur_email'])) {
        $email = $_POST['ur_email'];
        $checkEmail = countDataDB("SELECT count(*) FROM user INNER JOIN customer ON user.ur_id = customer.cus_id_user WHERE cus_email = '$email'");

        if($checkEmail == 1){
            $user = selectOneDataDB("SELECT * FROM user INNER JOIN customer ON user.ur_id = customer.cus_id_user WHERE cus_email = '$email'");
            $ur_id = $user[0]['ur_id'];
            $code = mt_rand(1000, 9999).$ur_id;
            setcookie('codepass', $code, time() + 600, '/');
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

            $title = "Confirm forgot password";
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
                Pottery Ware xin gửi mã xác nhận thông tin tài khoản của quý khách như sau:
                <br /><br />
                <b>Mã xác nhận: </b>$code<br /><br />
                Vui lòng không tiết lộ thư này cho bất cứ ai để tránh rủi ro đến tài khoản của khách hàng.<br />
                Xin cảm ơn.<br  /><br />
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
                    margin: 0 auto;
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

            signUp($title, $content, $email, $user[0]['cus_name']);
            header("location: ".$_SERVER['HTTP_REFERER']);
        }else{
            $backPage = $_SERVER['HTTP_REFERER'];
            echo "<script>
                alert('Email không tồn tại')
                setTimeout(()=>{
                    window.location = '$backPage'
                }, 100)
            </script>";
        }
    }
    if(isset($_POST['ur_code']) && isset($_COOKIE['codepass'])){
        $new_pass = $_POST['ur_pass'];
        $confirm_pass = $_POST['ur_confirm_pass'];
        $code = $_POST['ur_code'];
        if(($code == $_COOKIE['codepass']) && ($new_pass == $confirm_pass)){
            $ur_id = substr($code, 4);
            // echo $ur_id;
            editDataDB("UPDATE user SET ur_pass = '$confirm_pass' WHERE ur_id = '$ur_id'");
            setcookie("codepass", "", time() - 1000, '/');
            echo "<script>
                alert('Đổi mật khẩu thành công');
                window.location.href = '../../view/layouts/Login/index.php'
            </script>";
        }else{
            echo "<script>
                alert('Mã xác nhận hoặc mật khẩu không chính xác');
            </script>";
        }
    }
}else{
    header("location: ../../view/layouts/Login/index.php");
}
?>