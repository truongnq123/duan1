<body style="background-image: url(https://scr.vn/wp-content/uploads/2020/07/background-tr%E1%BA%AFng-%C4%91%E1%BA%B9p-2020.jpg);">

<?php
if (is_array($listbill)) {
    extract($listbill);              
}
?>
    <div class="top">
        <h1>Don Hang</h1>
    </div>
    <div class="container">
        <div class="product-full1">
            <table border="1" style="text-align: center; width: 100%;" >
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Số Lượng Hàng</th>
                    <th>Tổng giá trị đơn hàng</th>
                    <th>Tinh trạng đơn hàng</th>
                </tr>
                <?php
                foreach ($listbill as $bill) { 
                    extract($bill);
                    $ttdh = get_ttdh($bill['bill_status']);
                    $countsp = loadall_cart_count($bill['bill_id']);
                    echo '<tr>
                            <td>'.$bill['bill_id'].'</td>
                            <td>'.$countsp.'</td>
                            <td>'.$bill['bill_total'].'</td>
                            <td>'.$ttdh.'</td>
                        </tr>';
                } 
                ?>

            </table>
        </div>

    </div>
</body>