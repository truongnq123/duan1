<body style="background-image: url(https://scr.vn/wp-content/uploads/2020/07/background-tr%E1%BA%AFng-%C4%91%E1%BA%B9p-2020.jpg);">


    <div class="top">
        <h1>Cảm ơn quý khách đã tin tưởng và sử dụng</h1>
        <h1>Chi tiết đơn hàng</h1>
    </div>

    <!-- đổ php vô đây nha -->
    <div class="container">
        <div class="product-full1">
            <div class="product-full">
                <div class="product-top">
                    <p>Sản phẩm</p>
                    <p>Đơn giá</p>
                    <p>Số lượng</p>
                    <p>Thành tiền</p>
                    <p>Xóa </p>
                </div>

                <?php
                $i = 0;
                $tong = 0;
                $xoacard = '<a href="index.php?act=delcard&idcart=' . $i . '" ><input type="button" value="Xoa"></a>';
                foreach ($_SESSION['bill'] as $card) {
                    $hinh = $hinh_path . $card[0];
                    $ttien = $card[3] * $card[2];
                    $tong += $ttien;

                    echo '
                    <div class="product-sp">
                        <div class="sp">
                            <img src="' . $hinh . '" alt="" width="80px">
                            <div>
                                <span class="text">' . $card[1] . '</span>
                            </div>

                        </div>
                        <span class="price">' . $card[2] . '</span>
                        <input type="number" class="nb" onchange="" min="1"  placeholder="1" value="">
                        <span class="price-end">' . $ttien  . '</span>
                        <p>' . $xoacard . '</p>
                    </div>';
                    $i += 1;
                    echo $i;
                }
                echo '
                        <div>
                        <p>' . $tong . '</p>
                        </div>
                    ';
                ?>

            </div>
            <!-- from để đổ php nha -->
            <form class="product-khach" action="" method="POST" enctype="multipart/form-data">
                <h3>Thông tin khách hàng</h3>
                <div>
                    <i>Ngày đặt hàng</i><i>Phương thức thanh toán </i>
                </div>
                <?php
                foreach ($_SESSION['bill'] as $key) {
                    echo '
                <div>
                <span>Họ tên</span>
                
            </div>
            <br>
            <div>
                <span>Số điện thoại</span>
               
            </div>
            <br>
            <div>
                <span>Email</span>
               
            </div>
            <br>
            <div>
                <span>Địa chỉ</span>
                
            </div>

                ';
                }
                ?>
            </form>
        </div>
        <?php


        ?>
    </div>
</body>