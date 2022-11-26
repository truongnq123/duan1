<!------------------------------------Cancelo------------------------------>
</div>
<div class="add-new">
    <button type="button" id="button"><a href="">Add-new</a></button>
    <div class="clear"></div>
    <div class="product">
        <!-- Chỗ để hiển thị list sản phẩm -->
        <form action="index.php?act=listuser" method="post">
            <input type="text" name="keyw" id="">
            <select name="idkh" id="">
                <option value="0" selected>Tat ca</option>
                <?php
                foreach ($listkh as $khachhang) {
                    extract($khachhang);
                    echo '<option value="' . $id_us . '">' . $id_us . '</option>';
                }
                ?>

            </select>
            <input type="submit" name="listok" value="GO">
        </form>
        <table border="1px" style="width: 100% ;">
            <thead>
                <th>chon</th>
                <th>Ma khach hang</th>
                <th>Ten Khach Hang</th>
                <th>Email</th>
                <th>Hinh Ảnh</th>
                <th>Mat Khau</th>
                <th>Vai tro</th>
                <th>Trang Thai</th>
                <th>action</th>
            </thead>
            <?php
            foreach ($listkh as $khachhang) {
                
                extract($khachhang);
                // var_dump($khachhang);die;
                $xoauser = "./index.php?act=xoauser&id_us=" . $id_us;
                $hinhpath = "../upload/" . $img_user;
                if (is_file($hinhpath)) {
                    $img = "<img src='" . $hinhpath . "' height='90'>";
                } else {
                    $img = "no photo";
                };
                echo '<tbody>
                    <td><input type="checkbox"></td>
                    <td>' . $id_us . '</td>
                    <td>' . $name_user . '</td>
                    <td>' . $email . '</td>
                    <td>' . $img . '</td>
                    <td>' . $matkhau . '</td>
                    <td>' . $role . '</td>
                    <td>' . $active . '</td>
                    <td><a href=""><input type="button" value="Sua"></a> <a href="'.$xoauser.'"><input type="button" value="Xoa"></a></td>
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