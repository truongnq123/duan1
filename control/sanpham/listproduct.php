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
                <th>Ma San Phẩm</th>
                <th>Ten Tên Sản Phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Ảnh Sản phẩm</th>
                <th>Mô tả</th>
                <th>Ngày Nhập</th>
                <th>category</th>
                <th>CPU</th>
                <th>Ram</th>
                <th>Ổ Cứng</th>
                <th>VGA</th>
                <th>Màn Hình</th>
                <th>action</th>
            </thead>
            <?php
            foreach ($listpd as $product) {

                extract($product);
                // var_dump($khachhang);die;
                $xoaupd = "index.php?act=xoapd&id_pd=".$id_pd;
                $updatepd = "index.php?act=editpd&id_pd=".$id_pd;
                $hinhpath = "../upload/" . $img_pd;
                if (is_file($hinhpath)) {
                    $img = "<img src='" . $hinhpath . "' height='90'>";
                } else {
                    $img = "no photo";
                };
                echo '<tbody>
                    <td><input type="checkbox"></td>
                    <td>' . $id_pd . '</td>
                    <td>' . $name_pd . '</td>
                    <td>' . $price_pd . '</td>
                    <td>' . $img . '</td>
                    <td>' . $describle_pd . '</td>
                    <td>' . $date_add_pd . '</td>
                    <td>' . $cate_id. '</td>
                    <td>' . $cpu . '</td>
                    <td>' . $ram . '</td>
                    <td>' . $o_cung . '</td>
                    <td>' . $VGA . '</td>
                    <td>' . $manhinh . '</td>
                    <td><a href="'.$updatepd.'"><input type="button" value="Sua"></a> <a href="'.$xoaupd.'"><input type="button" value="Xoa"></a></td>
                </tbody>';
            };
            ?>

        </table>
        <div class="add-tool">
            <input type="button" value="Chon tat ca">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn">
            <a href="index.php?act=addsp"><input type="button" value="nhap them"></a>

        </div>
    </div>
</div>
</nav>
</div>