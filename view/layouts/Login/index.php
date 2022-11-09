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
                <span class="info">Đăng Nhập</span>
                <div class="prompt">
                    <!-- <span class="ask">Bạn Chưa Có Tài Khoản?</span> -->
                    <button class="btn signup">Đăng Ký</button>
                </div>
            </div>
            <div class="main">
                <div class="user_field field-2">
                    <form action="../../../model/handleLogin/index.php" id="formLogin" class="_details details-login" method="post">
                        <div class="textbox">
                            <input type="text" name="user_name" required />
                            <span class="input_detail">Tên Tài Khoản Hoặc Email</span>
                        </div>
                        <div class="textbox">
                            <input type="password" name="password" required />
                            <span class="input_detail">Mật Khẩu</span>
                        </div>
                    </form>
                </div>
                <button form="formLogin" class="btn login" type="submit" name="dangnhap" value="dangnhap">
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
                <form id="formSignup" class="user_field rel" action="../../../model/handleSignup/index.php" method="post" enctype="multipart/form-data">
                    <div class="avt">
                        <img class="camera-icon" src="../../image/camera.png" alt="camera" />
                        <img class="avt-img" src="../../image/avatar-user.png" alt="avatar" />
                        <input type="file" id="up_file" name="avatar" accept="image/*" />
                        <small>Chọn Ảnh</small>
                    </div>
                    <div class="_details">
                        <div class="textbox">
                            <input type="text" name="user_name" required />
                            <span class="input_detail">Tên Tài Khoản</span>
                        </div>
                        <div class="textbox">
                            <input type="text" name="email" required />
                            <span class="input_detail">Email</span>
                        </div>
                        <div class="textbox">
                            <input type="text" name="phone_number" required />
                            <span class="input_detail">Số điện thoại</span>
                        </div>
                        <div class="textbox">
                            <input type="password" name="password" required />
                            <span class="input_detail">Mật Khẩu</span>
                        </div>
                    </div>
                </form>
                <button form="formSignup" class="btn login" type="submit" name="dangky" value="dangky">
                    Đăng Ký
                </button>
            </div>
        </div>
    </div>
</body>
<script src="../../js/login.js"></script>
<?php
if (isset($_GET['error']) && ($_GET['error'] == "faildSignup")) {
    echo "<script type='text/javascript'>alert('Tài khoản đã tồn tại');</script>";
} else if (isset($_GET['login']) && ($_GET['login'] == "FaildLogin")) {
    echo "<script type='text/javascript'>alert('Tài khoản không chính xác');</script>";
}
?>

</html>