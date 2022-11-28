<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tài Khoản pottery-ware</title>
    <link rel="stylesheet" href="../../styles/login.css" />
    <link rel="stylesheet" href="../../styles/base.css" />
</head>

<body>
    <div class="container">
        <div class="app front">
            <div class="header">
                <span class="info">Quên mật khẩu</span>
            </div>
            <div class="main">
                <div class="user_field field-2">
                    <form action="../../../model/HandleForgotPass/index.php" id="formForgot"
                        class="_details details-login" method="post">
                        <?php if(isset($_COOKIE['codepass']) && ($_COOKIE['codepass'] != "")) { ?>
                        <div class="textbox">
                            <input type="password" name="ur_pass" pattern="[a-zA-z0-9!@#$%^&*?`]" required />
                            <span class="input_detail">Mật khẩu mới</span>
                        </div>
                        <div class="textbox">
                            <input type="password" name="ur_confirm_pass" pattern="[a-zA-z0-9!@#$%^&*?`]" required />
                            <span class="input_detail">Nhập lại mật khẩu</span>
                        </div>
                        <div class="textbox">
                            <input type="text" name="ur_code" required />
                            <span class="input_detail">Mã xác nhận</span>
                        </div>
                        <?php } else { ?>
                        <div class="textbox">
                            <input type="text" name="ur_email" required />
                            <span class="input_detail">Email xác nhận tài khoản</span>
                        </div>
                        <?php } ?>
                    </form>
                </div>
                <div class="forgetPass" style="
                        text-decoration: underline;
                        position: absolute;
                        bottom: 1.5rem;
                        left: 1.2rem;
                    ">
                    <a href="../Login/index.php" style="font-size: 18px;">Đăng nhập</a>
                </div>
                <button form="formForgot" class="btn login" type="submit" name="submitForm" value="submitForm">
                    Gửi
                </button>
            </div>
        </div>
    </div>
</body>
<script src="../../js/login.js"></script>

</html>