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
                <span class="info">Đăng Nhập</span>
                <div class="prompt">
                    <!-- <span class="ask">Bạn Chưa Có Tài Khoản?</span> -->
                    <button class="btn signup">Đăng Ký</button>
                </div>
            </div>
            <div class="main">
                <div class="user_field field-2">
                    <form action="../../../model/handleLogin/index.php" id="formLogin" class="_details details-login"
                        method="post">
                        <div class="textbox">
                            <input type="text" id="userName" name="ur_name" required />
                            <span class="input_detail">Tên Tài Khoản Hoặc Email</span>
                        </div>
                        <div class="textbox">
                            <input type="password" id="pass" name="ur_pass" pattern="[A-Za-z0-9!@#$%^&*?`].{6,}"
                                required />
                            <span class="input_detail">Mật Khẩu</span>
                        </div>
                    </form>
                </div>
                <div class="forgetPass">
                    <a href="../ForgotPass/index.php" style="font-size: 18px;">Quên mật khẩu?</a>
                </div>
                <button form="formLogin" id="btnSubmitLogin" class="btn login" type="submit" name="dangnhap"
                    value="dangnhap">
                    Đăng Nhập
                </button>
            </div>
        </div>
        <div class="app back">
            <div class="header">
                <span class="info">Đăng Ký</span>
                <div class="prompt">
                    <!-- <span class="ask">Bạn đã có tài khoản?</span> -->
                    <button class="btn login">Đăng Nhập</button>
                </div>
            </div>
            <div class="main">
                <form id="formSignup" class="user_field rel" action="../../../model/handleSignup/index.php"
                    method="post" enctype="multipart/form-data">
                    <div class="avt">
                        <img class="camera-icon" src="../../image/camera.png" alt="camera" />
                        <img class="avt-img" src="../../image/avatar-user.png" alt="avatar" />
                        <input type="file" id="up_file" name="ur_avatar" accept="image/*" />
                        <small>Chọn Ảnh</small>
                    </div>
                    <div class="_details">
                        <div class="textbox">
                            <input type="text" id="ur_name" name="ur_name" required />
                            <span class="input_detail">Tên Tài Khoản</span>
                        </div>
                        <div class="textbox">
                            <input type="text" id="cus_email" name="cus_email" required />
                            <span class="input_detail">Email</span>
                        </div>
                        <div class="textbox">
                            <input type="password" id="ur_pass" name="ur_pass" pattern="[a-zA-z0-9!@#$%^&*?`].{6,}"
                                required />
                            <span class="input_detail">Mật Khẩu</span>
                        </div>
                        <div class="textbox">
                            <input type="password" id="forgot_pass" name="forgot_pass"
                                pattern="[a-zA-z0-9!@#$%^&*?`].{6,}" required />
                            <span class="input_detail">Nhập lại mật khẩu</span>
                        </div>
                    </div>
                </form>
                <button form="formSignup" id="btnSubmitSignUp" class="btn login" type="submit" name="dangky"
                    value="dangky">
                    Đăng Ký
                </button>
            </div>
        </div>
    </div>
</body>
<script src="../../js/checkForm.js"></script>
<script src="../../js/login.js"></script>

</html>