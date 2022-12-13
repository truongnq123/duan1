</div>
<div class="list-produt">


    <div class="clear">
        <h1>Thống kê sản phẩm theo category</h1>
    </div>
    <div class="product">
        <!-- Chỗ để hiển thị list sản phẩm -->


        <table border="1px" style="width: 100% ;">
            <thead>
                <th>Mã Loại hàng</th>
                <th>Loại hàng</th>

                <th>Ảnh</th>
                <th>Số lượng</th>
                <th>Giá cao nhất</th>
                <th>giá thấp nhât</th>
                <th>Giá trung bình</th>

            </thead>
            <?php
            foreach ($list_thongke as $thongke) {
                extract($thongke);

                $hinhpath = "../upload/" . $img;
                if (is_file($hinhpath)) {
                    $img_tk = "<img src='" . $hinhpath . "' height='90'>";
                } else {
                    $img_tk = "no photo";
                };
                echo '<tbody>
                   <td>' . $id_loaihang . ' </td>
                   <td>' . $ten_hang . ' </td>
                   
                   <td>' . $img_tk . ' </td>
                   <td>' . $sl_sanpham . ' </td>
                   <td>' . $max_sanpham . ' </td>
                   <td>' . $min_sanpham . ' </td>
                   <td>' . $avg_sanpham . ' </td>
                </tbody>';
            }
            ?>

        </table>

    </div>
</div>
</nav>
</div>