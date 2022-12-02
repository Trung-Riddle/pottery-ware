<?php
if(isset($_POST['submitForm']) && ($_POST['submitForm'])){
    require_once("../sendMail.php");
    require_once("../pdo_model/connect_db.php");
    require_once("../pdo_model/globle.php");

    $email = $_POST['ur_email'];
    $checkEmail = countDataDB("SELECT count(*) FROM user INNER JOIN customer ON user.ur_id = customer.cus_id_user WHERE cus_email = '$email'");

    if($checkEmail == 1){

    $user = selectOneDataDB("SELECT * FROM user INNER JOIN customer ON user.ur_id = customer.cus_id_user WHERE cus_email = '$email'");
    $newPass = mt_rand(100000, 999999);
    editDataDB("UPDATE user INNER JOIN customer ON user.ur_id = customer.cus_id_user SET ur_pass = '$newPass' WHERE cus_email = '$email'");
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
        Pottery Ware xin gửi thông tin tài khoản của quý khách như sau:
        <br /><br />
        <b>Tên khách hàng: </b>".$user[0]['cus_name']."<br />
        <b>Tài khoản đăng nhập: </b>".$user[0]['ur_name']."<br />
        <b>Mật khẩu mới: </b>$newPass<br /><br />
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
}else{
    header("location: ../../view/layouts/Login/index.php");
}
?>