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
    <div class="loading">
        <img src="../../../asset/svg/pottery-1.1s-200px.svg" alt="">
        <h3>Loading...</h3>
    </div>
    <div class="filterError">
        <div class="boxError">
            <div class="textError">
            </div>
            <a href="" id="backError">Quay lại</a>
        </div>
    </div>
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
                            <input type="password" id="ur_pass" name="ur_pass" pattern="[a-zA-z0-9!@#$%^&*?`].{6,}"
                                required />
                            <span class="input_detail">Mật khẩu mới</span>
                        </div>
                        <div class="textbox">
                            <input type="password" id="forgot_pass" name="ur_confirm_pass"
                                pattern="[a-zA-z0-9!@#$%^&*?`].{6,}" required />
                            <span class="input_detail">Nhập lại mật khẩu</span>
                        </div>
                        <div class="textbox">
                            <input type="text" id="code" name="ur_code" required />
                            <span class="input_detail">Mã xác nhận</span>
                        </div>
                        <?php } else { ?>
                        <div class="textbox">
                            <input type="text" id="cus_email" name="ur_email" required />
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
                    <a href="../Login/index.php" style="font-size: 18px;" onclick="removeCookie(event)">Đăng nhập</a>
                    <script>
                    function removeCookie(event) {
                        event.preventDefault()
                        document.cookie = "codepass=; max-age=-86400; path=/;"
                        location.href = "../Login/index.php"
                    }
                    </script>
                </div>
                <button form="formForgot" id="submitForm" class="btn login" type="submit" name="submitForm"
                    value="submitForm">
                    Gửi
                </button>
            </div>
        </div>
    </div>
</body>
<script src="../../js/checkForm.js"></script>
<!-- <script src="../../js/login.js"></script> -->

</html>