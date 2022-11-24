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
                <th>Tên CPU</th>
                <th>Action</th>
            </thead>
            <?php
            foreach ($listcpu as $cpu) {
                extract($cpu);
                echo ' <tbody>
                <td>' . $id_cpu . '</td>
                <td>' . $name_cpu . '</td>
                <td><a href=""><input type="button" value="Sua"></a> <a href=""><input type="button" value="Xoa"></a></td>
                </tbody>';
            };
            ?>
        </table>
        <div class="add-tool">
            <input type="button" value="Chon tat ca">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn">
            <a href="index.php?act=addkh"><input type="button" value="nhap them"></a>

        </div>
    </div>
</div>
</nav>
</div>