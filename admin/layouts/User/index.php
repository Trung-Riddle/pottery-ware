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
                <th>Email</th>
                <th>SĐT</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <?php $index = 0 ?>
        <?php foreach ($listUser as $User) { ?>
            <?php
            if ($User['status_user'] == 0) {
                $status_user = "<p style = 'color : rgb(44, 248, 44);'>Hoạt động</p>";
            } else {
                $status_user = "<p style = 'color : red;'>Không hoạt động</p>";
            }
            ?>
            <?php $index++ ?>
            <tr>
                <td><?= $index ?></td>
                <td><?= $User['user_name'] ?></td>
                <td><img src="./.././upload/avatar/<?= $User['avatar'] ?>" alt="avatar" width="10%" style="border-radius: 0.3rem;"></td>
                <td><?= $User['email'] ?></td>
                <td><?= $User['phone_number'] ?></td>
                <td><?= $status_user ?></td>
                <td style="display: flex; justify-content: center;">
                    <a class="btnDelete" href="<?= $_SERVER['PHP_SELF'] . "?act=deleteUser&id=" . $User['id'] ?>"> Xóa </a> <br>
                    <a class="btnDetail" href="<?= $_SERVER['PHP_SELF'] . "?act=infoUser&id=" . $User['id'] ?>">Chi tiết</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>