</div>
<div class="add-new">
    <button id="button"><a href="">Add-new</a></button>
    <div class="clear"></div>
    <h1>Trang list Danh mục</h1>
    <div class="list_pd">
        <!-- Chỗ để hiển thị list sản phẩm -->
        <table border="1" style="width: 50%; text-align: center;">
            <thead>
                <th>ID</th>
                <th>Tên Hãng</th>
                <th>Ảnh</th>
                <th>Action</th>
            </thead>
            <?php
            foreach ($listdm as $hang) {
                extract($hang);
                $xoauct = "index.php?act=xoadm&id_ct=".$id_ct;
                $updatect = "index.php?act=editdm&id_ct=".$id_ct;
                $hinhpath = "../upload/" . $img_ct;
                if (is_file($hinhpath)) {
                    $img = "<img src='" . $hinhpath . "' height='90'>";
                } else {
                    $img = "no photo";
                };
                echo ' <tbody>
                <td>' . $id_ct . '</td>
                <td>' . $name_ct . '</td>
                <td>' . $img . '</td>
                <td><a href="'.$updatect.'"><input type="button" value="Sua"></a> <a href="'.$xoauct.'"><input type="button" value="Xoa"></a></td>
                </tbody>';
            }

            ?>
        </table>
        <div class="add-tool">
            <input type="button" value="Chon tat ca">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn">
            <a href="index.php?act=adddm"><input type="button" value="nhap them"></a>

        </div>
    </div>
</div>
</nav>
</div>