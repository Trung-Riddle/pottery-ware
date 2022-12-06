<div class="profile-cover"></div>

<div class="profile-content">
    <img src="./upload/avatar/<?= $ur_avatar ?>" alt="" />
    <small><?= $ur_name ?></small>
    <p>Hãy cập nhật đầy đủ thông tin để tiện cho việc giao hàng của bạn !</p>
</div>

<?php if(isset($_GET['hd']) && ($_GET['hd'] === "changePassword")) {?>
<form class="profile-form" style="grid-template-columns: auto; max-width: 400px;"
    action="<?= $_SERVER['PHP_SELF'] ?>?page=handleChangePass" method="post">
    <div class="form-group-p">
        <label class="label-name-p">Mật khẩu cũ <span>*</span></label>
        <input type="password" id="old_pass" name="ur_pass" />
    </div>
    <div class="form-group-p">
        <label class="label-name-p">Mật khẩu mới <span>*</span></label>
        <input type="password" id="new_pass" name="new_pass" />
    </div>
    <div class="form-group-p">
        <label class="label-name-p">Xác nhận mật khẩu mới <span>*</span></label>
        <input type="password" id="confirm_new_pass" name="confirm_new_pass" />
    </div>
    <div class="">
        <input type="submit" id="changePass" style="margin: 0 auto;" class="seemore-input" name="changePass"
            value="Cập nhật" />
    </div>
    <div class="">
        <a href="<?= $_SERVER['PHP_SELF'] ?>?page=profile" class="seemore">Trở lại</a>
    </div>
</form>
<?php } else { ?>
<form class="profile-form" action="<?= $_SERVER['PHP_SELF'] ?>?page=editProfile" method="post">
    <div class="form-group-p">
        <label class="label-name-p">Tên người dùng <span>*</span></label>
        <input type="text" name="ur_name" value="<?= $ur_name ?>" />
    </div>
    <div class="form-group-p">
        <label class="label-name-p">Email</label>
        <input type="text" name="cus_email" value="<?= $cus_email ?>" />
    </div>
    <div class="form-group-p">
        <label class="label-name-p">Địa chỉ <span>*</span></label>
        <input type="text" name="cus_address" value="<?= $cus_address ?>" />
    </div>
    <div class="form-group-p">
        <label class="label-name-p">Họ và tên </label>
        <input type="text" name="cus_name" value="<?= $cus_name ?>" />
    </div>
    <div class="form-group-p">
        <label class="label-name-p">Vai trò </label>
        <input type="text" name="ur_role" value="<?= $role ?>" disabled />
    </div>
    <div class="form-group-p">
        <label class="label-name-p">Số điện thoại <span>*</span></label>
        <input type="tel" name="cus_phone" value="<?= $cus_phone ?>" />
    </div>
    <div class="">
        <input type="submit" class="seemore-input" name="updateProfile" value="Cập nhật" />
    </div>
    <div class="">
        <a href="<?= $_SERVER['PHP_SELF'] ?>?page=profile&hd=changePassword" class="seemore">Đổi mật khẩu</a>
    </div>
</form>
<?php } ?>