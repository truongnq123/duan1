<!------------------------------------Cancelo------------------------------>
</div>
<div class="list-produt">
   
    
    <div class="clear"></div>
    <div class="product">
        <!-- Chỗ để hiển thị list sản phẩm -->
        <form action="index.php?act=listproduct" method="post" enctype="multipart/form-data" class="listproduct">
            
            <input type="text" class="keyw" name="keyw" id="" placeholder="tim kiem" width="100px" height="20px">
            <select name="idkh" id="">
                <option value="0" selected>Tat ca</option>
                <?php
                foreach ($listdm as $sanpham) {
                    extract($sanpham);
                    echo '<option value="' . $id_ct . '">' . $name_ct . '</option>';
                }
                ?>

            </select>
            <input type="submit" name="listok" value="GO">
        </form>
        <div class="add-tool">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa ">
            <span class="nhapthem"> <a href="index.php?act=addsp"><input  type="button" value="Nhập Thêm"></a></span>
           

        </div>
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
                <th>He Dieu Hanh</th>
                <th>Mau</th>
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
                    <td>' . $hdh . '</td>
                    <td>' . $color . '</td>
                    <td><a href="'.$updatepd.'"><input type="button" value="Sửa"></a> <a href="'.$xoaupd.'"><input type="button" value="Xóa"></a></td>
                </tbody>';
            }
            ?>

        </table>
      
    </div>
</div>
</nav>
</div>
