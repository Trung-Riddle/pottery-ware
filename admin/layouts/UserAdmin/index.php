<div class="containerUser table">
    <span>
        <?php
        echo "Số lượng tài khoản: " . $countUser;
        ?>
    </span>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Avatar</th>
                <th>Trạng thái</th>
                <th>Vai trò</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <?php foreach ($listUser as $User) { ?>
            <?php
            if ($User['ur_status'] == 0) {
                $ur_status = "<p style = 'color : rgb(44, 248, 44);'>Không hoạt động</p>";
            } else {
                $ur_status = "<p style = 'color : red;'>Hoạt động</p>";
            }
            if ($User['ur_role'] == 0) {
                $ur_role = "<p style = 'color : rgb(44, 248, 44);'>Người dùng</p>";
            } else if ($User['ur_role'] == 1) {
                $ur_role = "<p style = 'color :yellow;'>Nhân viên</p>";
            } else {
                $ur_role = "<p style = 'color : red;'>Quản trị</p>";
            }
            ?>
            <?php $id = $User['ur_id'] ?>
            <?php if ($User['ur_role'] > 0) { ?>
                <tr>
                    <td>PW - <?= $id ?></td>
                    <td><?= $User['ur_name'] ?></td>
                    <td><img src="./.././upload/avatar/<?= $User['ur_avatar'] ?>" alt="avatar" width="10%" style="border-radius: 0.3rem;"></td>
                    <td><?= $ur_status ?></td>
                    <td><a href="<?= $_SERVER['PHP_SELF'] . "?act=update_role&ur_id=" . $User['ur_id'] ?>" class="buton_role"><?= $ur_role ?></a></td>
                    <td style="display: flex; justify-content: center; gap: 0.5rem; align-items: center;">
                        <a style="transform: translateY(1.5rem);" href="<?= $_SERVER['PHP_SELF'] . "?act=deleteUser&ur_id=" . $User['ur_id'] ?>"> <i class='fa-solid fa-trash-can trash trash-custom-ad'></i>
                        </a>&nbsp;
                        <!-- <a style="transform: translateY(1.5rem);" href="<?= $_SERVER['PHP_SELF'] . "?act=infoUser&ur_id=" . $User['ur_id'] ?>"><i class="fa-solid fa-square-info trash-custom-ad"></i></a> -->
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
    </table>

</div>
<style>
    th:first-child,
    td:first-child {
        width: 10rem !important;
    }

    tr td:nth-child(2),
    th td:nth-child(2) {
        width: 10rem !important;
        text-align: center;
    }

    .buton_role {
        border: none;
        background: transparent;
        text-decoration: none;
    }
</style>