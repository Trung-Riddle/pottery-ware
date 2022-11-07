<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tài Khoản pottery-ware</title>
    <link rel="stylesheet" href="../../../asset/styles/login.css" />
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
                    <form action="../../../model/handleLogin.php?act=dangnhap" id="formLogin" class="_details details-login" method="post">
                        <div class="textbox">
                            <input type="text" required name="user_name" />
                            <span class="input_detail">Tên Tài Khoản Hoặc Email</span>
                        </div>
                        <div class="textbox">
                            <input type="password" required name="password" />
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
                <form id="formSignup" class="user_field rel" action="../../../model/handleLogin.php?act=dangky" method="post" enctype="multipart/form-data">
                    <div class="avt">
                        <img class="camera-icon" src="../../../asset/image/camera.png" alt="camera" />
                        <img class="avt-img" src="../../../asset/image/user.png" alt="avatar" />
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

    <script src="./login.js"></script>
</body>

</html>