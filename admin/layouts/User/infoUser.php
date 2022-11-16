<div class="infoUser">
    <?php foreach ($infoUser as $User) { ?>
        <?php
        if ($User['ur_status'] == 0) {
            $ur_status = "<p style = 'color : rgb(44, 248, 44);'>Không hoạt động</p>";
        } else {
            $ur_status = "<p style = 'color : red;'>Hoạt động</p>";
        }
        if ($User['ur_role'] == 0) {
            $ur_role = "<p style = 'color : rgb(44, 248, 44);'>Người dùng</p>";
        } else {
            $ur_role = "<p style = 'color : red;'>Quản trị</p>";
        }
        ?>
        <div class="avatarUser">
            <img src="./.././upload/avatar/<?= $User['ur_avatar'] ?>" alt="avatar">
        </div>
        <div class="infomationUser">
            <h1><?= $User['ur_name'] ?></h1>
            <div class="box">
                <label for="">Trạng thái: </label><?= $ur_status ?>
            </div>
            <div class="box">
                <label for="">Vai trò: </label><?= $ur_role ?>
            </div>
            <div class="box">
                <label for="">Password: </label>
                <input id="pass" type="password" value="<?= $User['ur_pass'] ?>" disabled>
                <ion-icon name="eye-outline" onclick="hideShow()"></ion-icon>
            </div>
            <div class="box">
                <!-- <label for="">Số điện thoại: </label><?= $User['phone_number'] ?> -->
            </div>
            <div class="box">
                <a href="<?= $_SERVER["PHP_SELF"] ?>?act=user">Trở về</a>
                <a href="<?= $_SERVER['PHP_SELF'] . "?act=deleteUser&id=" . $User['ur_id'] ?>">Xóa</a>
            </div>
        </div>
    <?php } ?>
</div>