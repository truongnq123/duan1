<body style="background-image: url(https://scr.vn/wp-content/uploads/2020/07/background-tr%E1%BA%AFng-%C4%91%E1%BA%B9p-2020.jpg);">


    <div class="top">
        <h1>Giỏ Hàng</h1>
    </div>
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

                <!-- đổ php vô đây nha -->
                <?php
                $i = 0;
                $tong = 0;
                $xoacard = '<a href="index.php?act=delcard&idcart='.$i.'" ><input type="button" value="Xoa"></a>';
                foreach ($_SESSION['Card'] as $card) {
                    $hinh = $hinh_path . $card[0];
                    $ttien = $card[3] * $card [2];
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
                    echo'
                        <div>
                        <p>'.$tong.'</p>
                        </div>
                    ';
                ?>

            </div>
            <!-- from để đổ php nha -->
            <form class="product-khach" action="./index.php?act=diachi" method="POST" enctype="multipart/form-data">
                <h3>Địa chỉ giao hàng</h3>

                <div>
                    <span>Họ tên</span>
                    <input type="text" name="name" id="name" placeholder="Họ và tên">
                </div>
                <br>
                <div>
                    <span>Số điện thoại</span>
                    <input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại">
                </div>
                <br>
                <div>
                    <span>Email</span>
                    <input type="email" name="email" id="email" placeholder="Nhập Email">
                </div>
                <br>
                <div>
                    <span>Địa chỉ</span>
                    <input type="text" name="adress" id="adress" placeholder="Nhập số nhà/tên đường">
                </div>
                <div class="">
                    <table>
                        <tr>
                            <td><input type="radio" name="1" id="bill_pttt">Thanh toán trực tiếp</td>
                            <td><input type="radio" name="2" id="bill_pttt">QR-Code MOMO</td>
                            <td><input type="radio" name="3" id="bill_pttt">ATM-MOMO</td>
                        </tr>
                    </table>
                </div>
                <input type="submit" name="themmoi" value="Đặt hàng">
            </form>
        </div>
        <?php


        ?>
    </div>
</body>