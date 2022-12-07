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
<<<<<<< HEAD
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
                                <span class="text">' . $card[1] . '₫'. '</span>
                            </div>

                        </div>
                        <span class="price">' . $card[2] . '₫'. '</span>
                        <input type="number" class="nb" onchange="" min="1"  placeholder="1" value="">
                        <span class="price-end">' . $ttien  .  '₫'. '</span>
                        <p>' . $xoacard . '</p>
                    </div>';
                    $i += 1;
                }
                    echo'
                        <div  class="product-sp">
                        <p>'.$tong.  '₫'.'</p>
                        </div>
                    ';
=======
                 viewcard();
>>>>>>> 7b53c1fad0265faeefd16597d5c494fd7bf62058
                ?>

            </div>
            
            <!-- from để đổ php nha -->
            <form class="product-khach" action="./index.php?act=billconfirm" method="POST" enctype="multipart/form-data">
                <?php
                if (isset($_SESSION['user'])) {
                    $name = $_SESSION['user']['name_user'];
                    $adress = $_SESSION['user']['address'];
                    $phone = $_SESSION['user']['phone'];
                    $email = $_SESSION['user']['email'];
                } else {
                    $name = "";
                    $adress = "";
                    $phone = "";
                    $email = "";
                }

                ?>
                <h3>Địa chỉ giao hàng</h3>

                <div>
                    <span>Họ tên</span>
                    <input type="text" name="name" id="name" placeholder="Họ và tên" value="<?= $name ?>">
                </div>
                <br>
                <div>
                    <span>Số điện thoại</span>
                    <input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại" value="<?= $phone ?>">
                </div>
                <br>
                <div>
                    <span>Email</span>
                    <input type="email" name="email" id="email" placeholder="Nhập Email" value="<?= $email ?>">
                </div>
                <br>
                <div>
                    <span>Địa chỉ</span>
                    <input type="text" name="adress" id="adress" placeholder="Nhập số nhà/tên đường" value="<?= $adress ?>">
                </div>
                <div class="">
                    <table>
                        <tr>
                            <td><input type="radio" name="bill_pttt" id="1" value="1">Thanh toán trực tiếp</td>
                            <td><input type="radio" name="bill_pttt" id="2" value="2">QR-Code MOMO</td>
                            <td><input type="radio" name="bill_pttt" id="bill_pttt" value="3">ATM-MOMO</td>
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