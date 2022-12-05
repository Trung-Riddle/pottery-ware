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
        <?php $index = 0 ?>
        <?php foreach ($listUser as $User) { ?>
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
            <?php $index++ ?>
            <tr>
                <td><?= $index ?></td>
                <td><?= $User['ur_name'] ?></td>
                <td><img src="./.././upload/avatar/<?= $User['ur_avatar'] ?>" alt="avatar" width="10%" style="border-radius: 0.3rem;"></td>
                <td><?= $ur_status ?></td>
                <td><?= $ur_role ?></td>
                <td style="display: flex; justify-content: center;">
                    <a class="btnDelete" href="<?= $_SERVER['PHP_SELF'] . "?act=deleteUser&ur_id=" . $User['ur_id'] ?>"> Xóa
                    </a> <br>
                    <a class="btnDetail" href="<?= $_SERVER['PHP_SELF'] . "?act=infoUser&ur_id=" . $User['ur_id'] ?>">Chi
                        tiết</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>