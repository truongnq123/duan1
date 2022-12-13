<body>



</body>

</div>
<div class="list-produt">
    <div class="clear">
        <h1>Trang List Đơn Hàng</h1>
    </div>
    <div class="product">
        <!-- Chỗ để hiển thị list sản phẩm -->
        <div class="list_pd">
            <table border="1" style="width: 100%; text-align: center;">
                <thead>
                    <th>ID</th>
                    <th>Tên Khách Hàng</th>
                    <th>Địa Chỉ</th>
                    <th>Số điện thoại khách hàng</th>
                    <th>Email khách hàng</th>
                    <th>Tổng tiền đơn hàng</th>
                    <th>Phương thức thanh toán</th>
                    <th>Trạng thái đơn hàng</th>
                    <th>Action</th>
                </thead>
                <?php
                foreach ($listdonhang as $donhang) {
                    extract($donhang);
                    $xoabill = "index.php?act=xoabill&bill_id=" . $bill_id;

                    echo ' <tbody>
                <td>' . $bill_id . '</td>
                <td>' . $bill_name . '</td>
                <td>' . $bill_address . '</td>
                <td>' . $bill_phone. '</td>  
                <td>' . $bill_email . '</td>
                <td>' . $bill_total . '</td>
                <td>' . $bill_pttt . '</td>
                <td>' . $bill_status . '</td>
                <td><a href="' . $xoabill . '"><input type="button" value="Xóa"></a></td>
                </tbody>';
                }
                ?>
            </table>
        </div>

    </div>
</div>
</nav>
</div>