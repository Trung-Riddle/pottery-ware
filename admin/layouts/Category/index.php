<style>
.activeStatusCate {
    color: green;
}

.unactiveStatusCate {
    color: red;
}
</style>
<div class="containerCategory table">
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            foreach ($cate as $value) {
                echo "
                    <tr>
                        <th>{$index}</th>
                        <td>{$value['name_cate']}</td>";
                        if ($value['status'] == 1) {
                            echo "<td class='activeStatusCate'>Hoạt động</td>";
                        }
                        else{
                            echo "<td class='unactiveStatusCate'>Không hoạt động</td>";
                        }
                        echo "<td>thêm</td>
                    </tr>
                ";
                $index++;
            }
            ?>
        </tbody>
    </table>
</div>