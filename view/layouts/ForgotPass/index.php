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
                        <div class="textbox">
                            <input type="text" name="ur_email" required />
                            <span class="input_detail">Email xác nhận tài khoản</span>
                        </div>
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