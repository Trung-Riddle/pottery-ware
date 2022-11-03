<div class="infoUser">
    <?php foreach ($infoUser as $User) { ?>
        <?php
        if ($User['status_user'] == 0) {
            $status_user = "<p style = 'color : rgb(44, 248, 44);'>Hoạt động</p>";
        } else {
            $status_user = "<p style = 'color : red;'>Không hoạt động</p>";
        }
        ?>
        <div class="avatarUser">
            <img src="./.././upload/avatar/<?= $User['avatar'] ?>" alt="avatar">
        </div>
        <div class="infomationUser">
            <h1><?= $User['user_name'] ?></h1>
            <div class="box">
                <label for="">Trạng thái: </label><?= $status_user ?>
            </div>
            <div class="box">
                <label for="">Email: </label><?= $User['email'] ?>
            </div>
            <div class="box">
                <label for="">Password: </label>
                <input id="pass" type="password" value="<?= $User['password'] ?>" disabled>
                <ion-icon name="eye-outline" onclick="hideShow()"></ion-icon>
            </div>
            <div class="box">
                <label for="">Số điện thoại: </label><?= $User['phone_number'] ?>
            </div>
            <div class="box">
                <a href="<?= $_SERVER["PHP_SELF"] ?>?act=user">Trở về</a>
                <a href="<?= $_SERVER['PHP_SELF'] . "?act=deleteUser&id=" . $User['id'] ?>">Xóa</a>
            </div>
        </div>
    <?php } ?>
</div>